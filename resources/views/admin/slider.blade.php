@extends('admin.masterview')
@section('title', 'Quản trị slider')
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
		.update-slider{
			background:#610B21;
			position: absolute;
			height: 550px;
			overflow: scroll;
			z-index: 100;
			position: fixed;
			display: none;
			
		}
		.update-slider tr td {
			color:white;
			border: 1px solid;
		}
		.pagination li{
			cursor: pointer;
		}
		 img{
			width:100%;
			height: 300px;
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
					<div class="col-md-9 col-sm-10 update-slider" >
						<div class="table-responsive">
							<table class="table">
								<div style="margin-top: 10px">
									<div class="right" style="float: right">
										<button class="exit" style="font-size: 30px;color: white;background: black;border: none">X</button>
									</div>
								</div>
								<tr class="title" >
									<h3 style="color: red" class="result_avatar"></h3>
									<td ><input type="file" name="slider-img" class="form-control"></td>
								</tr>
								<tr>
									<td><img class="slider_images"></td>
								</tr>
							</table>
							
							<button class="btn btn-primary   btn-update-slider">Xác nhận</button>
						</div>
					</div>
				</div>
				<div class="row" style="display: inline-block;">
					<div class="col-md-11" >
						<div class="table-responsive">
							<table class="table">
								<h3>Quản trị slider</h3>
								<button style="float: right;" class="btn btn-danger edit-product-type  insert-product-type " value="1">Thêm</button>
							@if(!empty($slider))
								<tr class="title" >
									<td>STT</td>
									<td >Images</td>
									<td>Trạng thái</td>
									<td>Tác vụ</td>
								</tr>
								<tbody class="slider-tbody">
									<?php $i  =1; ?>
								@foreach($slider as $lists)
										<tr class="product">
											<td>{{$i++}}</td>
											<td><img style="width: 290px;height: 100px;" src="../public/img/{{$lists['img']}}"></td>
											<td><button class="btn btn-primary">Đang hiển thị</button></td>
											<td>
												<button class="btn btn-primary edit-slider" slider-id = "{{$lists['ID']}}">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</button >
												<button class="btn btn-danger delete-slider" slider-id = "{{$lists['ID']}}">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</button>
											</td>
										</tr>
								@endforeach
								</tbody>
							@else
							<tr>Không có slider nào !</tr>
							@endif
							</table>
						</div>
					</div>
				</div>
			</div>
@stop