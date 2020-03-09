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
	productInfo();
	record_product();
	close();
	cancel();
	productSearch();
	ordSearch();
	Delete();
	update();
	pagination();
	insert();
	view();
	print();
	 producer();
	
//	search();
	pending();
	category();
	slider();
	function slider(){
		var id = '';
		var status = 0;
		var slider_images;
		var check  = '';
		$(document).on('click','.edit-slider',function(){
			id = $(this).attr('slider-id');
			$(".slider_images").val("");
			$(".update-slider").show();
		});
		$(document).on('change',"input[name = 'slider-img']",function(){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				slider_images = $(this).prop("files")[0];
				 var formdata = new FormData();
				formdata.append("images",slider_images);

				$.ajax({
					url:'slider/images',
					type:'POST',
					data:formdata,
					contentType:false,
					processData:false,
					dataType:'json',
					success:function(result){
						if(result.errors){
							check = false;
							if(result.errors.images){
								$('.result_avatar').text(result.errors.images);
								$('.result_avatar').show();
							}else{
								$('.result_avatar').hide();
							}
						}
						if(result.success){
							$(".slider_images").attr("src","../public/img/"+result.success);
							slider_images = result.success;
							check = true;
						}
					}
				})
		})
		$(document).on('click','.btn-update-slider',function(){
			if(check ==true && id !='' && slider_images!=''){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
  			   	$.ajax({
  			   		url:'slider/'+id,
  			   		type:'PATCH',
  			   		dataType:'json',
  			   		data:{'slider_images':slider_images},
  			   		success:function(result){
  			   			var html = '';
  			   			var i = 1;
  			   			if(result.success){
  			   				$.each(result.success,function(key,value){
  			   					html+="<tr class = 'product'>";
  			   						html+="<td>"+(i++)+"</td>";
  			   						html+="<td>";
  			   							html+="<img style = 'with:290px;height:100px' src = '../public/img/"+value['img']+"' >";
  			   						html+="</td>";
  			   						html+="<td>";
  			   							html+="<button class = 'btn btn-primary'>Đang hoạt động</button>";
  			   						html+="</td>";
  			   						html+="<td>";
  			   							html+="<button class='btn btn-primary edit-slider' slider-id = '"+value['ID']+"'>";
												html+="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
										html+="</button>";
										html+="<button class='btn btn-danger delete-slider'  slider-id = '"+value['ID']+"'>";
													html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
											html+="</button>";
									html+="</td>";
								html+="</tr>";

  			   				});
  			   				$('.slider-tbody').html(html);
  			   				$(".update-slider").hide();
  			   			}
  			   		}
  			   	})	
			}
		});
		$(document).on('click','.delete-slider',function(){
			var id = $(this).attr('slider-id');
			var choose = confirm("Bạn có muốn xóa slider này ?");
			if(choose==true && id !=''){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				$.ajax({
					url:'slider/'+id,
					dataType:'json',
					type:'DELETE',
					success:function(result){
						if(result.success){
							var html=  '';
							var i =1;
							$.each(result.success,function(key,value){
  			   					html+="<tr class = 'product'>";
  			   						html+="<td>"+(i++)+"</td>";
  			   						html+="<td>";
  			   							html+="<img style = 'with:290px;height:100px' src = '../public/img/"+value['img']+"' >";
  			   						html+="</td>";
  			   						html+="<td>";
  			   							html+="<button class = 'btn btn-primary'>Đang hoạt động</button>";
  			   						html+="</td>";
  			   						html+="<td>";
  			   							html+="<button class='btn btn-primary edit-slider' slider-id = '"+value['ID']+"'>";
												html+="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
										html+="</button>";
										html+="<button class='btn btn-danger delete-slider'  slider-id = '"+value['ID']+"'>";
													html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
											html+="</button>";
									html+="</td>";
								html+="</tr>";

  			   				});
  			   				alert('Xóa thành công');
  			   				$('.slider-tbody').html(html);
						}
						if(result.errors){
							alert(result.erros);
						}
					}
				})
			}
		})

		$(document).on('click','.exit',function(){
			$(".update-slider").hide();
		})
	}

    function category(){
    	var id =''; 
    	var statusID = '';
    	$(document).on('click','.edit-category',function(){	
    		$('.insert-category').addClass('update-category');
  	  		$('.update-category').removeClass('insert-category');
  	  		$('.update-category').text('Cập nhật');
    		id =  $(this).attr('edit-category-id');
    		if(id!=''){
    			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
  			   	$.ajax({
  			   		url:'category/'+id,
  			   		type:'get',
  			   		dataType:'json',
  			   		success:function(result){
  			   			if(result.success){
  			   				$(".categoryName").val(result.success[0]['name']);
  			   				if(result.success[0]['statusID'] == 'active'){
  			   					$('#check-lick').attr('checked','checked');
  			   					statusID = 1;

  			   				}else{

  			   					$('#check-lick').removeAttr('checked');	
  			   					statusID = 0;
  			   				}
  			   				$(".form-category").show();
  			   			}
  			   		}
  			   	});
    		}

    	});
    	$("#check-lick").change(function(){
  	  			if(this.checked == true){
  	  				statusID = 1;
  	  			}else{
  	  				statusID = 0;
  	  			}
  	  		});
  	  		$(document).on('click',".update-category",function(){
  	  			var txt = $('.categoryName').val();
  	  			if(txt != '' && id && statusID != null){
  	  				$.ajaxSetup({
            			headers: {
                			'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            			}
  			   	});
  	  				$.ajax({
  	  					url:'category/'+id,
  	  					type:'PATCH',
  	  					data:{'txt':txt,'statusID':statusID},
  	  					dataType:'json',
  	  					success:function(result){
  	  						if(result.success){
  	  							var html = '';
  	  							var i = 1;
  	  							$.each(result.success,function(key,value){
  	  								html+="<tr>";
			  							html+="<td>"+(i++)+"</td>";
										html+="<td>"+value['name']+"</td>";
										html+="<td>";
										if(value['statusID'] =='active'){
											html+="<button class = 'btn btn-primary'>";
												html+='Đang hoat động';
											html+="</button>";
										}else{
											html+="<button class= 'btn btn-danger'>";
												html+="Ngưng hoạt động";
											html+="</button>";
										}
										html+="</td>";
											html+="<td>";
												html+="<button  class='btn btn-primary edit-category' edit-category-id = '"+value['ID']+"'>";
													html+="<i class='fa fa-pencil-square-o ' aria-hidden='true'></i>";
												html+="</button>";
												html+="<button  class='btn btn-danger delete-category' delete-category-id= '"+value['ID']+"'>";
													html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
												html+="</button>";
										html+="</td>";
									html+="</tr>";
  	  						});
  	  							alert('Cập nhật thành công');
  	  							$(".form-category").hide();
  	  							$(".category-tbody").html(html);

  	  						}
  	  					}
  	  				})
  	  			} 
  	  		});
  	  	$(document).on('click','.delete-category',function(){
  	  		var id  = $(this).attr('delete-category-id');
  	  		check = confirm('Bạn có muốn xóa danh mục này?');
  	  		if(id!='' && check == true){
  	  			$.ajaxSetup({
            			headers: {
                			'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            			}
  			   	});
  	  			$.ajax({
  	  				url:'category/'+id,
  	  				type:'DELETE',
  	  				dataType:'json',
  	  				success:function(result){
  	  						if(result.success){
  	  							var html = '';
  	  							var i = 1;
  	  							$.each(result.success,function(key,value){
  	  								html+="<tr>";
			  							html+="<td>"+(i++)+"</td>";
										html+="<td>"+value['name']+"</td>";
										html+="<td>";
										if(value['statusID'] =='active'){
											html+="<button class = 'btn btn-primary'>";
												html+='Đang hoat động';
											html+="</button>";
										}else{
											html+="<button class= 'btn btn-danger'>";
												html+="Ngưng hoạt động";
											html+="</button>";
										}
										html+="</td>";
											html+="<td>";
												html+="<button  class='btn btn-primary edit-category' edit-category-id = '"+value['ID']+"'>";
													html+="<i class='fa fa-pencil-square-o ' aria-hidden='true'></i>";
												html+="</button>";
												html+="<button  class='btn btn-danger delete-category' delete-category-id= '"+value['ID']+"'>";
													html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
												html+="</button>";
										html+="</td>";
									html+="</tr>";
  	  						});
  	  							alert('Xóa danh mục thành công');
  	  							$(".category-tbody").html(html);

  	  					}
  	  					if(result.errors){
  	  						alert(result.errors);
  	  					}
  	  				}
  	  			})
  	  		}
  	  	});
  	  	$(document).on('click','.add-new-category',function(){
  	  		$('.update-category').addClass('insert-category');
  	  		$('.insert-category').removeClass('update-category');
  	  		$('.insert-category').text('Thêm');
  	  		$('.form-category').show();
  	  		$('.categoryName').val('');
  	  		$(document).on('click','.insert-category',function(){
  	  			var txt = $('.categoryName').val();
  	  			if(txt != ''){
  	  			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
  	  				$.ajax({
  	  					url:'category',
  	  					type:'POST',
  	  					dataType:'json',
  	  					data:{'txt':txt,'statusID':statusID},
  	  					success:function(result){
  	  						if(result.success){
  	  							var html = '';
  	  							var i = 1;
  	  							$.each(result.success,function(key,value){
  	  								html+="<tr>";
			  							html+="<td>"+(i++)+"</td>";
										html+="<td>"+value['name']+"</td>";
										html+="<td>";
										if(value['statusID'] =='active'){
											html+="<button class = 'btn btn-primary'>";
												html+='Đang hoat động';
											html+="</button>";
										}else{
											html+="<button class= 'btn btn-danger'>";
												html+="Ngưng hoạt động";
											html+="</button>";
										}
										html+="</td>";
											html+="<td>";
												html+="<button  class='btn btn-primary edit-category' edit-category-id = '"+value['ID']+"'>";
													html+="<i class='fa fa-pencil-square-o ' aria-hidden='true'></i>";
												html+="</button>";
												html+="<button  class='btn btn-danger delete-category' delete-category-id= '"+value['ID']+"'>";
													html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
												html+="</button>";
										html+="</td>";
									html+="</tr>";
  	  							});
  	  								alert('Thêm mới thành công');
  	  									$(".form-category").hide();
  	  								$(".category-tbody").html(html);

  	  						}
  	  					}
  	  				})
  	  			}
  	  		});

  	  		
  	  	})
    }
    function producer(){
    	var id ;
    	var statusID ;
    	$(document).on('click','.edit-producer',function(){
    		$('.insertProducer').addClass('update_producer');
  	  		$('.update_producer').removeClass('insertProducer');
  	  		$('.update_producer').val('Cập nhật');

    		 id = $(this).attr('edit-producer-id');
    		 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
    		if(id!=''){
    			$.ajax({
    			url:'producer/'+id,
    			type:'get',
    			dataType:'json',
    			success:function(result){
    				if(result.success){
    					$(".producerName").val(result.success[0]['name']);
    					if(result.success[0]['statusID'] =='active'){
    						$('#check-lick').attr('checked','checked');
    							statusID = 1;
    						}else{
    							$('#check-lick').removeAttr('checked');	
    							statusID = 0;
    						}
    						$(".form-producer").show();
    					
    					}
    				}
    			})
    		}
    		$("#check-lick").change(function(){
  	  			if(this.checked == true){
  	  				statusID = 1;
  	  			}else{
  	  				statusID = 0;
  	  			}
  	  		});
  	  	})
  	  	$(document).on('click','.update_producer',function(){
  	  		var txt = 	$(".producerName").val();
  	  		 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
  	  		$.ajax({
  	  			url:'producer/'+id,
  	  			type:'PUT',
  	  			data:{'statusID':statusID,'txt':txt},
  	  			dataType:'text',
  	  			success:function(result){
  	  				if(result ==1){
  	  					alert('Cập nhật thành công');
  	  					location.reload();
  	  				}else{
  	  					alert('Cập nhật có lỗi vui lòng thử lại!');
  	  				}
  	  			}
  	  		})

  	  	})
  	  	$(document).on('click','.add-new-producer',function(){
  	  		$('.update_producer').addClass('insertProducer');
  	  		$('.insertProducer').removeClass('update_producer');
  	  		$('.insertProducer').text('Thêm');
  	  		$(".producerName").val('');
  	  		$('.form-producer').show();

  	  		$(document).on('click','.insertProducer',function(){
  	  			var txt = $(".producerName").val();
  	  			if(txt.length  > 1){
  	  				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
  	  				$.ajax({
  	  					url:'producer',
  	  					type:'POST',
  	  					dataType:'json',
  	  					data:{'name':txt},
  	  					success:function(result){
  	  						if(result.success){
  	  							alert(result.success);
  	  							$('.form-producer').hide();
  	  							location.reload();
  	  						}
  	  						if(result.errors){
  	  							alert(result.errors);
  	  						}
  	  						if(result.giong){
  	  							$(".error-name").text(result.giong);
  	  						}
  	  					}
  	  				});
  	  			}
  	  		});
  	  	});
    } 
	function formatCurrency(number){
   		 var n = number.split('').reverse().join("");
   	 	var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
    	return  n2.split('').reverse().join('') + 'đ';
    }
	function print(){
		$(document).on('click','.print',function(){
			id = $(this).attr("print-id");
			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
			if(id!=''){
				$.ajax({
					url:'don-hang/xuathoadon/'+id,
					type:'GET',
					success:function(result){
						window.location.href = "don-hang/xuathoadon/"+id;
					
					}
				});
				
			}
		})
	}
	function productInfo(){
		$(document).on("click",".edit",function(){
			$(".form-update").show();
			$(".add").addClass("btn-update");
			$(".add").removeClass("btn-new-product");
			$(".add").text("Cập nhật");
			var ID = $(this).attr('rol-e');
			var producerID = "";
			var cetegoryID  = "";
			var avatar= "";
			var temp = '';
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"san-pham-kinh-doanh/"+ID,
				dataType:"json",
				type:"get",
				data:{id:$(this).attr('rol-e'),_token:_token},
				success:function(result){
					$.each(result,function(key,value){
						$(".avatar").attr("src",'../public/img/'+value['avatar']);
						$(".category option").each(function(){
							if($(this).text() == value['category']){
								categoryID = $(this).val();
								$(this).attr("selected","");
							}
						});
						$(".producer option").each(function(){
							if($(this).text() == value['producer']){
								producerID = $(this).val();
								$(this).attr("selected","");
							}
						});
						$(document).on("change",".category",function(){
							categoryID = $(this).val();
						})
						$(document).on("change",".producer",function(){
							producerID = $(this).val();
						})

						$("input[name='productName']").val(value['name']);
						$("input[name='productPrice']").val(value['price']);
						$("input[name='productQty']").val(value['amount']);
						$("input[name='productColor']").val(value['color']);
						$("input[name='productsize']").val(value['size']);
						CKEDITOR.instances['productTitle'].setData(value['title']);
						CKEDITOR.instances['details'].setData(value['description']);
						CKEDITOR.instances['guide'].setData(value['guide']);
					}) 

				}
			});

			$(document).on("change","#file-img",function(){
				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				avatar = $(this).prop("files")[0];
				 var formdata = new FormData();
				formdata.append("avatar",avatar);
				$.ajax({
					url:"san-pham-kinh-doanh/id/avatar",
					data:formdata,
					contentType:false,
					processData:false,
					type:"POST",
					dataType:"json",
					success:function(result){
						
						
						if(result.errors){
							if(result.errors.avatar){
								$('.result_avatar').text(result.errors.avatar);
							}
						}
						if(result.success){
							$(".avatar").attr("src","../public/img/"+result.success);
							temp = result.success;
						}
						
					}
				}) 

			});
			$(document).on("click",".btn-update",function(){
				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				var  name = $("input[name='productName']").val();
				var price = $("input[name='productPrice']").val();
				var amount = $("input[name='productQty']").val();
				var color = $("input[name='productColor']").val();
				var size =  $("input[name='productsize']").val();
				var title =	CKEDITOR.instances['productTitle'].getData();
				var description = CKEDITOR.instances['details'].getData();
				var guide = CKEDITOR.instances['guide'].getData();
				//var _token = $('input[name="_token"]').val();
				var formdata = new FormData();
				formdata.set("productID",ID);
				formdata.set("producerID", producerID);
				formdata.set("categoryID",categoryID);
				formdata.append("avatar",avatar);
				formdata.set("name",name);
				formdata.set("price",price);
				formdata.set("amount",amount);
				formdata.set("color",color);
				formdata.set("size",size);
				formdata.set("title",title);
				formdata.set("description",description);
				formdata.set("guide",guide);
				$.ajax({
					url:"san-pham-kinh-doanh"+"/"+ID,
					data:{
						'ID':ID,
						'categoryID':categoryID,
						'producerID':producerID,
						'amount':amount,
						'name':name,
						'price':price,
						'avatar':temp,
						'color':color,
						'size':size,
						'title':title,
						'description':description,
						'guide':guide,
						
						
					},
					type:"PATCH",
					cache:false,
					dataType:"json",
					success:function(result){
						if(result.errors){
							$('.success-update').hide();
								if(result.errors.categoryID){
									$('.category').text(result.errors.categoryID);
							}else{

								$('.category').text('');	
							}
							if(result.errors.producerID){
								$('.producer').text(result.errors.producerID);
							}else{
								$('.producer').text('');
							}
							if(result.errors.avatar){
								$('.result_avatar').text(result.errors.avatar);
							}else{
								$('.result_avatar').text('');
							}
							if(result.errors.name){
								
								$('.name').text(result.errors.name);

							}else{

								$('.name').text('');
							}
							if(result.errors.price){
					
								$('.price').text(result.errors.price);

							}else{

								$('.price').text('');
							}
							if(result.errors.amount){
						
								$('.amount').text(result.errors.amount);

							}else{

								$('.amount').text('');
							}
							if(result.errors.color){
								
								$('.color').text(result.errors.color);

							}else{

								$('.color').text('');
							}
							if(result.errors.size){
								
								$('.size').text(result.errors.size);

							}else{

								$('.size').text('');
							}
							$('.form-update').animate({scrollTop:0},400);
						}else{

							if(result.success){
								var html = '';
								var pagination  = '';
								var i = 1;
								 $.each(result.productLists.data,function(key,value){
								 	html+= "<tr class = 'product'>";
								 		html+="<td>"+(i++)+"</td>";
								 		html+="<td><img  style='width: 100px;height: 100px' src ='../public/img/"+value['avatar']+"'></td>";
								 		html+="<td>"+value['name']+"</td>";
								 		html+="<td>"+formatNumber(value['price'],'.',',')+"(đ)</td>";
								 		html+="<td><button class = 'btn btn-primary'>"+value['StatusID']+"</button></td>";
								 		html+="<td>" ;
								 			html+="<button rol-e='"+value['ID']+"' class = ' btn btn-primary edit'>"
								 				html+="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
								 			html+="</button>";
								 			html+="<button rol-d='"+value['ID']+"' class = ' btn btn-danger delete'>"
								 				html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
								 			html+="</button>";
								 		html+="</td>";
								 		html+="</tr>";
								 });
								 	$(".product-tbody").html(html);		
									$('.success-update').text(result.success);
									$('.success-update').show();
									$('.form-update').animate({scrollTop:0},400);

							}
						}
					}
				}) 

				
			})
		})
	}
	function close(){
		$(document).on("click",".close",function(){
		 	$(".form-update").hide();
		 	$('.form-ordDetails').hide();
		})
		$(document).on("click",".exit",function(){
			$(".update-producttype").hide();
			$(".insert-product-type").addClass("edit-product-type ");
		})
	}
	function cancel(){
		$(document).on("click",".cancel",function(){
			$(".form-update").hide();

		})
	}
	function record_product(){
		$(document).on("change",".record-product",function(){
			var limit = $(this).val();
			if(limit!=''){
				$.ajax({
					url:"ajax/record_product.php",
					type:"POST",
					dataType:"json",
					data: {limit :$(this).val()},
					success:function(result){
						var html = '';
						var i=1;
						$.each(result,function(key ,value){
							html+="<tr class='product'>";
								html+="<td>"+(i++)+"</td>";
								html+="<td>";
									html+="<img style='width:100px;height:100px' src='public/img/"+value['avatar']+"'>";
								html+="</td>";
								html+="<td>"+value['name']+"</td>";
								html+="<td>"+value['price']+"</td>";
								html+="<td><button class='btn btn-primary'>"+value['StatusID']+"</button></td>";
								html+="<td>";
									html+="<button class= 'btn btn-primary edit' rol-e='"+value['ID']+"'>";
										html+="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
									html+="</button>";
									html+="<button class= 'btn btn-danger delete' rol-d='"+value['ID']+"'>";
										html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
									html+="</button>";
								html+="</td>";
							html+="</tr>";
						});
						$(".product-tbody").html(html);
					}
				})
			}
		})
	}
	function productSearch(){
		$(document).on("keyup","input[name = 'search-product']",function(){
			var txt = $(this).val();
			var _token = $('input[name="_token"]').val();
			$('.pagination').hide();
				$.ajax({
					url:"searchProduct",
					type:"post",
					data:{keyword:txt,_token:_token},
					dataType:"json",
					success:function(result){
						var html="";
						var i =1;
						if(result.length >=2){
							$.each(result,function(key ,value){
								html+="<tr class='product'>";
									html+="<td>"+(i++)+"</td>";
									html+="<td>";
										html+="<img style='width:100px;height:100px' src='../public/img/"+value['avatar']+"'>";
									html+="</td>";
									html+="<td>"+value['name']+"</td>";
									html+="<td>"+value['price']+"</td>";
									html+="<td><button class='btn btn-primary'>"+value['StatusID']+"</button></td>";
									html+="<td>";
										html+="<button class= 'btn btn-primary edit' rol-e='"+value['ID']+"'>";
											html+="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
										html+="</button>";
										html+="<button class= 'btn btn-danger delete' rol-d='"+value['ID']+"'>";
											html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
										html+="</button>";
									html+="</td>";
								html+="</tr>";
							});
							$(".product-tbody").html(html);
							$('.pagination').hide();
						}else{
								html +="<h6>Không có sản phẩm cần tìm !</h6>";
								$(".product-tbody").html(html);
						}
						
					}
				})
			
		})
	}
	function ordSearch(){
		$(document).on("keyup","input[name = 'search-ord']",function(){
			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
			var txt = $(this).val();
			//if(txt.length > 0){
				$.ajax({
					url:"don-hang/search",
					type:'post',
					dataType:'json',
					data:{"keyword":txt},
					success:function(result){
						if(result.success){
							var html = '';
							var i =1;
							$.each(result.success,function(key,value){
								html+="<tr>";
									html+="<td>"+(i++)+"</td>";
									html+="<td>"+value['ID']+"</td>";
									html+="<td>"+value['total']+"</td>";
									html+="<td>"+value['ordTime']+"</td>";
									html+="<td>"+value['form']+"</td>";
									html+="<td>"+value['StatusID']+"</td>";
									html+="<td>"+value['name']+"</td>";
									html+="<td>"+value['numberphone']+"</td>";
									html+="<td>";
										html+="<button class='btn btn-primary view-ord' ord = '"+value['ID']+"' title='Xem chi tiết'>";
											html+="<i class='fa fa-eye' aria-hidden='true'></i>";	
										html+="</button>";
										html+="<button class='btn btn-primary pending-stt' pending-stt = '"+value['ID']+"';  title='Duyệt'>";
											html+="<i class='fa fa-check' aria-hidden='true'></i>";
										html+="</button>";
										
										html+="<button class='btn btn-success print '' print-id ='"+value['ID']+"' title='In hóa đơn'>";
												html+="<i class='fa fa-print '' aria-hidden='true'></i>";
										html+="</button>";
										html+="<button class='btn btn-danger delete-ord'  delete-id= '"+value['ID']+"' title='Xóa'>";
											html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
										html+="</button>";
									html+="</td>";
								html=="</tr>";
							});
							$(".product-ord").html(html);
						}
						if(result.errors){
							$('.product-ord').text(result.errors);
						
						}
					}
				});
			});
		
			
	
	}
	function insert(){
		var typeID = '';
		var productID ='';
		var categoryID;
		var producerID;
		var avatar= '';
		$(document).on("click",".edit-product-type",function(){
			typeID = $(this).val();
			$(".update-producttype").show();
			$(document).on("click",".pr_new_update",function(){
				productID = $(this).attr("pr_new_up");
			});
			

		})
		$(document).on("change",".category",function(){
			categoryID = $(this).val();
		})
		$(document).on("change",".producer",function(){
			producerID = $(this).val();

		})
		$(document).on("change","#file-img",function(){
			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
				avatar = $(this).prop("files")[0];
				var formdata = new FormData();
				formdata.append("avatar",avatar);
				$.ajax({
					url:"san-pham-kinh-doanh/id/avatar",
					data:formdata,
					contentType:false,
					processData:false,
					type:"POST",
					dataType:"json",
					success:function(result){
						if(result.errors){
							if(result.errors.avatar){
								$('.result_avatar').text(result.errors.avatar);
							}
						}
						if(result.success){
							$(".avatar").attr("src","../public/img/"+result.success);
							
						}
						
					}
				})

		}); 
		$(document).on('click','.add-new-product',function(){
			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
  			 	$('.success-add').hide();
			$(".avatar").attr("src",'');
			$(".form-add").show();
			$('.add').text('Thêm');
			$(".add").removeClass("btn-update");
			$(".add").addClass("btn-new-product");
			$("input[name='productName']").val("");
			$("input[name='productPrice']").val("");
			$("input[name='productQty']").val("");
			$("input[name='productColor']").val("");
			$("input[name='productsize']").val("");
			CKEDITOR.instances['productTitle'].setData("");
			CKEDITOR.instances['details'].setData("");
			CKEDITOR.instances['guide'].setData("");
		});
		$(document).on("click",".btn-new-product",function(){
			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
			var  name = $("input[name='productName']").val();
			var price = $("input[name='productPrice']").val();
			var amount = $("input[name='productQty']").val();
			var color = $("input[name='productColor']").val();
			var size =  $("input[name='productsize']").val();
			var title =	CKEDITOR.instances['productTitle'].getData();
			var description = CKEDITOR.instances['details'].getData();
			var guide = CKEDITOR.instances['guide'].getData();
			var formdata = new FormData();
			formdata.append("avatar",avatar);
			formdata.set('ID',productID);
			formdata.set("producerID",producerID);
			formdata.set("categoryID",categoryID);
			formdata.set("name",name);
			formdata.set("price",price);
			formdata.set("amount",amount);
			formdata.set("color",color);
			formdata.set("size",size);
			formdata.set("title",title);
			formdata.set("description",description);
			formdata.set("guide",guide);
			$.ajax({
				url:"san-pham-kinh-doanh",
				data:formdata,
				//dataType:"json",
				type:"POST",
				contentType:false,
				processData:false,
				success:function(result){
					if(result.errors){
						$('.success-update').hide();
								if(result.errors.avatar){
									$(".result_avatar").text(result.errors.avatar);
								}else{
										$(".result_avatar").text(' ');
								}
								if(result.errors.categoryID){
									$('._category').text(result.errors.categoryID);
							}else{

								$('._category').text('');	
							}
							if(result.errors.producerID){
								$('._producer').text(result.errors.producerID);
							}else{
								$('._producer').text('');
							}
							if(result.errors.avatar){
								$('.result_avatar').text(result.errors.avatar);
							}else{
								$('.result_avatar').text('');
							}
							if(result.errors.name){
								
								$('.name').text(result.errors.name);

							}else{

								$('.name').text('');
							}
							if(result.errors.price){
					
								$('.price').text(result.errors.price);

							}else{

								$('.price').text('');
							}
							if(result.errors.amount){
						
								$('.amount').text(result.errors.amount);

							}else{

								$('.amount').text('');
							}
							if(result.errors.color){
								
								$('.color').text(result.errors.color);

							}else{

								$('.color').text('');
							}
							if(result.errors.size){
								
								$('.size').text(result.errors.size);

							}else{

								$('.size').text('');
							}
							
							$('.form-update').animate({scrollTop:0},400);
					}
					if(result.success){
						$('.success-add').text(result.success);
						$('.success-add').show();
						$('.form-update').animate({scrollTop:0},400);
					}
				}

			})
		})
		var levelsID  = '';
		var avatarAdmin= '';
		$(document).on("change","input[name = 'avatar']",function(){
			avatarAdmin = $(this).prop("files")[0];
		})
		$(document).on("change","select[name = 'levelsID']",function(){
			levelsID = $(this).val();
		})
		$(document).on('click','.registration-admin',function(){
			var userName = $("input[name = 'userName']").val();
			var password = $("input[name = 'password']").val();
			var name = $("input[name = 'name']").val();
			var age = $("input [name = 'age']").val();
			var address  = $("input [name  = 'address']").val();
			var numberPhone = $("input[name = 'numberPhone']").val();
			if(userName.length < 4){
				$(".error-user").html("Tài khoản quá ngắn");
			}else{
				$(".error-user").html('');
			}
			if(password.length==0){
				$(".error-pass").html("Thông tin bắt buộc");
			}else{
				$(".error-pass").html("");
			}
			if(password.length < 5){
				$(".error-pass").html("Mật khẩu quá ngắn");
			}else{
				$(".error-pass").html("");
			}
			if(levelsID.length==''){
				$(".erorr-levels").html("Chưa chọn quyền quản trị");
			}else{
				$(".erorr-levels").html("");
			}
			if(userName.length > 4 && password.length > 5 && levelsID!=''){
				var  formdata = new FormData();
				formdata.append("avatar",avatarAdmin);
				formdata.set("userName",userName);
				formdata.set("password",password);
				formdata.set("name",name);
				formdata.set("age",age);
				formdata.set("address",address);
				formdata.set("numberphone",numberPhone);
				formdata.set("levelsID",levelsID);
				$.ajax({
					url:"ajax/insertAdmin.php",
					data:formdata,
					type:"POST",
					dataType:"text",
					contentType:false,
					processData:false,
					success:function(result){
						if(result==1){
							$(".alert-success").show();
							$(".alert-success").html("Đăng ký tài khoản thành công");
							 $("input[name = 'userName']").text("");
							 $("input[name = 'password']").text("");
							 $("input[name = 'name']").text("")
							$("input [name = 'age']").text("")
							$("input [name  = 'address']").text("");
							 $("input[name = 'numberPhone']").text("");	
						}else{
							$(".alert-success").show();
							$(".alert-success").html("Đăng ký thất bại");
						}
					}
				})
			}
		})

	}
	function Delete(){
		$(document).on("click",".delete",function(){
			var alert = confirm("Bạn có chắc muốn xóa sản phẩm này");
			var id = $(this).attr('rol-d');
			if(alert==true){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				$.ajax({
					url:"san-pham-kinh-doanh/"+id,
					dataType:"json",
			 		type:"DELETE",
			 		success:function(result){
			 			if(result.success){
			 				$('.product-tbody').html(result.success);
			 			}
			 			if(result.error){
			 				alert(result.error);
			 			}
			 		}
				})
			}
		});
		$(document).on("click",".delete-product-type",function(){
			product_id = $(this).attr("rol-id");
			type_id = $(this).attr("rol-type");
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
			var choose = confirm("Có muốn xóa sản phẩm này?");
			if(product_id && type_id!="" && choose){
				$.ajax({
					url:"san-pham-goi-y/"+product_id,
					type:"DELETE",
					dataType:"json",
					data:{'type_id':type_id},
					success:function(result){
						if(result.success){
							$(".product-tbody-"+type_id).html(result.success);
								alert('Cập thành công');
							
						}
						if(result.nullProduct){
							$(".product-tbody-"+type_id).text(result.nullProduct);
						}
					}
				})
			}
		});
		$(document).on('click','.delete-admin',function(){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
			var ID = $(this).attr('admin-id');
			var check  = confirm('Bạn có chắc chăn muốn xóa quản trị này');
			if(ID !='' && check== true){
				$.ajax({
					url:'dsAdmin/'+ID,
					type:'DELETE',
					dataType:'json',
					success:function(result){
						if(result.success){
							alert(result.success);
							location.reload();
						}
					}
				})
			}
		});
		
	}
	function update(){
		var typeID= '';
		var base ='';
		var ID = '';
		var list_check ='';
		$(document).on("click",".edit-product-type",function(){
			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
			typeID = $(this).attr("rol-type");
			base = $(this).attr("rol-id");
			$(".update-producttype").show();
			$.ajax({
				url:"san-pham-goi-y/status",
				data:{check:"open"},
				type:"POST",
				dataType:"json",
				success:function(result){
					var html = "";
					for (var i = 1; i <= result.paginate.last_page; i++) {
						html+="<li class='page-item'><a class='page-link click-pagination' rol = '"+i+"' >"+(i)+"</a></li>";
					}
					$(".product-list").html(result.success);
					$('.pagination').html(html);
				}

			})
		});
		$(document).on('click',' .update-baogia',function(){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
			$.ajax({
				url:'baogia',
				type:'post',
				dataType:'json',
				data:{'content':CKEDITOR.instances['baogia'].getData()},
				success:function(result){
					if(result.success){
						alert(result.success);
					}
					if(result.errors){
						alert(result.errors);
					}
				}
			})
		});
		$(document).on('click',' .click-pagination',function(){
				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
				 $(this).addClass('backgroud-paginate');
				 $.ajax({
				 	url:"san-pham-goi-y/show_form",
				 	type:'POST',
				 	dataType:"json",
				 	data:{ID:$(this).attr('rol')},
				 	success:function(result){
				 		$(".product-list").html(result.success);
				 	}
				 })
		});
		$(document).on('click','.checked-type',function(){
			$(this).removeClass('add-type-product');
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
			var product_a  = [''];
			$(".check-id-product").each(function(){
				if($(this).is(":checked")){
					 product_a.push($(this).val());
				}
			});
			$.ajax({
				url:"san-pham-goi-y/"+base,
				type:'PATCH',
				dataType:'json',
				data:{'listID':product_a, 'typeProduct':typeID,'baseID':base},
				success:function(result){
					if(result.success){
						$(".product-tbody-"+typeID).html(result.success);
						alert('Cập thành công');
						$(".update-producttype").hide();
					}
				}
			})
			
		});

		$(document).on("click",".lockweb",function(){
			$.ajax({
				url:"ajax/lockwebsite.php",
				data:{StatusID:'0'},
				type:"POST",
				dataType:"text",
				success:function(result){
					if(result==1){
						var html ='';
						html+="<td>Khóa trang người dùng</td>";
						html+="<td><button class='btn btn-primary activeweb' title='Mở khóa web'><i class='fa fa-lock' aria-hidden='true'></i></button></td>";
						$('.form').html(html);
						alert('Khóa thành công');
					}else{
						alert('Cập nhật thất bại');
					}
				}

			})
		})
		$(document).on("click",".activeweb",function(){
			$.ajax({
				url:"ajax/lockwebsite.php",
				data:{StatusID:'1'},
				type:"POST",
				dataType:"text",
				success:function(result){
					if(result==1){
						var html ='';
						html+="<td>Khóa trang người dùng</td>";
						html+="<td><button class='btn btn-primary lockweb' title='khóa web'><i class='fa fa-unlock' aria-hidden='true'></button></td>";
						$('.form').html(html);
						alert('Mở khóa thành công');

					}else{
						alert('Cập nhật thất bại');
					}
				}

			})
		})
		$(document).on("click",".pr-new-update",function(){
			 ID	= $(this).attr("pr_new_up");
			 	$.ajax({
			 		url:"ajax/prductType.php",
			 		data:{productID:ID,type:typeID,baseProduct:base},
			 		dataType:"json",
			 		type:"POST",
			 		success:function(result){
			 			var html='';
			 			var i=0;
			 			var choose = confirm("Thực hiện thay đổi sản phẩm này");
			 			if(result!= false && choose ==true){
			 				$.each(result,function(key,value){
			 					i++;
			 					html+="<tr class= 'product'>";
			 						html+="<td>"+i+"</td>";
			 						html+="<td>"
			 							html+="<img style='width: 100px;height: 100px;' src='public/img/"+value['avatar']+"'>";
			 						html+="</td>";
			 						html+="<td>"+value['name']+"</td>";
			 						html+="<td>"+value['price']+"</td>";
			 						html+="<td><button class='btn btn-primary'>Đang chọn</button></td>";
			 						html+="<td>";
			 							html+="<button rol-type ='"+value['producttype']+"' rol-id = '"+value['ID']+"' class='btn btn-primary edit-product-type'>";
											html+="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
										html+="</button >";
										html+="<button rol-id='"+value['ID']+"' rol-type= '"+value['producttype']+"' class='btn btn-danger delete-product-type'>";
													html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
										html+=	"</button>";
									html+="</td>";
								html+="</tr>";
			 				})
			 				switch (typeID) {
			 					case '1':
			 						$(".product-tbody-1").html(html);
			 						break;
			 					case '2':
			 						$(".product-tbody-2").html(html);
			 						break;
			 					case '3':
			 					$(".product-tbody-3").html(html);
			 					break;
			 				}
			 				$(".update-producttype").hide();
			 				alert("Cập nhật thành công");
			 			}else{
			 				alert("Cập nhật thất bại");
			 			}
			 		}
			 	})	
		});
		$(document).on('click','.insert-product-type',function(){
			$('.checked-type').addClass('add-type-product');
			$('.add-type-product').removeClass('.checked-type');
		//	$(this).removeClass('insert-product-type');
			var typeID = $(this).val();
			var product_id  = [''];
			$(document).on('click','.checked-type',function(){
				$(".check-id-product").each(function(){
					if($(this).is(":checked")){
						 product_id.push($(this).val());
					}
				});
			});
			$(document).on('click','.add-type-product',function(){
				$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  				 });
  				 $.ajax({
  				 	url:'san-pham-goi-y',
  				 	type:'post',
  				 	data:{'type_id':typeID,'product_id':product_id},
  				 	dataType:'json',
  				 	success:function(result){
  				 		if(result.success){
							$(".product-tbody-"+typeID).html(result.success);
								alert('Thêm thành  công');
							$(".update-producttype").hide();
							return ;
						}
  				 	}
  				 })
			});

		});
		$(document).on("click",".lock-user",function(){
			var customerID = $(this).attr("rol-d");
			var stringIf = 'lock';
			if(customerID!=''){
				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
				$.ajax({
					url:"dskhachhang",
					dataType:"json",
					type:"POST",
					data:{customerID:customerID,stringIf:stringIf},
					success:function(result){
						if(result.success){
							var html = '';
							var i = 1;
							$.each(result.success,function(key,value){
								html+="<tr>";
									html+="<td>"+(i++)+"</td>";
									html+="<td>"+value['email']+"</td>";
									html+="<td>"+value['numberphone']+"</td>";
									html+="<td>"+value['created_at']+"</td>";
									html+="<td>";
										html+="<button class = 'btn btn-danger'>"+value['StatusID']+"</button>";
									html+="</td>";
									html+="<td>";
										html+="<button class='btn btn-danger open-user' rol-d = '"+value['ID']+"' title='Mở khóa tài khoản'>";
												html+="<i class='fa fa-lock' aria-hidden='true'></i>";
										html+="</button>";
									html+="</td>";
								html+="</tr>";
							});
							alert('Khóa tài khoản thành công');
							$(".list").html(html);
						}
					}
				})
			}
		})
		$(document).on("click",".open-user",function(){
			var customerID = $(this).attr("rol-d");
			var stringIf = 'open';
			if(customerID!=''){
				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			 });
				$.ajax({
					url:"dskhachhang",
					dataType:"json",
					type:"POST",
					data:{customerID:customerID,stringIf:stringIf},
					success:function(result){
						if(result.success){
							var html = '';
							var i = 1;
							$.each(result.success,function(key,value){
								html+="<tr>";
									html+="<td>"+(i++)+"</td>";
									html+="<td>"+value['email']+"</td>";
									html+="<td>"+value['numberphone']+"</td>";
									html+="<td>"+value['created_at']+"</td>";
									html+="<td>";
										html+="<button class = 'btn btn-primary'>"+value['StatusID']+"</button>";
									html+="</td>";
									html+="<td>";
										html+="<button class='btn btn-primary open-user' rol-d = '"+value['ID']+"' title='Mở khóa tài khoản'>";
												html+="<i class='fa fa-unlock' aria-hidden='true'></i>";
										html+="</button>";
									html+="</td>";
								html+="</tr>";
							});
							alert('Mở khóa tài khoản thành công');
							$(".list").html(html);
						}
					}
				})
			}
		})
		$(document).on("click",".edit-slider",function(){
		 	var sliderID = $(this).attr("rol-id");
		 	var img = '';
		 	$(document).on("change",".slider-img",function(){
		 		img  = $(this).prop("files")[0];
		 	});
		 	
		})
		$(document).on('click','.delete-ord',function(){
			var id = $(this).attr('delete-id');
			if(id!=''){
				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				$.ajax({
					url:'don-hang/'+id,
					type:'PATCH',
					dataType:'json',
					success:function(result){
						if(result.success){
							var html = '';
							var i =1;
							$.each(result.success,function(key,value){
								html+="<tr >";
									html+="<td>"+(i++)+"</td>";
									html+="<td>"+value['ID']+"</td>";
									html+="<td>"+value['total']+"</td>";
									html+="<td>"+value['ordTime']+"</td>";
									html+="<td>"+value['form']+"</td>";
									html+="<td>"+value['StatusID']+"</td>";
									html+="<td>"+value['name']+"</td>";
									html+="<td>"+value['numberphone']+"</td>";
									html+="<td>";
										html+="<button class='btn btn-primary view-ord' ord = '"+value['ID']+"' title='Xem chi tiết'>";
											html+="<i class='fa fa-eye' aria-hidden='true'></i>";	
										html+="</button>";
										html+="<button class='btn btn-primary pending-stt' pending-stt = '"+value['ID']+"';  title='Duyệt'>";
											html+="<i class='fa fa-check' aria-hidden='true'></i>";
										html+="</button>";
										
										html+="<button class='btn btn-success print '' print-id ='"+value['ID']+"' title='In hóa đơn'>";
												html+="<i class='fa fa-print '' aria-hidden='true'></i>";
										html+="</button>";
										html+="<button class='btn btn-danger delete-ord'  delete-id= '"+value['ID']+"' title='Xóa'>";
											html+="<i class='fa fa-trash-o' aria-hidden='true'></i>";
										html+="</button>";
									html+="</td>";
								html=="</tr>";
							});
							$(".product-ord").html(html);
						}
						if(result.errors){
							$('.product-ord').text(result.errors);
						
						}
					}
				});
			}
			
		});
		$(document).on('click','.edit-rights-admin',function(){
			var admin_id = $(this).attr('admin-id');
			var avatar =  '';
			var avatar_success = '';
			var levels = '';
			$("input[type = 'radio']").click(function(){
				levels = $(this).val();
			});
			$.ajax({
				url:'dsAdmin/'+admin_id,
				type:'GET',
				dataType:'json',
				success:function(result){
					if(result.success){
						$("input[name = 'admin_name']").val(result.success[0]['name']);
						$("input[name = 'admin_age']").val(result.success[0]['age']);
						$("input[name = 'admin_location']").val(result.success[0]['location']);
						$("input[name = 'admin_account']").val(result.success[0]['accountName']);
						$("input[name = 'admin_phone']").val(result.success[0]['phone']);
						$('.avatar_admin').attr('src','../public/img/'+result.success[0]['avatar']);
						$('.form-admin').show();
					}
				}
			})

			$(document).on('click','#edit_admin_btn',function(){
				 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				$.ajax({
					url:'dsAdmin/'+admin_id,
					type:'PATCH',
					data:{
						 	'name':$("input[name = 'admin_name']").val(),
							'age' :  $("input[name = 'admin_age']").val(),
							'location': $("input[name = 'admin_location']").val(),
							'phone' : $("input[name = 'admin_phone']").val(),
						 	'accountName': $("input[name = 'admin_account']").val(),
						 	'avatar': avatar_success,
						 	'levelsID':levels,
					}, 
					dataType:'json',
					success:function(result){
						if(result.errors){
							if(result.errors.name){
								$('.name_error').text(result.errors.name);
							}else{
								$('.name_error').text('');
							}
							if(result.errors.age){
								$('.age_error').text(result.errors.age);
							}else{
								$('.age_error').text('');
							}
							if(result.errors.location){
								$('.location_error').text(result.errors.location);
							}else{
								$('.location_error').text('');
							}
							if(result.errors.account){
								$('.account_error').text(result.errors.account);
							}else{
								$('.account_error').text('');
							}
							if(result.errors.phone){
								$('.phone_error').text(result.errors.phone);
							}else{
								$('.phone_error').text('');
							}
							if(result.errors.levelsID){
								$('.levels_error').text(result.errors.levelsID);
							}else{
								$('.levels_error').text('');
							}
						}
						if(result.success){
							var html = '';
							$.each(result.success,function(key,value){
								html+="<tr>";
									html+="<td><img  src='../public/img/"+value['avatar']+"'></td>";
									html+="<td>"+value['accountName']+"</td>";
									html+="<td>"+value['name']+"</td>";
									html+="<td>"+value['levelsName']+"</td>";
                  html+="<td>";
                  if(value['StatusID'] == 'active'){
                    html+="<button class = 'btn btn-primary'><i class='fa fa-check' aria-hidden='true'></i></button>";
                  }else{
                      html+="<button class = 'btn btn-success'><i class='fa fa-check' aria-hidden='true'></i></button>";
                  }
                  html+="</td>";
									//html+="<td><button class='btn btn-danger'>{!($lists['StatusID'] == 'active')?'<i class="fa fa-check" aria-hidden="true"></i>':'	<i class="fa fa-window-close" aria-hidden="true"></i>'  !!}</button></td>
								html+="</tr>";
							});
							alert('Cập nhật thành công ');
							$('.form-admin').hide();
							$('.admin-lists').html(html);
						}
					}
				});
			})
			$(document).on('change','#file-img-admin',function(){
			 $.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
				avatar = $(this).prop("files")[0];
				 var formdata = new FormData();
				formdata.append("avatar",avatar);
				$.ajax({
					url:"dsAdmin/update/avatar",
					data:formdata,
					contentType:false,
					processData:false,
					type:"POST",
					dataType:"json",
					success:function(result){
						if(result.errors){
							if(result.errors.avatar){
								$('.result_avatar_change').text(result.errors);
							}
						}
						if(result.success){
							avatar_success = result.success;
							$(".avatar_admin").attr("src","../public/img/"+result.success);
						}
						if(result.errors){
							$('.result_avatar_change').text(result.errors);
							$('.result_avatar_change').show();
						}else{
							$('.result_avatar_change').text('');
							$('.result_avatar_change').hide();
						}
					}
				}) 
		});

	});
		

	}
	function pagination(){
		$(document).on("click",".page-number",function(){
			 var i = $(this).attr("page-btn");
			 $.ajax({
			 	url:"ajax/prductType.php",
				data:{page:i},
				type:"POST",
				dataType:"html",
				success:function(result){
					$(".product-list").html(result);
				}
			 })
		})
	}
	function view(){
		$(document).on("click",".view-ord",function(){
			$('.form-ordDetails').show();
			var ID = $(this).attr("ord");
			if(ID!=""){
				$.ajax({
					url:"don-hang/"+ID,
					dataType:"json",
					type:"GET",
					success:function(result){
						if(result.success){
							var html = '';
							html+="<div class='sub-ordDetails'>";
								html+="<tr>";
										html+="<td colspan='2'>Mã hóa đơn: &nbsp "+result.success[0]['ID']+"</td>";
										html+="<td colspan='2'>Tên khách hàng: &nbsp "+result.success[0]['customerName']+"</td>";
										html+="<td colspan='2'>SĐT:"+result.success[0]['numberphone']+"</td>";
									html+="</tr>";
									html+="<tr>";
										html+="<td colspan='2'>Phí ship:  &nbsp"+formatNumber(result.success[0]['ship'],'.',',')+"</td>";
										html+="<td colspan='3'>Thành tiền: &nbsp "+formatNumber(result.success[0]['total'],'.',',')+"</td>";
									html+="</tr>";
								html+="<tr>";
                  if(result.success[0]['form'] == 'card'){
										html+="<td colspan='2'>Thanh toán:  &nbsp chuyển khoản  </td>";
                  }else{
                    html+="<td colspan='2'>Thanh toán:  &nbsp Thanh toán khi nhận hàng  </td>";
                  }
                  if(result.success[0]['StatusID'] =='pending'){
										html+="<td colspan='2'>Tình trạng đơn hàng: &nbsp Chưa duyệt </td>";
                  }else{
                      html+="<td colspan='2'>Tình trạng đơn hàng: &nbsp Đã duyệt </td>";
                  }
										html+="<td colspan='2'>Ngày mua: &nbsp"+result.success[0]['created_at']+"</td>";
								html+="</tr>";
								html+="<tr>";
									html+="<td colspan='2'>Địa chỉ:"+result.success[0]['address']+"</td>";
									html+="<td colspan='2'>Yêu cầu khác: &nbsp"+result.success[0]['note']+" </td>";
									html+="<td colspan='2'>Email:&nbsp"+result.success[0]['email']+"</td>";
								html+="</tr>";
							html+="</div>";
							html+="<div class= 'product-ord'>";
								html+="<tr>";
									html+="<td colspan='1'>Ảnh</td>";
									html+="<td colspan='1'>Sản phẩm</td>";
									html+="<td>Giá</td>";
									html+="<td colspan='2'>Số lượng</td>";
								html+="</tr>";
							$.each(result.success,function(key,value){
								html+="<tr>";
									html+="<td>";
										html+="<img style='width: 50px;height: 50px' src='../public/img/"+value['avatar']+"'</td>";
									html+="<td>"+value['name']+"</td>";
									html+="<td>"+formatNumber(value['price'],'.',',')+"(đ)</td>";
									html+="<td>"+value['amountProduct']+"</td>";
							html+="</tr>";	
							});
							html+="</div>";
							$(".ordDetails").html(html);
						} 
					}

				})
			}
		})
	}
	/*function search(){
		$(document).on("keyup",".keyword",function(){
			var txt = $(this).val();
			$.ajax({
				url:"ajax/search-ord.php",
				dataType:"html",
				type:"POST",
				data:{keyword:txt},
				success:function(result){
					$(".product-ord").html(result);
				}
			})
		})
	}
	*/
	function pending(){
		$(document).on("click",".pending-stt",function(){
			$.ajaxSetup({
            		headers: {
                		'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            		}
  			   	});
			  	var pendingID =  "Duyệt đơn hàng #"+$(this).attr('pending-stt');
			 	var status = confirm(pendingID);
			 if(status == true){
				 	$.ajax({
				 		url:"don-hang/"+$(this).attr('pending-stt')+"/edit",
				 		dataType:"json",
				 		type:"GET",
				 		success:function(result){
				 			if(result.success){
				 				var html = '';
				 				var i = 1;
				 				$.each(result.success,function(key,lists){
				 					html+="<tr>";
										html+="<td>"+i+++"</td>";
										html+="<td># "+lists['ID']+"</td>";
										html+="<td>"+lists['total']+"(đ)</td>";
										html+= "<td>"+lists['ordTime']+"</td>";
										html+="<td>"+lists['form']+"</td>";
										html+="<td>"+lists['StatusID']+"</td>";
										html+="<td>"+lists['name']+"</td>";
										html+="<td>"+lists['numberphone']+"</td>";
										html+="<td>";
											html+="<button class='btn btn-primary view-ord' ord = '"+lists['ID']+"'title='Xem chi tiết'>";
												html+="<i class= 'fa fa-eye' aria-hidden= 'true'></i>";	
											html+="</button>";
											html+="<button class='btn btn-primary pending-stt'   pending-stt='"+lists['ID']+"'  title= 'Duyệt'>";
												html+="<i class= 'fa fa-check' aria-hidden= 'true'></i>";
											html+="</button>";
											html+="<button class='btn btn-success print ' print-id='"+lists['ID']+"' title='In hóa đơn' >";
												html+="<i class='fa fa-print' aria-hidden='true'></i>";
											html+="</button>";
											html+="<button class='btn btn-danger' title='Xóa'>";
												html+="<i class= 'fa fa-trash-o' aria-hidden='true'></i>";
											html+="</button>";
										html+="</td>";
									html+="</tr>";
				 				});
				 				alert("Duyệt thành công");
				 				$(".product-ord").html(html);

				 			}
				 			if(result.errors){
				 				alert(result.errors);
				 			}
				 				
				 		}

				 	});
				 }
		})
	}
	

})