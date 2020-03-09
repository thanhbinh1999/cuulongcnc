$(document).ready(function(){
	
	 function formatNumber(nStr, decSeperate, groupSeperate) {
            nStr += '';
            x = nStr.split(decSeperate);
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
            }
            return x1 + x2;
       }
	$(document).on("click",".menu-item",function(){
		$(this).parent("td").addClass("active");
	})

	$(document).on("keyup","#search",function(){
		
		
		if($(this).val().length >1){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
			$.ajax({
				url:'product/search',
				dataType:'json',
				type:'POST',
				data:{'keyword':$(this).val()},
				success:function(result){
					if(result.success){
						var html = '';
						$.each(result.success,function(key,value){
							html+="<li>";
								html+="<a href=' "+value['page']+"/"+value['SEO']+" '> ";
									html+="<img src = 'public/img/"+value['avatar']+"'>";
									html+="<h6 class = 'product-name-sub'>"+value['name']+"</h6>";
									html+="<h6 class = 'product-sub-price'>"+formatNumber(value['price'],'.',',')+" &nbsp đ</h6>";
								html+="</a>";
							html+="</li>";
						});
						$(".search").html(html);
						$(".div-search").show();
					}
				}
			})
		}else{

			$(".div-search").hide();
		}
		
	});

	$(document).on("click",".delete-btn", function(){

		var productID = $(this).attr('delete-rel-p');
		$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
		$.ajax({
			url:'cart/delete',
			data:{'id':productID},
			type:'POST',
			dataType:'json',
			success:function(result){
				if(result ==1){
					location.reload();
				}
				if(result.errors){
					setTimeout(function(){
						$('.content-messages').text(result.errors);
						$('.messages').show();
							},200);
						setTimeout(function(){
							$('.content-messages').text('');
								$('.messages').hide();
						},4000);
				}
			}
		});
	});

	$(document).on("click",".refresh-btn",function(){
		var productID = $(this).attr('rel-p');
		var quantity = $(this).parents('td').find('input').val();
		//if(quantity > 0 && quantity <=30 && quantity !='' && isNaN(quantity)== false && isNaN(productID)==false){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});

			$.ajax({
				url:"cart/update",
				data:{'productID':productID,'quantity':quantity},
				type:"POST",
				dataType:"json",
				success:function(result){
					if(result.success && result.totalAll){
						var html = '';
						$.each(result.success,function(key,value){
							html+="<tr>";
								html+="<td>";
									html+="<img style='width: 80%;height:130px;margin: 10px' src='public/img/"+value['attributes']['avatar']+"'>"
								html+="</td>";
								html+="<td>";
									html+= value['name'];
								html+="</td>";
								html+="<td>";
									html+="<input class='quanty' type='number' value= '"+value['quantity']+"' name='amount' max = '30' min='1'>";
									html+="<button   class='refresh-btn' rel-p = '"+value['id']+"'>";
											html+="<i class='fa fa-refresh' aria-hidden='true'></i>";
									html+="</button>";
								html+="</td>";
									html+="<td>";
										html+= formatNumber(value['price'],'.',',');
									html+="(đ)</td>";
									html+="<td>"+formatNumber(value['total'],'.',',')+"(đ)</td>";
									html+="<td><button delete- class='delete-btn delete-btn' title='Xóa'>Xóa</button></td>";
							html+="</tr>";
						});
						$('.product-cart').html(html);
						$('.totalAll').text(formatNumber(result.totalAll,'.',','));
					}
					if(result.errors){
						if(result.errors.quantity){
							setTimeout(function(){
								$('.content-messages').text(result.errors.quantity);
								$('.messages').show();
							},200);
							setTimeout(function(){
								$('.content-messages').text('');
								$('.messages').hide();
							},4000);
						}
					}
				}
			})
		//}
		
	

	});
	$(document).on("change",".province",function(){
		var province = $(this).val();
		if(province !='' && isNaN(province)==false){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
			$.ajax({
				url:'district/change',
				data:{'id':province},
				dataType:'json',
				type:'POST',
				success:function(result){
					if(result.success){
						var html = '';
						$.each(result.success,function(key,value){
							html+="<option value = '"+value['ID']+"'>"+value['name']+"</option>";
						});
						$('.district-list').html(html);
					}
				}
			})
		}
	});
	$(document).on("change",".district-list",function(){
		var district = $(this).val();
		if(district !='' && isNaN(district)==false){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
			$.ajax({
				url:"town/change",
				type:"POST",
				dataType:"json",
				data:{'id': district},
				success:function(result){
					if(result.success){
						var html = '';
						$.each(result.success,function(key,value){
							html+="<option value='"+value['ID']+"'>"+value["name"]+"</option>";
						});
						$(".town-list").html(html);
					}
				}
			});
		}
	});
	$(document).on("keyup","input[name = 'user']",function(){
		var txt = $(this).val();
		var error = '';
		
		if(txt.length > 45 || txt.length < 10 ){
			error = "<small>Tên đăng nhập từ 10-45 ký tự ! </smaill>";
		}
		
		$(".error-account").html(error);

	});
	$(document).on("keyup","input[name = 'password']",function(){
		var txt = $(this).val();
		var error = '';
		
		if(txt.length <1 ){
			error = "<small>Thông tin bắt buộc !</smaill>";
		}
		
		$(".error-password").html(error);

	});
	
	$(document).on("keyup",".user-email",function(){
		if($(this).val().length ==0){

			$(".user-error").html("<p>Thông tin bắt buộc</p>");

		}else
		{
			$(".user-error").html("");
		}
	});
	$(document).on("keyup","input[name = 'password']",function(){
		if($(this).val().length ==0){

			$(".password-error").html("<p>Thông tin bắt buộc</p>");

		}else
		{
			$(".password-error").html("");
		}
	});
	$(document).on("keyup","input[name = 'checkpass']",function(){
		if($(this).val().length ==0){

			$(".checkpassword-error").html("<p>Thông tin bắt buộc</p>");

		}else
		{
			$(".checkpassword-error").html("");
		}
	});
	$(document).on("keyup","input[name = 'pin']",function(){
		if($(this).val().length ==0 || $(this).val().length > 6){
			$(".pin-error").html("<p>Nhập 6 số</p>");
		}else{
			$(".pin-error").html("");
		}
	})
	$(document).on("click","input[name= 'send-pin']",function(){
			var email = $('.user-email').val();
			if(email!=''){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 	});
				$.ajax({
					url:'register/check',
					type:'POST',
					dataType:'json',
					data:{'email':email},
					success:function(result){
						if(result.error){
							$('.error-success').text(result.error);
							$('.div-error').show();
						}else{
							$('.error-success').text('');
							$('.div-error').hide();
						}

						if(result.success){
							$('.success-content').text(result.success);
							$('.success').show();
						}else{
							$('.success-content').text('');
							$('.success').hide();
						}
					}
				})
			}
		
	});
	// hien thi đơn hàng theo số lượng tại trang order
	$(document).on('change','.next-select-content',function(){
		var limit   = $(this).val();
		if(limit == 5 || limit == 10 || limit=='all'){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
			$.ajax({
				url:'change-order',
				type:'post',
				dataType:'html',
				data:{Limit:limit},
				success:function(result){
					$(".database").html(result);
					//alert(result);

				}
			})
		}
	});
	// gan qty cho trang update-order
	$(document).on('click','.a',function(){
		var index = $(this).attr('rel-p');
		var href=  $(this).attr('href');
		$('.qty input').each(function(key,value){
			 qty = $(this).attr('input-p');
			 if(qty == index){
			 	href+= $(this).val();
			 }
		});
		$(this).attr('href',href);
	});
	/*$("input[name = 'rating'").click(function(){
		var rating  = $(this).val();
		$(".review-form").submit(function(e){
		e.preventDefault();
		var userName  = $("input[name = 'username']").val();
		var email = $("input[name = 'email']").val();
		var content = $(".content").val();
		var ischeck ;
		
		if(userName==''){
			$('.error-name').html("<span>Thông tin bắt buộc(*)</span>");
			ischeck = true;
		}else{
			ischeck = false;
		}
		if(email==''){
			$(".error-email").html("<span>Thông tin bắt buộc(*)</span>");
			ischeck = true;
		}else{
			ischeck = false;
		}
		if(content.length==''){
			$(".error-content").html("<span>Nội dung quá ngắn</span>");
			ischeck = true;
		}else{
			ischeck = false;
		}
		if(ischeck==false){
			alert(rating);
		}
		
	})
	})
	*/
	cmtsend();
	function cmtsend()
	{
		$("input[name = 'username']").keyup(function(){
			if($(this).val().length < 4){
				$('.error-name').html("<span>Tên quá ngắn</span>");
			}else{
			 	$(".error-name").html("");
			}
			if($(this).val()==''){
				$('.error-name').html("<span>Thông tin bắt buộc(*)</span>");
			}
		});
		$("input[name = 'email']").keyup(function(){
			if($(this).val()==""){
				$(".error-email").html("<span>Thông tin bắt buộc(*)</span>");
			}else{
				$(".error-email").html("");
			}
		})
		$(".content").keyup(function(){
			if($(this).val().length<4){
				$(".error-content").html("<span>Nội dung quá ngắn</span>");
			}else{
				$(".error-content").html("");
			}
		})
	}

})
