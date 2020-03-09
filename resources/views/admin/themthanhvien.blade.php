@extends('admin.masterView')
@section('title', 'Thêm quản trị')
@section('content')
	<div class="right_col col-md-8 col-sm-9"  role= 'main'>
			<div class="row">
			<form method="POST" action="{{url(Route('create'))}}" enctype="multipart/form-data">
				<div class="form-group">
					@if(Session::has('messages'))
						<div class="alert alert-success">
								<span>{{Session::get('messages')}}</span>
 						</div>
 					@endif
					</div>
					<div class="form-group">
						<p class = 'error-user'>{{$errors->first('name')}}</p>
						<label>Tên đăng nhập</label>
						<input type="text" name="accountName" class="form-control">
						
					</div>
					<div class="form-group">
							<p>{{$errors->first('password')}}</p>
						<label>Mật khẩu</label>
						<input type="password" name="pass" class="form-control">
						<p class= 'error-pass'></p>
					</div>
					<div class="form-group">
						<p>{{$errors->first('avatar')}}</p>
						<label>Avatar</label>
						<input type="file" name="avatar" class="form-control">
					</div>
					<div class="form-group">
							<p>{{$errors->first('name')}}</p>
						<label>Tên</label>
						<input type="text" name="name" class="form-control">
						<label></label>
					</div>
					<div class="form-group">
							<p>{{$errors->first('age')}}</p>
						<label>Tuổi</label>
						<input type="text" name="age" class="form-control">
					</div>
					<div class="form-group">
							<p>{{$errors->first('location')}}</p>
						<label>Địa chỉ</label>
						<input type="text" name="location" class="form-control">
					</div>
					<div class="form-group">
							<p>{{$errors->first('phone')}}</p>
						<label>Số điện thọai</label>
						<input type="text" name="phone" class="form-control">
					</div>
					<div class="form-group">
						<p>{{$errors->first('levels')}}</p>
						<label>Nhóm quản trị</label>
						<select class="form-control" name="levelsID">
							@foreach($levels as $lists)
								<option value="{{$lists['ID']}}">{{$lists['name']}}</option>
							@endforeach
						</select>
						<p class="erorr-levels"></p>
					</div>
					<div class="form-group">
						<button class="btn btn-primary registration-admin">Đăng ký</button>
					</div>
					 {{csrf_field()}}
			</form>
		</div>
@stop