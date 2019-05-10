<?php 
	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use DB;
	use Request;
	class newsController extends controller{
		public function list_news(){
			$data["arr"] = DB::table("tbl_news")->orderBy("pk_news_id","desc")->paginate(3);
			return view("backend.list_news",$data);
		}
		//edit news
		public function edit($id){
			$data["arr"] = DB::table("tbl_news")->where("pk_news_id","=",$id)->first();
			return view("backend.add_edit_news",$data);
		}
		//do edit news
		public function do_edit($id){
			$c_name = Request::get("c_name");
			$fk_category_news_id = Request::get("fk_category_news_id");
			$c_description = Request::get("c_description");
			$c_content = Request::get("c_content");
			$c_hotnews = Request::get("c_hotnews")=="on"?1:0;
			//update csdl
			DB::update("update tbl_news set c_name='$c_name',fk_category_news_id=$fk_category_news_id,c_description='$c_description',c_content='$c_content',c_hotnews=$c_hotnews where pk_news_id=$id");
			//kiem tra xem user co update anh hay khong
			if (Request::hasFile("c_img")) {
				# code...
				# ----------------------------------------
				# kiem tra neu co anh cu thi xoa anh do truoc khi update anh moi
				$arr_old_img=DB::table("tbl_news")->where("pk_news_id","=",$id)->select("c_img")->first();//lay 1 ban ghi
				$old_img=isset($arr_old_img->c_img)?$arr_old_img->c_img:"";
				if ($old_img != "" && file_exists('upload/news/'.$old_img)) {
					# code...
					unlink('upload/news/'.$old_img);
				}
				#-------------------------------------------
				# lay ten file
				# xem lai phan up de anh?
				$c_img=Request::file("c_img")->getClientOriginalName();
				$c_img=time()."_".$c_img;
				//thuc hien viec upload file
				Request::file("c_img")->move("upload/news",$c_img);
				//upload csdl
				DB::update("update tbl_news set c_img='$c_img' where pk_news_id=$id");
				// cach 2
				// DB::table("tbl_news")->where("pk_news_id","=",$id)->update(array("c_img"=>"$c_img"));
			}
			//di chuyển về trang cần chỉ định
			return redirect(url("admin/news"));
		}
		public function add(){
			return view("backend.add_edit_news");
		}
		public function do_add(){
			$c_name = Request::get("c_name");
			$fk_category_news_id = Request::get("fk_category_news_id");
			$c_description = Request::get("c_description");
			$c_content = Request::get("c_content");
			$c_hotnews = Request::get("c_hotnews")=="on"?1:0;
			if (Request::hasFile("c_img")) {
				$c_img=Request::file("c_img")->getClientOriginalName();
				$c_img=time()."_".$c_img;
				//thuc hien viec upload file
				Request::file("c_img")->move("upload/news",$c_img);
			}
			//insert cac ban ghi vao csdl
			// c1   DB::insert("insert into tbl_news(c_name,c_description,c_content,c_hotnews,fk_category_news_id,c_img) values('$c_name','$c_description','$c_content','$c_hotnews','$fk_category_news_id','$c_img')");
			// c2
			DB::table("tbl_news")->insert(array("c_name"=>$c_name,"c_description"=>$c_description,"c_content"=>$c_content,"c_hotnews"=>$c_hotnews,"fk_category_news_id"=>$fk_category_news_id,"c_img"=>$c_img));
			return redirect(url("admin/news"));
		}
		public function delete($id){
			//xoa anh
			# ----------------------------------------
			# kiem tra neu co anh cu thi xoa anh do truoc khi update anh moi
			$arr_old_img=DB::table("tbl_news")->where("pk_news_id","=",$id)->select("c_img")->first();//lay 1 ban ghi
			$old_img=isset($arr_old_img->c_img)?$arr_old_img->c_img:"";
			if ($old_img != "" && file_exists('upload/new/'.$old_img)) {
					# code...
				unlink('upload/news/'.$old_img);
				}
				#-------------------------------------------
				// DB::table("tbl_news")->where("pk_news_id","=",$id)->delete();
				DB::delete("delete from tbl_news where pk_news_id=$id");
				// di chuyen den tran
				return redirect("admin/news");
		}
	}
 ?>