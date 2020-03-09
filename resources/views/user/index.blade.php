@extends('user.masterView')
@section('title','Cửa Long CNC')
@section('style')
<style type="text/css">
	
</style>
@stop
@section('content')
<!-- SECTION -->
		<div class="section content" style="">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				@if($slider->count() >0)
					<div class="col-md-12">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						  		@for($i = 0 ; $i< $slider->count() ; $i++)
						    		@if($i=0){
						    			 <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
						    		@endif
						    	 <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
						    	@endfor
						  </ol>
						  <div class="carousel-inner">
						  @foreach($slider as $lists)
						    <div class="item active">
						      <img  style="height: 300px;width: 100%" src="{{asset('public/img')}}/{{$lists['img']}}" alt="Los Angeles">
						    </div>
						  @endforeach
						  </div>
						</div>
					</div> 	
					<!-- section title -->
					<div class="col-md-12">
						<div class="row">
							<div class="newsletter section-title">
								<h3 class="title">Sản phẩm bán chạy</h3>
							</div>
						</div>
					</div>
					<!-- /section title -->
					@endif
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
									@if(!empty($product))
										@foreach($product as $lists)
											@if($lists['producttype'] == 1)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="{{$lists['page']}}/{{$lists['SEO']}}"><img src="public/img/{{$lists['avatar']}}" alt=""></a>
											</div>
											<div class="product-body">
												<p class="product-category ">{{($lists['amountProduct'] > 0)? 'Còn hàng':'Tạm hết hàng'}}</p>
												<h3 class="product-name"><a href="{{$lists['page']}}/{{$lists['SEO']}}">{{$lists['name']}}</a></h3>
												<p class="product-price">Giá: {{number_format($lists['price'])}}(đ)<del class="product-old-price"></del></p>
												<div class="product-btns">
													<a href="{{$lists['page']}}/{{$lists['SEO']}}">
														<button class="quick-view"><i class="fa fa-eye"><span class="tooltipp"></span></i></button>
													</a>
												</div>
												
											</div>
											@if($lists['amountProduct'] > 0)
											<div class="add-to-cart">
												<a href="them-vao-gio-hang/{{$lists['ID']}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
											</div>
											@endif
										</div>
										<!-- /product -->
											@endif
										@endforeach
									@endif
									</div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
					<!-- section title -->
					<div class="col-md-12">
						<div class="row">
							<div class="newsletter section-title">
								<h3 class="title">Gạch ốp hay dùng</h3>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
									@if(!empty($product))
										@foreach($product as $lists)
											@if($lists['producttype'] == 2)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="{{$lists['page']}}/{{$lists['SEO']}}"><img src="public/img/{{$lists['avatar']}}" alt=""></a>
											</div>
											<div class="product-body">
												<p class="product-category ">{{($lists['amountProduct'] > 0)? 'Còn hàng':'Tạm hết hàng'}}</p>
												<h3 class="product-name"><a href="{{$lists['page']}}/{{$lists['SEO']}}">{{$lists['name']}}</a></h3>
												<p class="product-price">Giá: {{number_format($lists['price'])}}(đ)<del class="product-old-price"></del></p>
												<div class="product-btns">
													<a href="{{$lists['page']}}/{{$lists['SEO']}}">
														<button class="quick-view"><i class="fa fa-eye"><span class="tooltipp"></span></i></button>
													</a>
												</div>
											</div>
											@if($lists['amountProduct'] > 0)
											<div class="add-to-cart">
												<a href="them-vao-gio-hang/{{$lists['ID']}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
											</div>
											@endif
										</div>
										<!-- /product -->
											@endif
										@endforeach
									@endif
									</div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
					<!-- section title -->
					<div class="col-md-12">
						<div class="row">
							<div class="newsletter section-title">
								<h3 class="title">Sơn công trình</h3>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
									@if(!empty($product))
										@foreach($product as $lists)
											@if($lists['producttype'] == 3)
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<a href="{{$lists['page']}}/{{$lists['SEO']}}"><img src="public/img/{{$lists['avatar']}}" alt=""></a>
											</div>
											<div class="product-body">
												<p class="product-category ">{{($lists['amountProduct'] > 0)? 'Còn hàng':'Tạm hết hàng'}}</p>
												<h3 class="product-name"><a href="{{$lists['page']}}/{{$lists['SEO']}}">{{$lists['name']}}</a></h3>
												<p class="product-price">Giá: {{number_format($lists['price'])}}(đ)<del class="product-old-price"></del></p>
												<div class="product-btns">
													<a href="{{$lists['page']}}/{{$lists['SEO']}}">
														<button class="quick-view"><i class="fa fa-eye"><span class="tooltipp"></span></i></button>
													</a>
												</div>
											</div>
											@if($lists['amountProduct'] > 0)
											<div class="add-to-cart">
												<a href="them-vao-gio-hang/{{$lists['ID']}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
											</div>
											@endif
										</div>
										<!-- /product -->
											@endif
										@endforeach
									@endif
									</div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<script type="text/javascript">
			$('.carousel').carousel();
		</script>
@stop
