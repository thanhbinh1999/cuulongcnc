@extends('user.masterView')
@section('title','Đơn hàng đã đặt')
@section('content')
<div style="background: silver;">
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="margin: 25px 0 25px 0">
					<div class="col-md-5 " style="background: white">
						<div class="table-responsive">
							<table class="table" >
								<tbody>
									<tr>
										<td><h5>Sản phẩm</h5></td>
									</tr>
								
									@foreach($ord as $products)
										<tr>
											<td><img style="width: 80px;height: 90px" src="../public/img/{{$products['avatar']}}"></td>
											<td>{{$products['productName']}}</td>
											<td>{{$products['name']}}</td>
											<td>qty:{{ $products['amountProduct']}}</td>
											<td>{{ number_format($products['price'])}}(đ)</td>
										</tr>
									@endforeach
								
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-6" style="background: white;margin-left: 25px">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>
										<h5>Tổng cộng</h5>
									</td>
								</tr>
								<tr>
									<td>Tạm tính</td>
									<td>{{number_format($ord[0]['total'] - $ord[0]['form'])}}(đ)</td>
								</tr>
								<tr>
									<td>Phí vận chuyển</td>
									<td>{{number_format($ord[0]['total']/ 10 )}}(đ)</td>
								</tr>
								<tr>
									<td>Tổng cộng</td>
									<td><h4>{{number_format($ord[0]['total'])}}(đ)</h4></td>
								</tr>
								<tr>
									<td colspan="2"></td>
								</tr>
							
							</table>
						</div>
					</div>
					<div class="col-md-6" style="background: white;margin-top: 20px;">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td><h5>Địa chỉ giao hàng</h5></td>
									<tr>
										<td><label>Tên người nhận:</label> &nbsp{{$ord[0]['userName']}}</td>
									</tr>
								</tr>
								<tr>
									<td><label>Nơi nhận: &nbsp</label>
										{{$ord[0]['address']}}
									</td>
								</tr>
								<tr>
									<td><label>SĐT: &nbsp</label>
										{{$ord[0]['numberphone']}}
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
					
			</div>

		</div>
	</div>
@stop