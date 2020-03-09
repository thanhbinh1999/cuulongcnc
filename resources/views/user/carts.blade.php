@extends('user.masterView')
@section('title','Giỏ hàng của bạn')
@section('content')
	<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="order-details col-md-12 table table-responsive">
						<h3>Giỏ hàng của bạn</h3>
					@if(Cart::getcontent()->count() > 0)
						<table cellpadding="0" cellspacing="0" class="table">
							<tr style="background:#F9FAFB">
								<td>Ảnh</td>
								<td>Sản phẩm</td>
								<td>Số lượng</td>
								<td>Giá</td>
								<td>Thành tiền</td>
								<td>Xóa</td>
							</tr>
							<tbody class="product-cart">
							@foreach(Cart::getcontent() as $products)
								<tr>
									<td>
										<img style="width: 80%;height:130px;margin: 10px" src="public/img/{{$products['attributes']['avatar']}}">
									</td>
									<td>
										<a style="color: blue;font-weight: bold;" href="">{{$products['name']}}</a>
									</td>
									<td>
										<input class="quanty" type="number" value="{{$products['quantity']}}" name="amount" max = '30' min="1">
										<button   class="refresh-btn" rel-p = "{{$products['id']}}">
											<i class="fa fa-refresh" aria-hidden="true"></i>
										</button
										></td>
									<td>{{number_format($products['price'])}}</td>
									<td>{{number_format($products['total'])}}</td>
									<td><button delete-rel-p = "{{$products['id']}}" class="delete-btn" title="Xóa">Xóa</button></td>
								</tr>
								@endforeach
								</tbody>
								<tr style="background:#F9FAFB">
									<td colspan="3"><a class="col-md-5 cart-bottom left-btn" onclick="history.back()"><i class="fa fa-arrow-left" aria-hidden="true"><span>Tiếp tục mua hàng</span></i></a></td>
									<td colspan="1">Tổng cộng:</td>
									<td colspan="1" class="totalAll">{{number_format(Cart::getTotal())}}</td>
									 <td colspan="1"><a style="margin-left: 10px" href="checkout" class="col-md-10 cart-bottom right-btn"><i  class="fa fa-share" aria-hidden="true"><span>Thanh toán</span></i></a></td>
								</tr>
						</table>
					@else
						 <h4>Không có dữ liệu !</h4>
					@endif
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

@stop