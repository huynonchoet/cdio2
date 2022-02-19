@extends('Frontend.layouts.app-cart')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h4><i class="icon fa fa-check"></i>Thông báo!</h4>
            {{session('success')}}
        </div>
        @endif
        
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
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
                    @foreach($cart as $cart)
                    <tr>
                        <td class="cart_product">
                        <?php  $picture = json_decode($cart["image"],true); { ?>
                            <a href=""><img style="width:80px" src="{{ asset('upload/product/'.$cart['id_user'].'/'.$picture[0]) }}" alt=""></a>
                        <?php } ?>
                        </td>
                        <td class="cart_description">
                            <h4><a>{{$cart['name']}}</a></h4>
                            <p id="{{$cart['Id']}}">{{$cart['Id']}}</p>
                        </td>
                        <td class="cart_price">
                            <p id="{{$cart['price']}}">${{$cart['price']}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up handle-cart" id='1'> + </a>
                                <input class="cart_quantity_input " type="text" name="quantity"
                                    value="{{$cart['amount']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down handle-cart" id='2'> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$cart['amount']*$cart['price']}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete handle-cart" id="3"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Cart Sub Total</td>
                                <td>$59</td>
                            </tr>
                            <tr>
                                <td>Exo Tax</td>
                                <td>$2</td>
                            </tr>
                            <tr class="shipping-cost">
                                <td>Shipping Cost</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><span>${{$total}}</span></td>
                            </tr>
                        </table>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
            <span>
                <button id="order" type="button" class="btn btn-primary" style="margin-left:600px;">ORDER</button>
            </span>
        </div>
    </div>
</section>
<!--/#cart_items-->
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('button#order').click(function() {
        var loggedIn = "{{Auth::check()}}";
        var address = $("input#address").val();
        var phone = $("input#phone").val();
        if (loggedIn == "") {
            alert('Please to login first');
            // window.location.href = "https://www.24h.com.vn/";
            window.location.href = "{{ url('/member/login') }}";
            return false;
            // 
            // window.location.href = "{{route('login')}}";
        } else {
            window.location.href = "{{route('order')}}";
            return true;
        }

    })
})
</script>
@endsection