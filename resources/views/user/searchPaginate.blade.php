@extends('user.masterView')
@section('title','Trang tim kiem')
@section('content')
<style type="text/css">
	table{
		margin-left: 30%;
		text-align: center;
	}

	table tr td{
		border: 1px solid;
		width: 200px;
		height: 50px;
	}
	img{
		width: 40px;
		height: 40px;
	}
</style>
	<div class="row">
		<div class="col-md-12">
			<table>
				<tr>
					<td colspan="3">
						<input type="text" name="key" id="searchh">
					</td>
				</tr>
				<tbody class="product">

				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">
		var text = {
			'productName':'',
			'page': '',
		}
		$(document).on('keyup','#searchh',function(){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
			text.productName = $(this).val();
			text.page = 1;
			search();
		});
	function search(){
			$.ajax({
				url:'timkiem',
				type:'POST',
				dataType:'json',
				data:text,
				success:function(result){
					if(result.product && result.product !=''){
						var html = '';
							html+="<tr class = 'title'>";
								html+="<td>";
									html+="ten san pham";
								html+="</td>";
								html+="<td>";
									html+="Hinh san pham";
								html+="</td>";
							html+="</tr>";
						$.each(result.product,function(key,value){
							html+="<tr>";
								html+="<td>";
									html+= value['name'];
								html+="</td>";
								html+="<td>";
									html+="<img src = 'public/img/"+value['avatar']+"'>";
								html+="</td>";
							html+="</tr>";
						});
						if(result.paginate){
							html+= result.paginate;
						}
						$(".product").html(html);
						
					}else{
						$('.product').html('');
					}
					
				}
			})
		}
	</script>
@stop