@extends("backend.layout")
@section("controller")
	<div class="col-md-8 col-md-offset-2">
		<div style="margin-bottom: 5px;">
			<a href="{{url('admin/category/add')}}" class="btn btn-primary">Add</a>
			<div class="panel panel-primary">
			<div class="panel-heading">category_news</div>
			<div class="panel-body">
				<form method="post" action="">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<!-- row -->
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">Ten danh muc</div>
								<div class="col-md-10">
									<input type="text" name="c_name" class="form-control" value="{{ isset($arr->c_name)?$arr->c_name:""}}" required="">
								</div>
							</div>
							<div class="row" style="margin-top:5px;">
							<div class="col-md-3"></div>
							<div class="col-md-9">
								<input type="submit" value="Login" class="btn btn-primary"> 
								<input type="reset" value="Reset" class="btn btn-danger">
							</div>
						</div>
						</div>
					<!-- end row -->
				</form>
			</div>
			</div>
			</div>
			</div>
@endsection