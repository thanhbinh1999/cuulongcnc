@extends('user.masterView')
@section('title','feff')
@section('content')
<style type="text/css">
	img{
		width: 100px;
		height: 100px;
	}
	.page-link{
		cursor: pointer;
	}
	table tr td{
		width: 25%;

	}
</style>
	<div class="section">
		<div class="container">
			<div class="row">
				
				<div class="col-md-12">
					<table class="table-lists">
						<tr>
							<td>STT</td>
							<td>Ten san pham</td>
							<td>Images</td>
						</tr>
						<tbody class="productList">
							@if($product->count()> 0)
								<?php $i = 1 ; ?>
								@foreach($product as $lists)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$lists['name']}}</td>
										<td><img src="{{asset('public/img/')}}/{{$lists['avatar']}}"></td>
									</tr>
								@endforeach
							@endif
						</tbody>
						<tr>
							<td colspan="3" style="margin: auto;"><button class="bnt btn-primary add-page">Xem thêm | {{$count}}</button></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			var table = $('.productList');
			var bnt_click = $('.add-page');
			var page = 1;
			var stt= 1;
			 stt += page*5;
			$(document).on('click','.add-page',function(){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
				page++;
				bnt_click.text('Đang tải...');
				$.ajax({
					url:'sanpham/page',
					data:{'page':page},
					dataType:'json',
					type:'POST',
					success:function(result){
						if(result.products){
							var html = '';
							$.each(result.products,function(key,value){
								html+="<tr>";
									html+="<td>"+(stt++)+"</td>";
									html+="<td>"+value['name']+"</td>";
									html+="<td><img src = 'public/img/"+value['avatar']+"'></td>";
								html+="</tr>";
							});
							table.append(html);
						}
						if(result.count >0){
							bnt_click.text("Xem thêm |  "+result.count+"");

						}else{
							bnt_click.hide();
						}
					}
				});
				
			});
		});
	</script>
@stop