<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('resources/css/bootstrap-progressbar-3.3.4.min.css')}}">
 <!-- Font Awesome -->
    <link href="{{asset('resources/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('resources/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('resources/css/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('resources/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('resources/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('resources/css/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Thdỏeme Style -->
    <link href="{{asset('resources/css/custom.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('resources/ckeditor/ckeditor.js')}}"></script>
</head>
<body class="login nav-md">
	<div class="container body">
		<div class="main_container">
         	<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Trang quản trị Cửu long</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
             @if(session()->has('admin'))
              <div class="profile_pic">
                <img src="../public/img/{{session('admin.avatar')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">               
                <span>Xin chào</span>
                <p style="margin-left: -20px">{{session('admin.name')}}</p>
              </div>
            @endif
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Trang quản trị Cửu long</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Trang chủ <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="san-pham-kinh-doanh">Sản phẩm đang kinh doanh</a></li>
                      <li><a href="san-pham-goi-y" >Sản phẩm gợi ý</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Quản trị bài viết <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('admin/baogia')}}">Báo giá sản phẩm</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Quản trị đơn hàng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('admin/don-hang')}}">Đơn hàng chưa xử lý</a></li>
                    </ul>
                  </li>
                 
                  <li><a><i class="fa fa-clone"></i>Quản trị thành viên<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('admin/dskhachhang')}}">Tài khoản khách hàng</a></li>
                      <li><a href="{{asset('admin/dsAdmin')}}">Tài khoản nhân viên</a></li>
                      <li><a href="{{asset('admin/themthanhvien')}}">Thêm nhân viên</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-windows"></i>Quản trị doanh mục <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('admin/producer')}}">Nhãn hiệu đang hợp tác</a></li>
                      <li><a href="{{asset('admin/category')}}">Doanh mục đang kinh doanh</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Quản trị Slider<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                 

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav" style="margin-left: 220px;" >
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
             <nav class="nav navbar-nav">
              <ul class=" navbar-right" >
                <li><a href="logout" style="color: blue"><i class="fa fa-sign-in" aria-hidden="true"> &nbsp Đăng xuất</i></a></li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		@yield('content')
	</div>
	
		<!-- jQuery -->
    <script src="{{asset('resources/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('resources/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('resources/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('resources/js/nprogress.js')}}"></script>
    <!-- Chart.js -->
   
    <!-- gauge.js -->
    <script src="{{asset('resources/js/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('resources/js/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('resources/js/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('resources/js/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('resources/js/jquery.flot.js')}}"></script>
    <script src="{{asset('resources/js/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('resources/js/jquery.flot.time.js')}}"></script>
    <script src="{{asset('resources/js/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('resources/js/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('resources/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('resources/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('resources/js/curvedLines.js')}}"></script>
    <!-- DateJS -->
     <script src="{{asset('resources/js/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('resources/js/jquery.vmap.js')}}"></script>
    <script src="{{asset('resources/js/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('resources/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('resources/js/moment.min.js')}}"></script>
    <script src="{{asset('resources/js/daterangepicker.js')}}"></script>
    <script src="{{asset('resources/js/custom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/js/adminAjax.js')}}"></script>

</body>
</html>
