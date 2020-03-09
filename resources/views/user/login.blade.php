@extends('user.masterView')
@section('title','Cửa Long CNC')
@section('content')
	<div class="section " style="background: silver">
		<div class="container">
			<form class="login col-md-7" method="POST">
				<div class="row">
					<div class="col-md-7">
						<div class="billing-details" >
							<form method="POST" action="{{url('login')}}">
								<div class="form-group">
								@if(Session::has('messages'))
									<div class="alert alert-danger">
										<span class="errors">{{Session::get('messages')}}</span>
									</div>
								@endif
									<label> Email(*)</label>
										<input value="" class="input form-control" type="text" name="user" placeholder="Email của bạn">
									<label class=" error error-account">{{$errors->first('user')}}</label>
								</div>
								<div class="form-group">
									<label>Mật khẩu(*)</label>
										<input class="input form-control" type="password" name="password" >
									<label class=" error error-password">{{$errors->first('password')}}</label>
								</div>
								<div class="form-group">
									<a href="forget-password">Quên mật khẩu</a>
								</div>
								<div class="form-group">
									<button   name="login-btn" class="btn btn-danger" type="submit"> Đăng nhập</button>
								</div>
							</div>
							{{csrf_field()}}
						</form>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop