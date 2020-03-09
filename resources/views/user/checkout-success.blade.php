@extends('user.masterView')
@section('title','Đơn hàng của bạn')
@section('content')
		<div class="container">
			<div class="row">
			<!-- Order Details -->
					<div class="col-md-6 order-details" style="margin-left: 25%;background: #E0E6F8">
						<div style="" class="section-title text-center">
							<h3 style="font-size: 25px;color: black">Đặt hàng thành công</h3>
						</div>
						
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Mã đơn hàng của bạn:</strong></div>
								<div><strong>#{{$orderID}}</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Bạn vừa mua:</strong></div>
								<div><strong>Tạm tính</strong></div>
							</div>
							
							<div class="order-products">
								<div class="">
									@foreach(Cart::getcontent() as $products)
										<div>{{$products['name']}} X ({{$products['quantity']}})</div>
										<div style="float: right;">{{number_format($products['total'])}}(đ)</div>
									@endforeach
								</div>
							</div>
							
							 <div  class="section-title text-center">
							 	<h3 style="background: none" class="title"></h3>
							 </div>
							<div class="order-col">
								<div><strong>Giá trị đơn hàng:</strong></div>
								<div><strong >{{number_format(Cart::getTotal())}}(đ)</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Phí vận chuyển:</strong></div>
								<div><strong>{{number_format(Cart::getTotal()/10)}}(đ)</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Tổng cộng:</strong></div>
								<div><strong>{{number_format((Cart::getTotal() + Cart::getTotal()/10))}}(đ)</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Tình trạng giao hàng:</strong></div>
								<div>Đang xử lý</div>
							</div>
							<div class="order-col" >
								<div><strong>Phương thức thanh toán:</strong></div>
								<div><small>{{($payment == 'COD')?'Thanh toán khi nhận hàng':'Chuyển khoản ngân hàng'}}</small></div>
							</div>
							<div class="" >
								<div><strong>Địa chỉ giao hàng:</strong></div>
								<div style="float: right;"><small>{{$location}}</small></div>
							</div>
							<div class="order-col" >
								<div><strong>Thời gian giao hàng dự kiến:</strong></div>
								<div><small>2-5 ngày</small></div>
							</div>
						</div>
					</div>
		</div>
	</div>
	</div>
	{{Cart::Clear()}}
@stop