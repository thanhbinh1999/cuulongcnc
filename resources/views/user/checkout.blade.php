@extends('user.masterView')
@section('title' , 'checkout đơn hàng')
@section('content')
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<form  method="POST" class="payment " novalidate action="{{url('checkout-success')}}">
				<div class="row">
					<div class="col-md-4">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="form-group">

								 <label>Họ và tên</label>
								@if($errors->first('full-name'))
									<p class="errors">{{$errors->first('full-name')}}</p>
								@endif
								 <input  class="input" type="text" name="fullName" value="">
							</div>
							<div class="form-group">
								<label>Số điện thoại</label>
								@if($errors->first('numberPhone'))
									<p class="errors">{{$errors->first('numberPhone')}}</p>
								@endif
								<input  class="input" type="text" name="numberPhone" value="">
							</div>
							<div class="form-group">
								<label>Email</label><input class="input" type="email" name="email" value="">
							</div>
							<div class="form-group">
								<label>Tỉnh/ Thành Phố</label>
								@if($errors->first('province'))
									<p class="errors">{{$errors->first('province')}}</p>
								@endif
								@if($province->count() > 0)
								<select class="input province" name="province" >
									@foreach($province as $lists)
										<option value="{{$lists['ID']}}">{{$lists['name']}}</option>
									@endforeach
								</select>
								@else
									<span>Không có dữ liệu!</span>
								@endif
							</div>
							<div class="form-group">
								<label>Quận / huyện</label>
								@if($errors->first('district'))
									<p class="errors">{{$errors->first('district')}}</p>
								@endif
							@if($district->count() > 0)
								<select class="input district-list" name="district">
									<option value=""> --- &nbsp Chọn Quận/huyện &nbsp--- </option>
									@foreach($district as $lists)
										<option value="{{$lists['ID']}}">{{$lists['name']}}</option>
									@endforeach
								</select>
							@else
								<span>Không có dữ liệu</span>
							@endif
							</div>
							<div class="form-group">
								<label>Phường/ Xã </label>
								@if($errors->first('town'))
									<p class="errors">{{$errors->first('town')}}</p>
								@endif
								<select class="input town-list" name="town">
									<option> ---&nbsp Chọn Phường/Xã &nbsp--- </option>
								</select>
							</div>
							<div class="form-group">
								<label>Số nhà / Tên đường</label>
								@if($errors->first('house'))
									<p class="errors">{{$errors->first('house')}}</p>
								@endif
								<input class="input" type="text" name="house" value="">
							</div>
						</div>
						<!-- /Billing Details -->
						<!-- Order notes -->
						<div class="order-notes">
							<label>Yêu cầu khác</label>
							<textarea class="input" name="notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details" >
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Sản phẩm:</strong></div>
								<div><strong>Tạm tính</strong></div>
							</div>
							@foreach(Cart::getcontent() as $products)
							<div class="order-products">
								<div class="order-col">
									<div>{{$products['name']}} x {{$products['quantity']}}</div>
									<div>{{number_format($products['total'])}}(đ)</div>
								</div>
							</div>
							@endforeach
							<div class="order-col">
								<div>Phí vận chuyển</div>
								<div><strong>{{number_format(Cart::getTotal()/10)}}(đ)(10%)</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Tổng cộng</strong></div>
								<div><strong class="order-total">{{number_format(Cart::getTotal())}}(đ)</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="section-title text-center">
							<h3 class="title">Thanh toán</h3>
							@if($errors->first('payment'))
									<p class="errors">{{$errors->first('payment')}}</p>
								@endif
						</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1" value="COD">
								<label for="payment-1">
									<span></span>
									Thanh toán Khi nhận hàng (COD)
								</label>
								<div class="caption">
									<p>Hàng sẽ được giao cho đơn vị vận chuyển , quý khách vui lòng chuẩn bị đủ số tiền khi nhận hàng</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2" value="card">
								<label for="payment-2">
									<span></span>
									Chuyển khoản ngân hàng
								</label>
								<div class="caption">
									<p>Bằng các hình thức thanh toán tại ngân hàng Viettin Bank , EximBank</p>
								</div>
							</div>
						</div>
						<input type="submit" class="primary-btn" id=" order-submit" name="submit-btn" value="Đặt hàng">
							{{csrf_field()}}
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</form>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@stop