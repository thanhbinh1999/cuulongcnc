@extends('user.masterView')
@section('title','Đơn hàng của bạn')
@section('content')
	<div class="section" style="background: silver">
		<div class="container ">
			<div class="row " style="background: white">
				<div class="col-md-12">
					<h3>Đơn hàng của tôi</h3>
					<div class="table-responsive">
						<table class="table">
							<tbody class="table-tbody">
								<tr>
									<td colspan="4">Hiển thị:</td>
									<td>
										<select  class="next-select-content">
											<option  selected value="5">5 Đơn hàng gần đây</option>
											<option  value="10"  >10 Đơn hàng gần đây</option>
											<option value="all" >Tất cả đơn hàng</option>
										</select>
									</td>
								</tr>
						<tbody class="database">
					@if($ord->count() > 0 )
						@foreach($ord as $ordd)
							<tr style="background: silver">
									<td style="text-align: left;" colspan="4">
										<p style="color: blue">Mã đơn hàng: &nbsp #{{$ordd['ID']}}</p>
										<p>Đặt ngày: &nbsp {{$ordd['created_at']}}</p>										
										<p>Tình trạng:
											@if($ordd['StatusID'] == 'pending')
										<button class="btn btn-primary">Chưa xử lý</button>
									@endif
									@if($ordd['StatusID'] == 'approve')
										<button class="btn btn-primary">Đã xử lý</button>
									@endif
									@if($ordd['StatusID'] == 'delete')
										<button class="btn btn-danger">Đã hủy</button>
									@endif
										</p>
									</td>
									<td style="text-align: right" colspan="1"><a style="color: blue" href="{{route('getOrder',['id' => $ordd['ID']])}}">Chi tiết</a></td>
							</tr>
							@foreach($orddetails as $products)
								@if($products['ordID'] == $ordd['ID'])
									<tr>
										<td>
											<img style="width: 80px;height: 90px" src="public/img/{{$products['avatar'] }}">
										</td>
										<td>
											<p>{{$products['name']}}</p>
										</td>
										<td>
											<p>Số lượng: &nbsp {{$products['amountProduct']}}</p>
										
										</td>
										<td></td>
										<td><p>Ngày giao hàng:  &nbsp Dự kiến 2-5 ngày</p></td>
									</tr>
								@endif
							@endforeach
						@endforeach
					@else
								<tr>
									<td>Chưa có đơn hàng nào được mua !</td>
								</tr>
					@endif
				</tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop