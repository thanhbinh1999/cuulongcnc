@extends('user.masterView')
@section('title','Báo giá vật tư xây dựng')
@section('content')
	<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-10">
						{!!$details[0]['content']!!}
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->	
@stop