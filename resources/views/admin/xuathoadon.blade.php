<!DOCTYPE html>
<html>
<head>
	<title>Xuất hoa đơn</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		#product td{
			border-style: dotted;
		}
	</style>
</head>
<body style="background: white" >
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="margin: auto;">
				<div class="col-md-7" style="margin: 0 10% 0 0% ;border: 1px solid silver;">
				@if(!empty($orddetails))
					<div class="form">
						<div class="left col-md-5" >
							<div class="logo" style="margin-top: 10px">
								<img style="width: 200px;height: 100px;" src="../public/img/logo-5002.png">
							</div>
						</div>
						<div class="right col-md-7">
							<div class="title">
								<h5>Công ty TNHH thương mại và dịch vụ Cửu Long CNC</h5>
								<small>MST:08-453-233-44</small><br>
								<small>Địa chỉ:561A Điện Biên Phủ, Phường 25, Bình Thạnh, Hồ Chí Minh</small><br>
								<small>Điện thoại (hotline): 19001544</small><br>
								<small>Website: cuulongcnc.com</small>
							</div>
						</div>
						
						<div class="col-md-11" style="text-align: center;margin-left: 40%">
							<h4>HÓA ĐƠN BÁN HÀNG</h4>
							<h6 >Số hóa đơn:#{{$orddetails[0]['ID']}}</h6>
						</div>
						<div class="col-md-12" style="margin-top: 5%;margin-left: 0%">
							<label>Họ tên khách hàng: &nbsp  {{$orddetails[0]['customerName']}}</label><br>
							<label>Điện thoại:&nbsp {{$orddetails[0]['numberphone']}}</label><br>
							<label>Địa chỉ: &nbsp {{$orddetails[0]['address']}} </label>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table">
									<tr >
										<td colspan="2">
											<label>STT</label>
										</td>
										<td colspan="2">
											<label>Tên hàng hóa</label>
										</td>
										<td colspan="2">
											<label>Số lượng</label>
										</td>
										<td colspan="2">
											<label>Đơn giá</label>
										</td>
										<td colspan="2">
											<label>Thành tiền</label>
										</td>
									</tr>
							<?php  $i  =1 ;?>
							@foreach($orddetails as $lists)
									<tr class="product">
										<td colspan="2">{{$i++}}</td>
										<td colspan="2">{{$lists['name']}}</td>
										<td colspan="2">{{$lists['amountProduct']}}</td>
										<td colspan="2">{{number_format($lists['price'])}}</td>
										<td colspan="2">{{number_format($lists['total'])}}</td>
									</tr>
							@endforeach
									<tr>
										<td colspan="8" style="text-align: right;">
											<label>Tổng cộng</label>
										</td>
										<td colspan="2">
											<label>{{number_format($lists['total'])}}</label>
										</td>
									</tr>
								</table>
							</div>
							<div class="col-md-12" style="margin-right: 0px;width: 100%">
								<label style="margin-top: -130px" > <small>Cộng thành tiền ghi bằng chữ:...............................................................................................................................................................................................................................</small></label>
							</div>
							<div class="col-md-6" style="padding-bottom: 40px;margin-top: 50px;margin-right: 30%">
								<h4>Người mua hàng</h4>
								<p>(ký, ghi rõ họ tên)</p>
							</div>
							<div class="col-md-6" style="margin-top: 30px;margin-bottom: 40px">
								<label style="margin-top: -30px">Ngày.............Tháng...........Năm 20......</label>
								<h4>Người bán hàng</h4>
								<p>(ký ,ghi rõ họ tên)</p>
							</div>
						</div>
					</div>
				@else
					<h4>Không có thông tin hóa đơn</h4>
				@endif
				</div>
			</div>
		</div>
	</div>
</body>
</html>