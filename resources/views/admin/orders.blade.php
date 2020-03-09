@extends('admin.masterView')
@section('title', 'Quản trị đơn hàng')
@section('content')
<style type="text/css">
		.prouct-list  tr td{
			width: 10%;
			text-align: center;
		}
		.form-ordDetails{
			position:absolute;
			position: fixed;
			height: 400px;
			overflow: scroll;
			display: none;
			background: #337ab7;
			color: white;
		}
	</style>
		<div class="right_col col-md-10 col-sm-9"  role= 'main'>
			<div class="row " >
				<div class="col-md-8 form-ordDetails">
					<div class="table table-responsive">
						<table class="table form-details" style="background:  #337ab7">
							<tr>
								<td colspan="6" style="">
									<button class="close" style="font-size: 35px;color: black;border: none;">X</button>
								</td>
							</tr>
							<tbody class="ordDetails">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row"  style="display: inline-block;">
				<div class="table-responsive">
					<table class="table product-list" >
						<h3>Đơn hàng chưa duyệt</h3>
						<div class="search form-inline " style="float: right;margin-bottom: 10px">
							<label>Tìm kiếm:</label><input  class="form-control keyword " type="text" name="search-ord" placeholder="Nhập Mã đơn hàng">
						</div>
						<tr class="title">
							<td>STT</td>
							<td>Mã Đơn hàng</td>
							<td>Giá trị đơn hàng</td>
							<td>Ngày mua</td>
							<td>Phương thức mua hàng</td>
							<td>Tình trạng</td>
							<td>Khách hàng</td>
							<td>SĐT</td>
							<td>Tác vụ</td>
						</tr>
						<tbody class="product-ord">
						@if(!empty($ord))
							<?php $i = 1; ?>
							@foreach($ord as $lists)
								<tr >
									<td>{{$i++}}</td>
									<td>{{$lists->ID}}</td>
									<td>{{number_format($lists->total)}}</td>
									<td>{{$lists->ordTime}}</td>
									<td>{{$lists->form}}</td>
									<td>{{$lists->StatusID}}</td>
									<td>{{$lists->name}}</td>
									<td>{{$lists->numberphone}}</td>
									<td>
										<button class="btn btn-primary view-ord" ord = "{{$lists->ID}}" title="Xem chi tiết">
											<i class="fa fa-eye" aria-hidden="true"></i>	
										</button>
										<button class="btn btn-primary pending-stt" pending-stt = "{{$lists->ID}}";  title="Duyệt">
											<i class="fa fa-check" aria-hidden="true"></i>
										</button>
										
										<button class="btn btn-success print " print-id="{{$lists->ID}}" title="In hóa đơn" >
												<i class="fa fa-print " aria-hidden="true"></i>
										</button>
										<button class="btn btn-danger delete-ord " delete-id= "{{$lists->ID}}" title="Xóa">
											<i class="fa fa-trash-o" aria-hidden="true"></i>
										</button>
									</td>
								</tr>
							@endforeach
						@else
						<tr >
							<td>Không có đơn hàng nào!</td>
						</tr>
						@endif

						</tbody>
					</table>
				</div>
			</div>
		</div>
@stop