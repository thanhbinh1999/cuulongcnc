@extends('admin.masterView')
@section('title' , 'Sản phẩm gợi ý')
@section('content')
<style type="text/css">
		.product td{
			height: 110px;
			border: 1px solid silver;
		}
		.title td{
			border: 1px solid silver;
		}
		.product-list td{
			width: 15%;
		}
		table tr td{
			width: 15%;
			text-align: center;
		}
		table  tbody tr td{
			width: 15%;
			text-align: center;
		}
		ul li{
			margin: 0px;
			list-style: none;
		}
		.update-producttype{
			background:#610B21;
			position: absolute;
			height: 550px;
			overflow: scroll;
			z-index: 100;
			position: fixed;
			display: none;
		}
		.update-producttype tr td {
			color:white;
			border: 1px solid;
		}
		.pagination li{
			cursor: pointer;
		}
		.avatar_form img{
			width: 70px;
			height: 80px;
		}
		.backgroud-paginate{
			background: blue;
		}
		input[type=checkbox], input[type=radio] {
    		width: 80px;
    	}
}

	</style>
		<div class="right_col col-md-10 col-sm-10"  role= 'main'>
				<div class="row">
					<div class="col-md-9 col-sm-10 update-producttype" >
						<div class="table-responsive">
							<table class="table">
								<div style="margin-top: 10px">
									<div class="left" style="float: left;">
										<label>Tìm kiếm:</label><input type="text" name="">
									</div>
									<div class="right" style="float: right">
										<button class="exit" style="font-size: 30px;color: white;background: black;border: none">X</button>
									</div>
								</div>
								<tr class="title" >
									<td >Ảnh sản phẩm</td>
									<td>Tên sản phẩm</td>
									<td>Giá</td>
									<td>Trạng thái</td>
									<td>Chọn</td>
								</tr>
								<tbody class="product-list">
								</tbody>
							</table>
							<nav aria-label="Page navigation example">
								<ul class="pagination"></ul>
							</nav>
							<button class="btn btn-primary checked-type add-type-product">Xác nhận đăng ký</button>
						</div>
					</div>
				</div>
				<div class="row" style="display: inline-block;">
					<div class="col-md-11" >
						<div class="table-responsive">
							<table class="table">
								<h3>Sản phẩm bán chạy</h3>
								<button style="float: right;" class="btn btn-danger edit-product-type  insert-product-type " value="1">Thêm</button>
								<tr class="title" >
									<td>STT</td>
									<td >Ảnh sản phẩm</td>
									<td>Tên sản phẩm</td>
									<td>Giá</td>
									<td>Trạng thái</td>
									<td>Tác vụ</td>
								</tr>
								<tbody class="product-tbody-1">
								@if(!empty($banchay))
									<?php $i= 1; ?>
									@foreach($banchay as $lists)
										<tr class="product">
											<td>{{$i++}}</td>
											<td><img style="width: 100px;height: 100px;" src="../public/img/{{$lists['avatar']}}"></td>
											<td>{{ $lists['name'] }}</td>
											<td>{{number_format($lists['price'])}}</td>
											<td><button class="btn btn-primary">Đang hiển thị</button></td>
											<td>
												<button rol-type ="{{$lists['producttype']}}" rol-id = "{{$lists['ID']}}" class="btn btn-primary edit-product-type">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</button >
												<button rol-type="{{$lists['producttype']}}" rol-id= "{{$lists['ID']}}" class="btn btn-danger delete-product-type">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</button>
											</td>
										</tr>
									@endforeach
								@else
									<span>Không có sản phẩm nào</span>
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row" style="display: inline-block;">
					<div class="col-md-11" >
						<div class="table-responsive">
							<table class="table">
								<h3>Gạch ốp hay dùng</h3>
								<button style="float: right;" class="btn btn-danger edit-product-type insert-product-type" value="2">Thêm</button>
								<tr class="title" >
									<td>STT</td>
									<td >Ảnh sản phẩm</td>
									<td>Tên sản phẩm</td>
									<td>Giá</td>
									<td>Trạng thái</td>
									<td>Tác vụ</td>
								</tr>
								<tbody class="product-tbody-2">
								@if(!empty($gach))
									<?php $i= 1; ?>
									@foreach($gach as $lists)
										<tr class="product">
											<td>{{$i++}}</td>
											<td><img style="width: 100px;height: 100px;" src="../public/img/{{$lists['avatar']}}"></td>
											<td>{{ $lists['name'] }}</td>
											<td>{{number_format($lists['price'])}}</td>
											<td><button class="btn btn-primary">Đang hiển thị</button></td>
											<td>
												<button rol-type ="{{$lists['producttype']}}" rol-id = "{{$lists['ID']}}" class="btn btn-primary edit-product-type">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</button >
												<button rol-type="{{$lists['producttype']}}" rol-id= "{{$lists['ID']}}" class="btn btn-danger delete-product-type">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</button>
											</td>
										</tr>
									@endforeach
								@else
									<span>Không có sản phẩm nào</span>
								@endif

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row" style="display: inline-block;">
					<div class="col-md-11" >
						<div class="table-responsive">
							<table class="table">
								<h3>Sơn công trình</h3>
								<button style="float: right;" class="btn btn-danger edit-product-type insert-product-type" value="3">Thêm</button>
								<tr class="title" >
									<td>STT</td>
									<td >Ảnh sản phẩm</td>
									<td>Tên sản phẩm</td>
									<td>Giá</td>
									<td>Trạng thái</td>
									<td>Tác vụ</td>
								</tr>
								<tbody class="product-tbody-3">
								@if(!empty($nuocson))
									<?php $i= 1; ?>
									@foreach($nuocson as $lists)
										<tr class="product">
											<td>{{$i++}}</td>
											<td><img style="width: 100px;height: 100px;" src="../public/img/{{$lists['avatar']}}"></td>
											<td>{{ $lists['name'] }}</td>
											<td>{{number_format($lists['price'])}}</td>
											<td><button class="btn btn-primary">Đang hiển thị</button></td>
											<td>
												<button rol-type ="{{$lists['producttype']}}" rol-id = "{{$lists['ID']}}" class="btn btn-primary edit-product-type">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</button >
												<button rol-type="{{$lists['producttype']}}" rol-id= "{{$lists['ID']}}" class="btn btn-danger delete-product-type">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</button>
											</td>
										</tr>
									@endforeach
								@else
									<span>Không có sản phẩm nào</span>
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
@stop