<?php
//De yeu cau dang nhap khi vao mot group tag, phai goi ham: Route::auth()
Route::auth();
//tao group voi tag "admin", muon vao su dung phan nay phai dang nhap
Route::get("admin",function(){
	return redirect(url('admin/user'));
});
//khi user da dang nhap thi se dan den route home,khi do dan den duong dan admin/user
Route::get("home",function(){
	return redirect(url("admin/user"));
});
//group tag admin
//log out
Route::get("logout",function(){
	Auth::logout();
	return redirect(url('login'));
});
Route::group(array("prefix"=>"admin","middleware"=>"auth"),function(){
	Route::get("home",function(){
		return view("backend.home");
	});
	//list user
	Route::get("user","userController@list_user");
	//edit user
	Route::get("user/edit/{id}","userController@edit");
	//do edit user
	Route::post("user/edit/{id}","userController@do_edit");
	//add user
	Route::get("user/add", "userController@add");
	//do add user
	Route::post("user/add","userController@do_add");
	//delete user
	Route::get("user/delete/{id}","userController@delete");

	//list news
	Route::get("news","newsController@list_news");
	//edit news
	Route::get("news/edit/{id}","newsController@edit");
	//do edit news
	Route::post("news/edit/{id}","newsController@do_edit");
	//add news
	Route::get("news/add", "newsController@add");
	//do add news
	Route::post("news/add","newsController@do_add");
	//delete news
	Route::get("news/delete/{id}","newsController@delete");
	//add
	Route::get("news/add","newsController@add");
	Route::post("news/add","newsController@do_add");
	Route::get("news/delete/{id}","newsController@delete");
	//danh muc tin tuc
	//list category
	Route::get("category","categoryController@list_category");
	//edit category
	Route::get("category/edit/{id}","categoryController@edit");
	//do edit category
	Route::post("category/edit/{id}","categoryController@do_edit");
	//add category
	Route::get("category/add", "categoryController@add");
	//do add category
	Route::post("category/add","categoryController@do_add");
	//delete category
	Route::get("category/delete/{id}","categoryController@delete");
	//add
	Route::get("category/add","categoryController@add");
	Route::post("category/add","categoryController@do_add");
	Route::get("category/delete/{id}","categoryController@delete");
	
});
//=============
//tao middleware bang cau lenh 
//php artisan make:middleware php16Middleware
//khi tao file middleware o muc midd..
//no nhuw thang giu cua? khi dang nhap vao group admin phai nhay? qua thang middleware Auth
//middleaware thuong duoc di kem voi group
//de khai bao 1 middleware trong he thong,thuc hien trong file Kernel.php
// Route::group(array("prefix"=>"php16","middleware"=>"php16"),function(){
// 	Route::get("hello123",function(){
// 		echo "<h1>Hello</h1>";
// 	});
// });
//
//=============
//frontend
//thay welcome = home
Route::get('/', function () {
    return view('frontend.home');
});
//chi tiet tin tuc
Route::get("news/detail/{id}",function($id){
	$data["id"]=$id;
	return view("frontend.news_detail",$data);
});
//danh muc tin tuc
Route::get("news/category/{id}",function($id){
	$data["id"]=$id;
	return view("frontend.category_news",$data);
});
//lien he
Route::get("contact",function(){
	return view("frontend.contact");
});

Auth::routes();

Route::get('/home', 'HomeController@index');
