<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        position: relative;
        font-weight: 400px;
    }

    ul li {
        list-style: none;
    }

    a:hover {
        outline: none;
        text-decoration: none;
    }

    a:focus {
        outline: none;
        outline-offset: 0;
    }

    a {
        -webkit-transition: 300ms;
        transition: 300ms;
        text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Roboto', sans-serif;
    }

    .btn:hover,
    .btn:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .col-sm-3,
    .col-sm-5,
    .col-sm-4 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    #cart_items .cart_info {
        border: 1px solid #E6E4DF;
        margin-bottom: 50px
    }

    #cart_items .cart_info .cart_menu {
        background: #FE980F;
        color: #fff;
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        font-weight: normal;
    }

    #cart_items .cart_info .table.table-condensed thead tr {
        height: 51px;
    }

    #cart_items .cart_info .table.table-condensed tr {
        border-bottom: 1px solid#F7F7F0
    }

    #cart_items .cart_info .table.table-condensed tr:last-child {
        border-bottom: 0
    }

    .cart_info table tr td {
        border-top: 0 none;
        vertical-align: inherit;
        margin-right: 5px;
    }

    #cart_items .cart_info .image {
        padding-left: 30px;
    }

    #cart_items .cart_info .cart_description h4 {
        margin-bottom: 0
    }

    #cart_items .cart_info .cart_description h4 a {
        color: #363432;
        font-family: 'Roboto', sans-serif;
        font-size: 20px;
        font-weight: normal;
    }

    #cart_items .cart_info .cart_description p {
        color: #696763
    }

    #cart_items .cart_info .cart_price p {
        color: #696763;
        font-size: 18px
    }

    #cart_items .cart_info .cart_total_price{
        color: #FE980F;
        font-size: 24px;
    }

    .cart_product {
        display: block;
        /*  margin: 15px -70px 10px 25px;*/
    }

    .cart_quantity_button a {
        background: #F0F0E9;
        color: #696763;
        display: inline-block;
        font-size: 16px;
        height: 28px;
        overflow: hidden;
        text-align: center;
        width: 35px;
        float: left;
        line-height: 28px;
    }

    .cart_quantity_input {
        color: #696763;
        float: left;
        font-size: 16px;
        text-align: center;
        font-family: 'Roboto', sans-serif;
    }

    .cart_delete {
        display: block;
        margin-right: -12px;
        overflow: hidden;
    }

    .cart_delete a {
        background: #F0F0E9;
        color: #FFFFFF;
        padding: 5px 7px;
        font-size: 16px
    }

    .cart_delete a:hover {
        background: #FE980F
    }

    .table-responsive>.table {
        margin-bottom: 0
    }

    .table-responsive>.table>thead>tr>th,
    .table-responsive>.table>tbody>tr>th,
    .table-responsive>.table>tfoot>tr>th,
    .table-responsive>.table>thead>tr>td,
    .table-responsive>.table>tbody>tr>td,
    .table-responsive>.table>tfoot>tr>td {
        white-space: nowrap
    }

    .table-responsive>.table-bordered {
        border: 0
    }

    .table-responsive>.table-bordered>thead>tr>th:first-child,
    .table-responsive>.table-bordered>tbody>tr>th:first-child,
    .table-responsive>.table-bordered>tfoot>tr>th:first-child,
    .table-responsive>.table-bordered>thead>tr>td:first-child,
    .table-responsive>.table-bordered>tbody>tr>td:first-child,
    .table-responsive>.table-bordered>tfoot>tr>td:first-child {
        border-left: 0
    }

    .table-responsive>.table-bordered>thead>tr>th:last-child,
    .table-responsive>.table-bordered>tbody>tr>th:last-child,
    .table-responsive>.table-bordered>tfoot>tr>th:last-child,
    .table-responsive>.table-bordered>thead>tr>td:last-child,
    .table-responsive>.table-bordered>tbody>tr>td:last-child,
    .table-responsive>.table-bordered>tfoot>tr>td:last-child {
        border-right: 0
    }

    .table-responsive>.table-bordered>tbody>tr:last-child>th,
    .table-responsive>.table-bordered>tfoot>tr:last-child>th,
    .table-responsive>.table-bordered>tbody>tr:last-child>td,
    .table-responsive>.table-bordered>tfoot>tr:last-child>td {
        border-bottom: 0
    }

    .table td,
    .table th {
        background-color: #fff !important
    }

    .btn>.caret,
    .dropup>.btn>.caret {
        border-top-color: #000 !important
    }

    .label {
        border: 1px solid #000
    }

    .table {
        border-collapse: collapse !important
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd !important
    }

    *,
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    .table-condensed>thead>tr>th,
    .table-condensed>tbody>tr>th,
    .table-condensed>tfoot>tr>th,
    .table-condensed>thead>tr>td,
    .table-condensed>tbody>tr>td,
    .table-condensed>tfoot>tr>td {
        padding: 5px
    }
    </style>
</head>
<!--/head-->

<body>
    <section id="cart_items">
        <div class="container">
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
                                <a href=""><img style="width:80px"
                                        src=""
                                        alt=""></a>
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
                        <tr>
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
        </div>
    </section>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>