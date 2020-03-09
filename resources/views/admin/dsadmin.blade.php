@extends('admin.masterView')
@section('title','Trang danh sách nhân viên')
@section('content')
<style type="text/css">
		.admin-info tr td{
			width: 13%;
		}

		img{
			width: 50%;
		}
		.product td{
			height: 110px;
			border: 1px solid silver;
		}
		.title td{
			border: 1px solid silver;
		}
		table tr td{
			width: 15%;
			text-align: center;
		}
		ul li{
			margin: 0px;
			list-style: none;
		}
		.form-update{
			background:#1C1C1C;
			position: absolute;
			height: 550px;
			overflow: scroll;
			z-index: 100;
			position: fixed;
		}
		.table tr td  label{
			color: white;
		}
		.form-admin{
			display: none;
		}
		.error{
			color: red;
		}

	</style>
	<div class="right_col col-md-10 col-sm-9"  role= 'main'>
			<div class="row" style="display: inline-block;">
				<div class="col-md-9 form-update form-admin">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td colspan="2" style=""><button class="close" style="font-size: 30px;color: white;background: none;border: none">X</button></td>
								</tr>
							<tr>
								<td><label>Ảnh đại diện:</label></td>
								<td><img class="avatar_admin"  style="width: 200px;height: 200px"></td>
							</tr>
							<tr>
								<td><label>Chọn tệp hình:</label></td>
								<td>
									<span class="error result_avatar_change"></span>
									<input type="file" id="file-img-admin" name="img_admin">
								</td>
							</tr>
							<tr>
								<td><label>Họ và tên:</label></td>
								<td>
									<span class="error name_error"></span>
									<div class="form-group">
										<input class="form-control" type="text" name="admin_name">
									</div>
								</td>
							</tr>
							<tr>
								<td><label>Tuổi</label></td>
								<td>
									<span class="error age_error"></span>
									<div class="form-group">
										<input class="form-control" type="number" name="admin_age" >
									</div>
									
								</td>
							</tr>
							<tr>
								<td><label>Địa chỉ:</label></td>
								<td>
									<span class="error location_error"></span>
									<div class="form-group">
										<input type="text"  class="form-control" name="admin_location">
									</div>
									
								</td>
							</tr>
							<tr>
								<td><label>Số điện thoại:</label></td>
								<td>
									<span class="error phone_error"></span>
									<div class="form-group">
										<input type="text"  class="form-control" name="admin_phone">
									</div>
									
								</td>
							</tr>
							
							<tr>
								<td><label>Tên tài khoản</label></td>
								<td>
									<span class="error account_error"></span>
									<div class="form-group">
										<input type="text"  class="form-control"  name="admin_account">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<label>Nhóm phân quyền:</label>
									<td>
										<div class="form-group">
											<ul class="list-group">
												@foreach($level as $lists)
												  <li class="list-group-item"><input type="radio" name="levels" value="{{$lists['ID']}}">&nbsp{{$lists['name']}}</li>
												@endforeach
											</ul>
										</div>
										<span class="error levels_error"></span>
									</td>
								</td>
							</tr>
							<tr>
								<td><button class="btn btn-primary " id="edit_admin_btn">Cập nhật</button><button class="btn btn-danger cancel">Hủy</button></td>
							</tr>
						</table>
						</div>
					</div>
				<div class="col-md-12">
					<div  class="table-responsive">
						<table class="table admin-info">
							<tr>
								<td>Avatar</td>
								<td>Tên tài khoản</td>
								<td>Tên quản trị </td>
								<td>Nhóm quản trị</td>
								<td>Trạng thái</td>
								<td>Tác vụ</td>
							</tr>
						<tbody  class="admin-lists">
							@foreach($database as $lists)
								<tr >
									<td><img  src="../public/img/<?php echo ($lists['avatar']==''|| file_exists('public/img/'.$lists['avatar'])==false)?'default-user.jpg':$lists['avatar']; ?>"></td>
									<td>{{$lists['accountName']}}</td>
									<td>{{$lists['name']}}</td>
									<td>{{$lists['levelsName']}}</td>
									<td><button class="btn btn-danger">{!!($lists['StatusID'] == 'active')?'<i class="fa fa-check" aria-hidden="true"></i>':'	<i class="fa fa-window-close" aria-hidden="true"></i>'  !!}</button></td>
									<td>
										<button  class="btn btn-primary  edit-rights-admin" admin-id="{{$lists['ID'] }}">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
										</button>
										<button  class="btn btn-danger delete-admin" admin-id= "{{$lists['ID'] }}">
												<i class="fa fa-trash-o" aria-hidden="true"></i>
										</button>
									</td>
								</tr>
							@endforeach
							</tbody>
							
						
						</table>
					</div>
				</div>
			</div>
		</div>
@stop