<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
	Route::get("php16",function(){
		echo "<h1>hello php16</h1>";
	});
Route::get("php16/hello",function(){
	echo "<h1>hello</h1>";
});
// Route::get("truyenbien-{bien1}-{bien2}",function($bien1,$bien2){});
Route::get("truyenbien-{bien1}-{bien2}",function($bien1,$bien2){
	echo "<h1>bien 1:$bien1</h1>";
	echo "<h1>bien 2:$bien2</h1>";
	// co the dung - hoac /
});
//truyen vao 3 so theo cu phap php16_laravel/4/5/6 xuat ra gia tri lon nhat 6
Route::get("{bien1}/{bien2}/{bien3}",function($a,$b,$c){
	$tt=$a;
	if ($b>$tt) {
		# code...
		$tt=$b;
	}
	if ($c>$tt) {
		# code...
		$tt=$c;
	}
	echo $tt;
//hoac $b>$tt?$b:$tt;
//hoac $c>$tt?$c:$tt;
});
//goi view su dung lenh return view("ten view");
Route::get("view1",function(){
	return view("view1");
});
//truyen bien ra view
//file view dat trong 1 thu muc thuc hien cau truc return view("thumuc.tenview")
//file dat trong thu muc
Route::get("goiview2",function(){
	return view("thumuc.view2");
});
// http://localhost/php16_laravel/public/view1
//truyen bien ra view,su dung return view("tenview",array danh sach bien)
//ham extract(array) se bien cac key cua array thanh ten bien de tro den value
Route::get("goiview3",function(){
	$arr=array();
	$arr["a"]=1;
	$arr["b"]="hello php";
	extract($arr);
	echo $b;
});
Route::get("goiview4",function(){
	$data["str1"]="PHP16";
	$data["str2"]="Hello world";
	return view("view4",$data);
});
Route::get("goiview5/{str}",function($str){
	$arr["str"]=$str;
	return view("view4",$arr);
});
Route::get("goiform",function(){
	return view("form1");
});

//localhost/php16_laravel/public/goform
Route::post("goiform",function(){
	$str=Request::get("str");
	echo $str;
});
// controller trong
Route::get("controller","testController@hello");
Route::get("controller1","testController@index");
Route::get("controller2","testController@get_param");
//truyen cac bien tren url
Route::get("controller3/{a}/{b}","testController@get_param1");
//truy van csdl
/*
	file cofig luu cau hinh chua csdl: .env
	chay lenh php artisan migrate trong cmd
 */
//hien thi password bang di tuong Hash::make(password)
//trong phan nay va view dung doi tuong k can khai bao chi trong controller moi can khai bao
Route::get("getpassword/{password}",function($password){
	$password=Hash::make($password);
	echo $password;
	//do ma hoa nay manh hon dung md5
	//truy van csdl dung doi tuong DB
});
Route::get("csdl","testController@csdl1");
//bat dau lam
//==============================
//
// de bat 1 tag tren url(vd tag admin su dung cu phap:)
		// Route::group(array("prefix"=>"ten tag"),function(){
		Route::group(array("prefix"=>"admin"),function(){
			Route::get("user",function(){
				echo "<h1>use page</h1>";
			});
			Route::get("news",function(){
			echo "<h1>News page</h1>";
			});
		});
// trong thu muc admin > users va news thi admin phai dung prefix de goi lan luot den 
// laravelviet.net
// cac MVC se duoc load vao trong 1 layout template
// khi go 1 route vd:/admin/homethi se goi view("home")
// toan bo view("home") nay se do ra 1 bien,bien nay se load vao teamplate layout