@extends('backend.layout')
@section('controller')
<div class="col-md-8 col-xs-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit news</div>
		<div class="panel-body">
			<form method="post" action="" enctype= "multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Tiêu đề</div>
				<div class="col-md-9">
					<input type="text" name="c_name" class="form-control" value="<?php echo isset($arr->c_name)?$arr->c_name:"" ?>">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thuộc danh mục</div>
				<div class="col-md-9">
					<select name="fk_category_news_id">
					<?php 
						$category = DB::table("tbl_category_news")->get();
						foreach($category as $rows)
						{
					 ?>
						<option <?php echo isset($arr->fk_category_news_id)&&$arr->fk_category_news_id==$rows->pk_category_news_id?"selected":""; ?> value="{{ $rows->pk_category_news_id }}">{{ $rows->c_name }}</option>			
					<?php } ?>
					</select>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Giới thiệu</div>
				<div class="col-md-9">
					<textarea name="c_description" class="form-control" style="height:250px;">			
					<?php echo isset($arr->c_description)?$arr->c_description:""; ?>			
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('c_description');
					</script>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Chi tiết</div>
				<div class="col-md-9">
					<textarea name="c_content" class="form-control" style="height:300px;">
					<?php echo isset($arr->c_description)?$arr->c_content:""; ?>
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('c_content');
					</script>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<input type="checkbox" <?php echo isset($arr->c_hotnews)&&$arr->c_hotnews==1?"checked":""; ?> name="c_hotnews" id="c_hotnews"> <label for="c_hotnews">Tin nổi bật</label>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Ảnh</div>
				<div class="col-md-9">
					<input type="file" name="c_img">
				</div>
			</div>
			<!-- end row -->			
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<input type="submit" class="btn btn-primary" value="Process">
				</div>
			</div>
			<!-- end row -->
			</form>
		</div>
	</div>
</div>
@endsection