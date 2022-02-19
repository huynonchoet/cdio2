@extends('Frontend.layouts.app-cart')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            @if(!session()->has('cart'))
                <p>Bạn chưa chọn sản phẩm nào</p>
            @endif
            @if(session()->has('cart'))
            <?php if(session()->has('cart')) $cart = session()->get('cart'); ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>   
                    @foreach($cart as $cart1)
                    <tr>
                        <td class="cart_product">
                        <?php  $picture = json_decode($cart1["image"],true); { ?>
                            <a href=""><img style="width:80px" src="{{ asset('upload/product/'.$cart1['id_user'].'/'.$picture[0]) }}" alt=""></a>
                        <?php } ?>
                        </td>
                        <td class="cart_description">
                            <h4><a >{{$cart1['name']}}</a></h4>
                            <p id ="{{$cart1['Id']}}">{{$cart1['Id']}}</p>
                        </td>
                        <td class="cart_price" >
                            <p id="{{$cart1['price']}}" >${{$cart1['price']}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up handle-cart" id = '1' > + </a>
                                <input class="cart_quantity_input " type="text" name="quantity" value="{{$cart1['amount']}}"
                                    autocomplete="off" size="2">
                                <a class="cart_quantity_down handle-cart" id='2' > - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$cart1['amount']*$cart1['price']}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete handle-cart" id="3" ><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>    
                        <li>Total <span id="total">$61</span></li>
                    </ul>
                    <a class="btn btn-default check_out" style="margin-left:40px" href="{{ url('checkout') }}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->

<script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('span#total').text("$"+ {{$total}});
        $('.handle-cart').click(function(){
            var amount =  $(this).closest('div.cart_quantity_button').find('input').val();
            var price = $(this).closest('tr').find('td.cart_price p').attr('id');
            var id = $(this).closest('tr').find('td.cart_description p').attr('id');
            var handle = $(this).attr('id');
            //alert(amount+"--"+price+"--"+id+"--"+handle);
            switch(handle) {
                case '1' :    $(this).closest('div.cart_quantity_button').find('input').val(parseInt(amount)+1);
                            $(this).closest('tr').find('td.cart_total p').text("$"+parseInt(price)*(parseInt(amount)+1));
                            break;
                case '2' :  if(amount == 1)
                                $(this).closest('tr').remove();
                            $(this).closest('div.cart_quantity_button').find('input').val(parseInt(amount)-1);
                            $(this).closest('tr').find('td.cart_total p').text("$"+parseInt(price)*(parseInt(amount)-1));
                            break;
                case '3' :   $(this).closest('tr').remove();
                            break;

            }
            $.ajax({
            type: "POST",
            url : "{{route('ajax-handle-cart')}}",
            data : {id:id , handle:handle},
            success:function(data){
                $('span#total').text("$"+data.total);
            }
            }); 
        });
    })
</script>
@endsection