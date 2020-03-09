<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link href="{{asset('resources/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('resources/font/css/fontawesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('resources/css/slick.css')}}" rel="stylesheet">
	<link href="{{asset('resources/css/slick-theme.css')}}" rel="stylesheet">
	<link href="{{asset('resources/css/nouislider.min.css')}}" rel="stylesheet">
	<link type="text/css" href="{{asset('resources/css/styleindex.css')}}" rel="stylesheet">
	<link href="{{asset('resources/css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/css/simplePagination.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script type="text/javascript" src="{{asset('resources/js/ajaxWebsite.js')}}"></script>
	@yield('style')
</head>
<body>
<!-- HEADER -->
		<!--<div class="load-page" style="margin-top:20%;display: none;margin-left:45%;border-radius: 100%;position: absolute;position: fixed;z-index: 100;">
			<div><span style="font-size: 20px;font-weight: bold;color: red">Vui lòng đợi</span></div>
			<i style="font-size: 80px;color:#337ab7;" class="fa fa-refresh fa-spin fa-3x fa-fw" ></i>
		</div> -->
		<div  class="col-md-4 messages" style="float: left;position: fixed;z-index: 100;margin-left: 850px;display: none">
			<div class="alert alert-danger fade in">
  				<strong class="content-messages">Indicates a dangerous or potentially negative action.</strong>
			</div>
		</div>
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> vlxdcuulong@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 561-Điện Biên Phủ-Bình Thạnh-TPHCM</a></li>
					</ul>
					<ul class="header-links pull-right" style="margin-right: 150px;">
					@if(session()->has('user'))
						<li>
							<i style="color: white;position: relative;font-size: 15px" class="fa fa-user-circle ud" aria-hidden="true">
								<strong style="color: white">Xin chào:{{session('user.email')}}</strong>
							<ul class="sub-header" style="position: absolute;">
								<div >
									<li>
										<a href="{{route('don-hang')}}">
											<i class="fa fa-history" aria-hidden="true"></i>Đơn hàng gần đây </a>
										</li>
								</div>
							
								
								<div>
									<li>
										<a href="{{route('logout')}}">
											<i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
										</li>
									</div>
							</ul></i>
						</li>
					@else
						<li><a href="login"><i class="fa fa-user-o"></i>Đăng nhập</a></li>
						<li><a href="{{route('addUser')}}"><i class="fa fa-user-o"></i> Đăng ký</a></li>
					@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img style="width: 280px;height: 100px;" src="{{ asset('public/img/logo-5002.png')}}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-5" >
							<div class="header-search">
								<form method="GET"  action="{{url('search')}}">
									<input autocomplete="off" type="text" name="key" class="input" id="search" placeholder="Nhập sản phẩm cần tìm">
									<button  class="search-btn" style="color: black"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
							</div>
							<div  class="col-md-7 div-search" style="position: absolute;z-index: 100">
								<div class="row">
									<ul class="search">
										
									</ul>
								</div>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix" style="position: relative">
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a href="{{asset('gio-hang')}}" class="dropdown-toggle"  aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
										<div class="qty">{{Cart::getcontent()->count()}}</div>
									</a>
								<!--<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img product-img-cart">
													<img src="" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"></a></h3>
													<h4 class="product-price"></h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small></small>
										</div>
										<div class="cart-btns">
											<a href="gio-hang">Chi tiết</a>
											<a href="checkout">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								<-->
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="menu-item active"><a href="{{route('index')}}">Trang chủ</a></li>
						<li class="menu-item "><a href="{{route('xi-mang')}}">Xi măng</a></li>
						<li class="menu-item "><a href="{{route('da-xay-dung')}}">Đá xây dựng</a></li>
						<li class="menu-item "><a href="{{route('cat-xay')}}">Cát xây</a></li>
						<li class="menu-item "><a href="{{route('gach-men')}}">Gạch men</a></li>
						<li class="menu-item "><a href="{{route('nuoc-son')}}">Nước sơn</a></li>
						<li class="menu-item "><a href="{{route('bao-gia-vat-tu')}}">Báo Giá</a></li>
						
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		@yield('content')
		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Thông tin liên hệ</h3>
								<p>Công ty thương mại và dịch vụ Cửu Long</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Địa chỉ: Lầu 3 - Trung tâm thương mại PEARL PLAZA , 561 Điện Biên Phủ, quận Bình Thạnh</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>19006060</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>tmdvcuulong@gmail.com</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.15369634471!2d106.72070877934969!3d10.799538052014213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529e57ceb60c1%3A0x53c307df0edbd2d3!2zY8O0bmcgdHkgY-G7lSBwaOG6p24gxJHhuqd1IHTGsCB0aMawxqFuZyBt4bqhaSBD4butdSBMb25nIENNQw!5e0!3m2!1svi!2s!4v1572678701441!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  CÔNG TY THƯƠNG MẠI VÀ DỊCH VỤ CỬU LONG 
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
	<script src="{{asset('resources/js/jquery.min.js')}}"></script>
	<script src="{{asset('resources/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('resources/js/slick.min.js')}}"></script>
	<script src="{{asset('resources/js/nouislider.min.js')}}"></script>
	<script src="{{asset('resources/js/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('resources/js/main.js')}}"></script>
	<script type="text/javascript" src="{{asset('resources/js/jquery.simplePagination.js')}}"></script>
</body>
</html>