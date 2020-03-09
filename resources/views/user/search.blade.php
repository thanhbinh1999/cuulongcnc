@extends('user.masterView')
@section('title', "Kết quả tìm kiếm : $keyword | Cửu Long CNC ")
@section('content')
	<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					@if($count >0)
					<div class="col-md-12">
						<h4>Tìm thấy <strong>{{$count}}</strong>&nbsp kết quả </h4>
					</div>
						@foreach($product as $lists)
					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<a href="{{$lists['page']}}/{{$lists['SEO']}}"><img src="public/img/{{$lists['avatar']}}" alt=""></a>
							</div>
							<div class="product-body">
								<p class="product-category">{{($lists['amountProduct'] > 0)?'Còn hàng':'Tạm hết hàng'}}</p>
								<h3 class="product-name"><a href="cat-xay/{{$lists['SEO']}}">{{$lists['name']}}</a></h3>
								<h4 class="product-price"> Giá: {{number_format($lists['price'])}}(đ)<del class="product-old-price"></del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<a href="{{$lists['page']}}/{{$lists['SEO']}}">
									<button class="quick-view"><i class="fa fa-eye"><span class="tooltipp"></span></i></button>
									</a>
								</div>
							</div>
						
							<div class="add-to-cart">
								<a href="them-vao-gio-hang/{{$lists['ID']}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button></a>
							</div>
						
						</div>
					</div>
					<!-- /product -->	
					@endforeach
				@else
					<div class="col-md-12">
						<h2>Không tìm thấy kết quả nào phù hợp với từ khóa" <strong>{{$keyword}}</strong> "</h2>
					</div>
				@endif
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->	
@stop