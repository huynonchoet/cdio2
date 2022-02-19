<!DOCTYPE html>
<html lang="en">
<head>

    <!--rate -->
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta id="viewport" name="viewport" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link type="text/css" rel="stylesheet" href="{{ asset('rate/css/rate.css')}}">
    <script src="{{ asset('rate/js/jquery-1.9.1.min.js')}}"></script>
    <!-- rate -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('Frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('Frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('Frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{asset('Frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
	@include('Frontend.layouts.header')
    
	<section>
		<div class="container">
			<div class="row">
            @include('Frontend.layouts.menu-left-front')
				<div class="col-sm-9 padding-right">
                    @yield('content')
				</div>
			</div>
		</div>
	</section>
	
	@include('Frontend.layouts.footer')
	

  
    <script src="{{ asset('Frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('Frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('Frontend/js/jquery.prettyPhoto.js')}} "></script>
    <script src="{{ asset('Frontend/js/main.js') }}"></script>
</body>
</html>