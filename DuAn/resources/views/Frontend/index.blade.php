@extends('Frontend.layouts.app')

@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach ($product as $product1)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?php  $picture = json_decode($product1->image,true); { ?>
                        <img  src="{{ asset('upload/product/'.$product1->id_user.'/'.$picture[0]) }} " >
                    <?php } ?>
                    <!-- <img src="" alt="" /> -->
                    <h2>${{$product1->price}}</h2>
                    <p>{{$product1->name}}</p>
                    <a id="{{$product1->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>

                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>${{$product1->price}}</h2>
                        <p>{{$product1->name}}</p>
                        <a id="{{$product1->id}}" class="btn btn-default add-to-cart"><i
                                class="fa fa-shopping-cart"></i>Add to
                            cart</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href=""><i class="fa fa-plus-square"></i>Add
                            to wishlist</a></li>
                    <li><a href="{{route('detail-product',['id'=>$product1->id])}}"><i class="fad fa-info"></i>More infomation</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
<!--features_items-->




<!--/recommended_items-->
<script src="{{ asset('Frontend/js/jquery.js') }}"></script>
<script src="{{ asset('Frontend/js/main.js') }}"></script>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    @if($cart != 0)
    $('a#cart--amount').text("Cart" + "{{$cart}}"); 
    @endif

    $("a.add-to-cart").click(function() {
        var id = $(this).attr("id");
        // alert(id);
        $.ajax({
            type: "POST",
            url: "{{route('add-to-cart')}}",
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $('a#cart--amount').text("Cart" + data.count);
            }
        });

    });
    // const slider = $('#sl2').slider({
    //     formatter: function(value) {
    //         return 'Current value: ' + value;
    //     }
    // });

    // slider.on('slideStop', function(e) {
    //     console.log('value = ' + e.value);
    //     var min = e.value.slice(0,1);
    //     var max = e.value.slice(1,2);
    //     $.ajax({
    //         type: "POST",
    //         url: "{{route('search-range')}}",
    //         data: {
    //             min:min,max:max
    //         },
    //         success: function(data) {
    //             console.log(data);
    //             var html = '';
    //             var img = "{{ URL::to('upload/product/') }}";
    //             if(data){
    //                 Object.keys(data).map(function(key,index) {
    //                     console.log(data[key]);
    //                     if(data[key].length > 0){
    //                     Object.keys(data[key]).map(function(key1 , index1){
    //                         var arrImg = JSON.parse(data[key][index1]['image']);
    //                         var id_member = data[key][index1]['id_member'];
    //                         //console.log(arrImg);
    //                         //console.log(data[key][index1]['id']);
    //                         html += '<div class="col-sm-3 home ">'+
    //                                     '<div class="product-image-wrapper">'+
    //                                         '<div class="single-products">'+
    //                                             '<div class="productinfo text-center">'+
    //                                                 '<img src='+img+'/'+id_member+'/'+arrImg[0] +' alt="" />'+
    //                                                 '<h2>'+data[key][index1]['price']+'</h2>'+
    //                                                 '<p>'+data[key][index1]['name']+'</p>'+
    //                                                 '<a href="#" class="btn btn-default add-to-cart">'+'<i class="fa fa-shopping-cart"></i>Add to cart'+'</a>'+
    //                                             '</div>'+

    //                                         '</div>'+
    //                                     '</div>'+
    //                                 '</div>'
    //                     });
    //                     $('div.home').hide();
    //                     $('div#tshirt').html(html);
    //                     } else {
    //                         $('div.home').hide();
    //                         $('div#tshirt').html("Can't find any product in this price range.");
    //                     }
    //                 });
                   
    //             }
                
    //         }
    //     });
    // });

})
</script>
@endsection