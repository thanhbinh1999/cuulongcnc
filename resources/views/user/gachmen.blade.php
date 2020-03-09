@extends('user.masterView')
@section('title','Gạch men ')
@section('content')
	<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
						@foreach($product as $lists)
					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<a href="gach-men/{{$lists['SEO']}}"><img src="public/img/{{$lists['avatar']}}" alt=""></a>
							</div>
							<div class="product-body">
								<p class="product-category">{{($lists['amountProduct'] > 0)?'Còn hàng':'Tạm hết hàng'}}</p>
								<h3 class="product-name"><a href="gach-men/{{$lists['SEO']}}">{{$lists['name']}}</a></h3>
								<h4 class="product-price"> Giá: {{number_format($lists['price'])}}(đ)<del class="product-old-price"></del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<a href="gach-men/{{$lists['SEO']}}">
									<button class="quick-view"><i class="fa fa-eye"><span class="tooltipp"></span></i></button>
									</a>
								</div>
							</div>
						@if($lists['amountProduct'] >0)
							<div class="add-to-cart">
								<a href="them-vao-gio-hang/{{$lists['ID']}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
							</div>
						@endif
						</div>
					</div>
					<!-- /product -->	
					@endforeach
					@if(Session::has('errors'))
						<div class="col-md-5">
							<span>{{Session::get('errors')}}</span>
						</div>
					@endif
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->	
@stop