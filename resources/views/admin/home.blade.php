@extends('admin.masterView')
@section('title','Hệ thống quản trị trực tuyến')
@section('content')
	 <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-4 col-sm-8  tile_stats_count">
              <div class="count">{{$listsInfo['customer']}}</div>
              <span class="count_top">Khách hàng đăng ký</span>
            </div>
            <div class="col-md-4 col-sm-5  tile_stats_count">
               <div class="count">{{$listsInfo['admin']}}</div>
              <span class="count_top">Thành viên điều hành</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <div class="count green">{{$listsInfo['order']}}</div>
              <span class="count_top">Đơn hàng mới</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
               <div class="count">{{$listsInfo['orderSuccess']}}</div>
              <span class="count_top">Đơn hàng thành công</span>
            </div>
             <div class="col-md-4 col-sm-4  tile_stats_count">
               <div class="count">{{number_format($listsInfo['total'])}}</div>
              <span class="count_top">Tổng doanh bán hàng</span>
            </div>
             <div class="col-md-4 col-sm-4  tile_stats_count">
               <div class="count">{{$listsInfo['product']}}</div>
              <span class="count_top">Sản phẩm đang bán</span>
            </div>
          </div>
        </div>
    </div>
          <!-- /top tiles -->
         <!-- content -->
@stop