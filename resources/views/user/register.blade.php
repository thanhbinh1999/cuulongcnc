@extends('user.masterView')
@section('title','Đăng ký tài khoản')
@section('content')
<div class="section " style="background: silver">
		<div class="container">
			<form class="login col-md-7" method="POST" action="{{Route('addUser')}}">
				<div class="row">
					<div class="col-md-7">
						<div class="billing-details" >
							<div class="form-group success-email">
							</div>
							<div class="form-group">
							@if(Session::has('success'))
								<div class="alert alert-danger" >
									<span class="error-success">
											{{Session::get('success')}}
									</span>
								</div>
							@endif
								<div class="alert alert-danger div-error" style="display: none">
									<span class="error-success">
											
									</span>
								</div>
								<div class="success alert alert-success" style="display: none">
									<span class="success-content"></span>
								</div>
								<label>Nhập  email(*)</label>
								<div class="error user-error">{{$errors->first('user')}}</div>
								<input value="" class="input user-email" type="text" name="user" placeholder="Vui lòng nhập  email">
							</div>
							<div class="form-group">
								<label>Nhập mã Pin</label>
								<div class="error user-error">{{$errors->first('pin')}}</div>
								<div class="left" >
									<input class="input" type="text" name="pin" placeholder="6 chữ số">
								</div>
								<div class="right" style="float: right;margin-top: -40px;position: relative;">
									<input  style="height: 40px;width: 70px;margin-left: 30px;background: none;color: blue;outline: none;border:none" type="button" name="send-pin" value="Lấy mã">
								</div>
							</div>
							<div class="form-group">
								<label>Mật khẩu</label>
								<div class="password-error" style="color: red">{{$errors->first('password')}}</div>
								<input class="input" type="password" name="password" placeholder="Nhập tối thiểu 6-30 ký tự bao gồm chữ và số">
							</div>
							<div class=" form-group">
								<label> Nhập lại mật khẩu</label>
								<div class="checkpassword-error" style="color: red">{{$errors->first('checkpass')}}</div>
								<input  class="input" type="password" name="checkpass" placeholder="Vui lòng nhập lại mật khấu">
							</div>
							<div class="form-group">
								<a href="login">Đã có tài khoản</a>
							</div>
							<div class="form-group">
									<button name="registration-btn" class="btn btn-primary" type="submit"> Đăng ký</button>
							</div>
							{{csrf_field()}}
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop