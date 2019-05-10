<?php 
	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use DB;
	use Request;
	//de su dung model  can khai bao de su dung model co ten la category ke thua tu controller
	use App\category;
	class categoryController extends controller{
		public function list_category(){
			//lay tat ca cac ban ghi
			$data["arr"]=category::all();
			return view("backend.category_news",$data); 
		}
		public function edit($id){
			//lay 1 ban ghi truyen vao su dung model
			// $data["arr"]=category::where("pk_category_news_id","=",$id);
			$data["arr"]=DB::table("tbl_category_news")->where("pk_category_news_id","=",$id)->first();
			return view("backend.add_edit_category",$data);
		}
		public function do_edit($id){
			$c_name=Request::get("c_name");
			category::where("pk_category_news_id","=",$id)->update(array("c_name"=>$c_name));
			return redirect(url("admin/category"));
		}
		public function add(){
			return view("backend.add_edit_category");
		}
		public function do_add(){
			$c_name=Request::get("c_name");
			$cat=new category();
			$cat->c_name=$c_name;//khai bao sau cat la ten cot=gia tri cua cot
			$cat->tag="";
			$cat->save();
			return redirect(url("admin/category"));
		}
		public function delete($id){
			category::where("pk_category_news_id","=",$id)->delete();
			return redirect(url('admin/category'));
		}
}
?>