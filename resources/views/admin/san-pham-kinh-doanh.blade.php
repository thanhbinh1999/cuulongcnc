@extends('admin.masterView')
@section('title','Hệ thống quản trị trực tuyến')
@section('content')
<style type="text/css">
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
	</style>
	<div class="right_col col-md-10 col-sm-9"  role= 'main'>
				<div class="row" >
					<div class="col-md-9 form-update form-add">
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
								<div  class="alert alert-danger success-update" ></div>
								<div  class="alert alert-danger success-add" ></div>
								<td><label>Ảnh sản phẩm:</label></td>
								<td><img class="avatar" style="width: 70px;height: 70px"></td>
							</tr>
							<tr>
								<td><label>Hình mới:</label></td>
								<td>
									<span class="error result_avatar"></span>
									<input type="file" id="file-img">
								</td>
							</tr>
							<tr>
								<td>
									<label>Danh mục:</label>
									<td>
										<div class="form-group">
											<select class="form-control category">
												@if(!empty($category))
													@foreach($category as $cateLists)
														<option value="{{$cateLists['ID']}}">{{$cateLists['name']}}</option>
													@endforeach
												@endif
											</select>
										</div>
										<span class="error _category"></span>
									</td>
								</td>
							</tr>
							<tr>
								<td>
									<label>Hãng sản xuất:</label>
									<td>
										<div class="form-group">
											<select class="form-control  producer">
												@if(!empty($producer))
													@foreach($producer as $cateLists)
														<option value="{{$cateLists['ID']}}">{{$cateLists['name']}}</option>
													@endforeach
												@endif
											</select>
										</div>
										<span class="error _producer"></span>
									</td>
								</td>
							</tr>
							<tr>
								<td><label>Tên sản phẩm:</label></td>
								<td>
									<span class="error name"></span>
									<div class="form-group">
										<input class="form-control" type="text" name="productName">
									</div>
								</td>
							</tr>
							<tr>
								<td><label>Giá:</label></td>
								<td>
									<span class="error price"></span>
									<div class="form-group">
										<input class="form-control" type="number" name="productPrice" >
									</div>
									
								</td>
							</tr>
							<tr>
								<td><label>Số lượng:</label></td>
								<td>
									<span class="error amount"></span>
									<div class="form-group">
										<input type="number"  class="form-control" name="productQty">
									</div>
									
								</td>
							</tr>
							<tr>
								<td><label>Màu:</label></td>
								<td>
									<span class="error color"></span>
									<div class="form-group">
										<input type="text"  class="form-control" name="productColor">
									</div>
									
								</td>
							</tr>
							<tr>
								<td><label>Quy cách:</label></td>
								<td>
									<span class="error size"></span>
									<div class="form-group">
										<input type="text"  class="form-control"  name="productsize">
									</div>
									
								</td>
							</tr>
							<tr>
								<td><label>Mô tả:</label></td>
								<td class="form-group">
									<textarea  name="editor1 productTitle" id="productTitle" class="ckeditor productTitle"></textarea>
								</td>
							</tr>
							<tr>
								<td><label>Chi tiết</label></td>
								<td class="form-group">
									<textarea name="editor1" id="details" class="ckeditor"></textarea>
								</td>
							</tr>
							<tr>
								<td><label>Hướng dẫn thi công</label></td>
								<td class="form-group">
									<textarea id="guide" name="editor1" class="ckeditor"></textarea>
								</td>
							</tr>
							<tr>
								<td><button class="btn btn-primary add">Cập nhật</button><button class="btn btn-danger cancel">Hủy</button></td>
							</tr>
						</table>
						</div>
					</div>
				</div>
				<div class="row" style="display: inline-block;">
					<div class="table-reponsive">
						<table class="table" style="color: black;">
							<h3>sản phẩm đang kinh doanh</h3>
								<div>
									<div class="insert" style="float: left;margin-bottom: 10px">
										<button class="btn btn-danger add-new-product">Tạo sản phẩm mới</button>
									</div>
									<div class="search" style="float: right;margin-bottom: 10px">
										<label>Tìm kiếm:</label><input type="text"  name="search-product">
										{{csrf_field()}}
									</div>
								</div>
						@if(!empty($productLists))
							<tr class="title" >
								<td>STT</td>
								<td >Ảnh sản phẩm</td>
								<td>Tên sản phẩm</td>
								<td>Giá</td>
								<td >Trạng thái</td>
								<td>Tác vụ</td>
							</tr>
							<tbody class="product-tbody">
								<?php $i = 1; ?>
								@foreach($productLists as $lists)
								<tr class="product">
									<td>{{$i++}}</td>
									<td><img style="width: 100px;height: 100px" 
										src="
											{{asset('public/img/'.$lists['avatar'])}}
										">
									</td>
									<td>{{$lists['name']}}</td>
									<td>{{number_format($lists['price'])}}</td>
									<td><button class="btn  {{($lists['StatusID'] == 'active')?'btn-primary':'btn-danger'}}">{{($lists['StatusID'] == 'active')? 'Đang bán':'Tạm ngưng'}}</button></td>
									<td>
										<button rol-e="{{$lists['ID']}}" class="btn btn-primary edit">
											{{csrf_field()}}
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
										</button >
										<button rol-d="{{$lists['ID']}}" class="btn btn-danger delete">
											<i class="fa fa-trash-o" aria-hidden="true"></i>
										</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="page">
							<ul class="pagination">
								{{$productLists->links()}}
							</ul>
						</div>
						
					@else
						<h5>Chưa có sản phẩm nào!</h5>
					@endif
					</div>
				</div>
			</div>
@stop