@extends('admin.masterView')
@section('title','báo giá sản phẩm')
@section('content')
	<div class="right_col col-md-10 col-sm-9 baogia-page"  role= 'main'>
			<div class="row " >
				<div class="col-md-12">
					<textarea id="baogia" name="baogia" class="ckeditor"></textarea>
					<button class="btn btn-primary update-baogia">Cập nhật</button>
				</div>
			</div>
		</div>
	<script type="text/javascript">
		$(document).ready(function(){
		//	$('#baogia').load(function(){
				CKEDITOR.instances['baogia'].setData("<?php echo $data[0]['content']; ?>");
		//	});
		});
	</script>
@stop