@extends('admin.masterView')
@section('title','Trang danh sách khách hàng')
@section('content')
<style type="text/css">
		.customer-info tr td{
			width: 20%;
			text-align: center;
		}
	</style>
		<div class="right_col col-md-12 col-sm-9"  role= 'main'>
			<div class="row" style="display: inline-block;">
				<div class="col-md-10">
					<div  class="table-responsive">
						<table class="table customer-info">
						@if(!empty($customer))
							<tr>
								<td>STT</td>
								<td>Email</td>
								<td>SĐT</td>
								<td>Ngày tạo</td>
								<td>Trạng thái</td>
								<td>Tác vụ</td>
							</tr>
							<tbody class="list">
							<?php $i = 1; ?>
							@foreach($customer as $lists)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$lists['email']}}</td>
									<td>{{$lists['numberphone']}}</td>
									<td>{{$lists['created_at']}}</td>
									<td><button class="btn {{ ($lists['StatusID'] =='active')?'btn-primary':' btn-danger'}}">{{$lists['StatusID']}}</button></td>
									<td>
										{!!($lists['StatusID'] == 'active')?"<button class='btn btn-danger lock-user' rol-d = '$lists[ID]' title='Khóa tài khoản'>
											<i class='fa fa-unlock' aria-hidden='true'></i>":"</button><button class='btn btn-danger open-user btn' rol-d = '$lists[ID]'title='Mở khóa tài khoản'>
											<i class='fa fa-lock' aria-hidden='true'></i>
										</button>"!!}
									</td>
								</tr>
							@endforeach
							</tbody>
						@else
							<tr>
								<td>Không có khách hàng nào !</td>
							</tr>
						@endif

						</table>
					</div>
				</div>
			</div>
		</div>
@stop