<?php
Route::get('admin','Auth\LoginController@getLoginAdmin')->name('admin');
Route::get('admin/login',function(){
	return redirect('admin');
});
Route::post('admin','Auth\LoginController@postLoginAdmin')->name('postLogin');

Route::get('login','Auth\LoginController@getLoginUser');
Route::POST('login','Auth\LoginController@postLoginUser')->name('login');
Route::GET('logout',function(){
	if(session()->has('user')){
		session()->forget('user');
		return redirect()->route('login');
	}
})->name('logout');

Route::GET('register','Auth\RegisterController@getRegister')->name('register');
Route::POST('register/check','Auth\RegisterController@setcookie');
Route::POST('register','Auth\RegisterController@create')->name('addUser');

Route::group(['middleware' =>'checklogin'],function(){
	Route::group(['namespace' => 'admin'],function(){
		Route::get('admin/home','homeController@getHome')->name('home');
		Route::resource('admin/san-pham-kinh-doanh','productController');
		Route::post('admin/san-pham-kinh-doanh/id/avatar','productController@change_avatar');
		Route::resource('admin/san-pham-goi-y','productTypeController');
		Route::POST('admin/san-pham-goi-y/status','productTypeController@form_edit');
		Route::POST('admin/san-pham-goi-y/show_form','productTypeController@pagination');
		Route::post('admin/searchProduct','productController@search')->name('searchProduct');
		Route::resource('admin/don-hang','orderController');
		Route::POST("admin/don-hang/search",'orderController@search');
		Route::GET('admin/don-hang/xuathoadon/{id}','orderController@xuathoadon');
		Route::resource('admin/baogia','baogiaController');
		Route::resource('admin/dskhachhang/','customerController');
		Route::resource('admin/dsAdmin','adminController');
		Route::GET('admin/themthanhvien','adminController@themthanhvienIndex')->name('registration');;
		Route::POST('admin/dsAdmin/update/avatar','adminController@change_avatar');
		Route::POST('admin/themthanhvien','adminController@create')->name('create');
		Route::resource('admin/producer','producerController');
		Route::resource('admin/category','categoryController');
		Route::resource('admin/slider','sliderController');
		route::POST('admin/slider/images','sliderController@change_images');
		Route::get('admin/logout',function(){
			if(session()->has('admin')){
				session()->forget('admin');
				return redirect('admin');
			}
		});
	});
});
	
	Route::group(['namespace' =>'user'],function(){
		Route::get('/', 'homeController@index')->name('index');
		Route::get('xi-mang/{id?}','xi_mangController@getProduct')->name('xi-mang');
		Route::get('da-xay-dung/{id?}','daxaydungController@getProduct')->name('da-xay-dung');
		Route::get('cat-xay/{id?}','catxayController@getProduct')->name('cat-xay');
		Route::get('gach-men/{id?}','gachmenController@getProduct')->name('gach-men');
		Route::get('nuoc-son/{id?}','nuocsonController@getProduct')->name('nuoc-son');
		Route::get('bao-gia-vat-tu','baogiaController@getDetails')->name('bao-gia-vat-tu');
		Route::GET('search/{keyword?}','homeController@GETSearch')->name('search');
		Route::POST('product/search','homeController@search');
		Route::GET('them-vao-gio-hang/{productID}','addcartsController@getcarts')->name('themvaogiohang');
		Route::GET('gio-hang','addcartsController@viewCart')->name('viewCart');
		Route::POST('cart/update','addcartsController@updateCart');
		Route::POST('cart/delete','addcartsController@deleteCart');
		Route::GET('checkout','checkoutController@viewCheckout');
		Route::POST('district/change','deliveryController@districtChange');
		Route::POST('town/change','deliveryController@townChange');
		Route::POST('checkout-success','orderController@addOrder')->name('addOrder');
		Route::GET('don-hang','orderController@orderPending')->name('don-hang');
		Route::POST('change-order','orderController@change_order');
		Route::GET('don-hang/chi-tiet','orderController@getOrdDetails')->name('getOrder');
	//	Route::GET('don-hang/chi-tiet','orderController@viewOrdDetails')->name('ordDetailsView');
		Route::GET('sanpham', 'productController@sanpham');
		Route::POST('sanpham/page', 'productController@pagination');
		Route::get('timkiem','searchController@index');
		Route::POST('timkiem','searchController@search');
		Route::get('demo','demoController@index');
		
	});


	

?>