@extends('user.masterView')
@section('title'," $title ")
@section('content')
	<!-- SECTION -->
		<div class="section" style=" background: #E0E6F8">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-4 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img style="width: 250px;height:250px " src="../public/img/{{$productDetails[0]['avatar']}}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->
					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
					</div>
					<!-- /Product thumb imgs -->
					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h3 style="font-size: 20px;color: red" class="product-name">{{$productDetails[0]['name']}}</h3>
							<div>
								<h6 style="font-size: 15px;" class="product-price">Giá bán: &nbsp {{number_format($productDetails[0]['price'])}}(đ)<del class="product-old-price"></del></h6>
							</div>
							<div class="">
								<label style="color: red"><h5>Đơn vị: &nbsp {{$productDetails[0]['size']}} </h5></label><br>
							</div>
							<div class="title">
								{!!$productDetails[0]['title']!!}
							</div>
							<div class="note">
								<p style="color: red">Lưu ý: Tránh xa trực tiếp với da, sử dụng công cụ thích hợp</p>
							</div>
							<div class="add-to-cart">
								<a href="../them-vao-gio-hang/{{$productDetails[0]['ID']}}">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Mua ngay</button>
								</a>
							</div>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
						@if(!empty($productDetails[0]['description']))
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Chi tiết</a></li>
								<li class=""><a data-toggle="tab" href="#tab2">Hướng dẫn </a></li>
								
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content" style=" background: white">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<div style="margin: 5px;">
												{!!$productDetails[0]['description']!!}
											</div>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12" style="margin: 5px">
											{!!$productDetails[0]['guide']!!}
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
						@endif
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
	@if($relatedProduct->count()>0)
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 style="margin-left: 0%;" class="title">Sản phẩm liên quan</h3>
						</div>
					</div>

					<!-- product -->
				@foreach($relatedProduct as $lists)
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<a href="{{$lists['SEO']}}"><img src="../public/img/{{$lists['avatar']}}" alt=""></a>
							</div>
							<div class="product-body">
								<p class="product-category">{{($lists['amountProduct'] !=0)?'Còn hàng':'Tạm hết hàng'}}</p>
								<h3 class="product-name"><a href="{{$lists['SEO']}}">{{$lists['name']}}</a></h3>
								<h4 class="product-price">{{($lists['price']!=0)?number_format($lists['price']).'(vnđ)':'Liên hệ'}} <del class="product-old-price"></del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<a href="{{$lists['SEO']}}">
										<button  class="quick-view">
											<i class="fa fa-eye"></i>
											
										</button>
									</a>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="{{route('themvaogiohang',[$lists['ID']])}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
							</div>
						</div>
					</div>
					<!-- /product -->	
				@endforeach	
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
		@endif
@stop