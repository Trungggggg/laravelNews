<?php 
	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	//trong controller, muốn sử dụng đối tượng nào thì phải khai báo đối tượng đó
	//đối tượng để lấy thông tin theo phương thức post, get
	use Request;
	// đối tượng thao tác với csdl
	use DB;
	//đối tượng mã hoá dữ liệu
	use Hash;
	class userController extends controller{
		//hiển thị danh sách user
		public function list_user(){
			//lấy toàn bộ bản ghi đổ vào biến array, phân trang bằng hàm paginate(so ban ghi tren mot trang)
			$data["arr"] = DB::table("users")->orderBy("id","desc")->paginate(3);
			//gọi view và đẩy dữ liệu ra
			return view("backend.list_user",$data);
		}
		//xoá user
		public function delete($id){
			//xoá user bằng cách gọi hàm delete
			DB::delete("delete from users where id=$id");
			//di chuyển về trang cần chỉ định
			return redirect(url("admin/user"));
		}
		//edit user
		public function edit($id){
			//lấy 1 bản ghi ứng với id truyền vào
			$arr = $data["arr"] = DB::table("users")->where("id","=",$id)->first();
			return view("backend.add_edit_user",$data);
		}
		//do edit user
		public function do_edit($id){
			$name = Request::get("name");
			//update bản ghi có id truyền vào
			DB::update("update users set name='$name' where id=$id");
			//kiem tra password, neu thay doi password thi update
			$password = Request::get("password");
			if($password!= ""){
				//ma hoa password theo ham ma hoa cua laravel
				$password = Hash::make($password);
				//update csdl
				DB::update("update users set password='$password' where id=$id");
			}
			//di chuyển về trang cần chỉ định
			return redirect(url("admin/user"));
		}
		//add user
		function add(){
			return view("backend.add_edit_user");
		}
		//do add user
		public function do_add(){
			$name = Request::get("name");
			$email = Request::get("email");
			$password = Request::get("password");
			$password = Hash::make($password);
			//insert ban ghi vao csdl
			DB::insert("insert into users(name,email,password) values('$name','$email','$password')");
			//di chuyển về trang cần chỉ định
			return redirect(url("admin/user"));
		}
	}
 ?>