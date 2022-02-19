<?php

namespace App\Http\Controllers\admin;
use App\products;
use App\category;
use App\brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Auth;
use App\Http\Requests\AddProductRequest;
use Illuminate\Pagination\Paginator;
use Intervention\Image\ImageManagerStatic as Image;
class ProductController extends Controller
{
   
    public function index(){
        $data = DB::table('product')->paginate(4);
        return view('admin.product.my-product',compact('data'));
    }
    public function search(Request $request){
        $data = DB::table('product')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(4);
        return view('admin.product.my-product',compact('data'));
    }
    public function add(){
        $cate = category::all();
        $brand = brand::all();
        return view('admin.product.add-product',compact('cate','brand'));
    }
    public function store(AddProductRequest $request){
        $data = [];
        if($request->hasfile('files'))
        {

            foreach($request->file('files') as $image)
            {
                //dùng $this-> để gọi hàm viết bên dưới
                $data[] = $this->xuLyHinhAnh($image);
                
            }
        }
        $this->saveProduct($request->name,json_encode($data),$request->price,$request->input('category'),$request->input('brand'),$request->sale,$request->profile,$request->detail, Auth::id(),0);
        return redirect()->route('admin-product')->with('success', 'Your active has been successfully');
    }
    public function saveProduct($name,$image,$price,$category,$brand,$sale,$profile,$details,$id_user,$id) {
        if($id==0){
            $product= new products();
        }
        else {
            $product= products::find($id);
        }
        $product->name = $name;
        $product->image= $image;
        $product->price = $price;
        $product->category = $category;
        $product->brand = $brand;
        $product->sale= $sale;
        $product->profile = $profile;
        $product->detail = $details;
        $product->id_user = $id_user;
        $product->save();
    }
    public function xuLyHinhAnh($image){
        //set ngày giờ về giờ VN
        
        // chuyển ngày giờ thành chuỗi
        $time = strtotime(date('Y-m-d H:i:s'));
        $name = $time."_".$image->getClientOriginalName();
        $name_2 = "hinh50_".$time."_".$image->getClientOriginalName();
        $name_3 = "hinh200_".$time."_".$image->getClientOriginalName();
        if(!file_exists('upload/product/'.Auth::user()->id)){
            mkdir('upload/product/'.Auth::user()->id);    
        } 
        $path = public_path('upload/product/'.Auth::user()->id.'/' . $name);
        $path2 = public_path('upload/product/'.Auth::user()->id.'/' . $name_2);
        $path3 = public_path('upload/product/'.Auth::user()->id.'/' . $name_3);
        //resize để chỉnh kích thước ảnh
        Image::make($image->getRealPath())->save($path);
        Image::make($image->getRealPath())->resize(50, 70)->save($path2);
        Image::make($image->getRealPath())->resize(200, 300)->save($path3);
        return $name;
    }
    public function edit($id){
        $cate = category::all();
        $brand = brand::all();
        $product=products::find($id);
        return view('admin.product.edit-product',compact('cate','brand','product'));
    }
    public function delete($id){
        DB::table('product')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function update($id,Request $request){
        $data = [];
        $file = $request->file('files');
        $pro=products::find($id);
        $prod = json_decode($pro->image,true);
        $hinhanh = $request->hinhanh;
        foreach($prod as $prod){
            if(!empty($hinhanh)){
                if(!in_array($prod,$hinhanh))
                $data[] = $prod; 
            } else {
                $data[] = $prod; 
            }
        }
        //print_r($data);
        if($file)
        {
            print(count($file)+count($data));
            if(count($file)+count($data)>3){
                return redirect()->back()->withErrors(['Amount of images > 3']);
                
            } else {
                foreach($request->file('files') as $image)
                {
                    $data[] = $this->xuLyHinhAnh($image);
                }
            }
            
        }
        if($request->detail == null){
            $detail = $pro->details;
        } else {
            $detail = $request->detail;
        }
        $this->saveProduct($request->name,json_encode($data),$request->price,$request->input('category'),$request->input('brand'),$request->sale,$request->profile,$detail, Auth::id(),$id);

        return redirect()->route('admin-product');
    }
}
