@extends('admin.masterView')
@section('title', 'Quản trị nhà cung cấp')
@section('content')
	<style type="text/css">
		.producer td{
			height: 20px;
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
			display: none;
			position: fixed;
		}
		.table tr td  label{
			color: white;
		}
		.error{
			color: red;
			font-size: 20px;
		}
		.success-update{
			display: none;
		}
		.success-add{
			display: none;
		}
		.error-name{
			color: red;
		}
		.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.form-producer{
	display: none;
}
	</style>
	<div class="right_col col-md-10 col-sm-9"  role= 'main'>
				<div class="row" >
					<div class="col-md-9 form-producer form-update">
						<div class="table-responsive">
							<table class="table">
								<tr class="messenger" style="display: none">
									<td colspan="4">
										<div class="aler alert-danger  messenger-success" style="font-size: 30px"></div>
									</td>
								</tr>
								<tr>
									<td colspan="2" style=""><button class="close" style="font-size: 30px;color: white;background: none;border: none">X</button></td>
								</tr>
							<tr>
								<td><label>Tên nhà cung cấp</label></td>
								<td>
									<span class="error-name"></span>
									<div class="form-group">
										<input class="form-control producerName "type="text" >
									</div>
								</td>
							</tr>
							<tr>
								<td><label>Trạng thái</label></td>
								<td>
									<label class="switch">
										<input class="check-togge" type="checkbox"  id="check-lick" >
										<span class="slider round"></span>
									</label>
								</td>
							</tr>
							<tr>
								<td><button class="btn btn-primary update_producer">Cập nhật</button><button class="btn btn-danger cancel">Hủy</button></td>
							</tr>
						</table>
						</div>
					</div>
				</div>
				<div class="row" style="display: inline-block;">
					<div class="table-reponsive">
						<table class="table" style="color: black;">
							<h3>Tạo cung cấp</h3>
								<div>
									<div class="insert" style="float: left;margin-bottom: 10px">
										<button class="btn btn-danger add-new-producer">Tạo nhà cung cấp</button>
									</div>
							<tr class="title" >
								<td>STT</td>
								<td >Tên nhà cung cấp</td>
								<td>Trạng thái</td>
								<td>Tác vụ</td>
							</tr>
							<tbody class="producer-tbody">
								<?php $i = 1; ?>
							@foreach($producers as $lists)
								
								<tr class="producer">
									<td>{{$i++}}</td>
									<td>{{$lists['name']}}</td>
									<td>
										 <button class="btn btn-{{($lists['statusID'] == 'active')?'primary':'danger'}}">
										 	{{($lists['statusID'] == 'active')?'Đang cung cấp':'Ngưng cung cấp'}}
										 </button>
									</td>
									<td>
										<button  class="btn btn-primary edit-producer" edit-producer-id = "{{$lists['ID']}}">
										
											<i class="fa fa-pencil-square-o " aria-hidden="true"></i>
										</button >
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<div class="page">
							<ul class="pagination">
							
							</ul>
						</div>
					
					</div>
				</div>
			</div>
@stop