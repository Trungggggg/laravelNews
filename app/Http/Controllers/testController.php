<?php 
	namespace App\Http\Controllers;
	//muon ke thua class Controller thi phai use App\Http\Controllers\Controller
	use App\Http\Controllers\Controller;
	//muon su dung doi tuong nao, phai khai bao doi tuong do bang tu khoa use
	use Request;
	use DB;
	class testController extends Controller{
		public function hello(){
			echo "<h1>Hello world</h1>";
		}
		public function index(){
			echo "<h1>Đây là function index</h1>";
		}
		public function get_param(){
			$str = Request::get("str");
			echo "<h1>$str</h1>";
		}
		//truyen bao nhieu bien (cau hinh o file web.php) thi ghi bay nhieu bien truyen vao funciton
		public function get_param1($a,$b){
			echo "<h1>$a</h1>";
			echo "<h1>$b</h1>";
		}
		//truy van csdl, lay ra cac ban ghi
/*
	- Cu phap:
		DB::table("ten table")->where("ten cot","gia tri so sanh","gia tri")->
			->orderBy("ten cot","asc/desc")
				-> groupBy("ten cot")
					-> get() // lay tat ca cac ban ghi
					-> first() // lay mot ban ghi
					-> paginate(so luong ban ghi) // phan trang
		DB::select("cau lenh sql") -> truy van full sql
		DB::insert("sql") -> insert ban ghi vao csdl
		DB::update("sql") -> update ban ghi
		DB::Delete("sql") -> xoa ban ghi
*/
		public function csdl1(){
			$arr = DB::table("users")->where("email","like","%@%")->get();
			//duyet cac ban ghi va xuat len man hinh			
			foreach($arr as $rows)
				echo "<h1>".$rows->email."</h1>";
		}
	}
 ?>