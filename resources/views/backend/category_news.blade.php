@extends("backend.layout")
@section("controller")
	<div class="col-md-8 col-md-offset-2">
		<div style="margin-bottom: 5px;">
			<a href="{{url('admin/category/add')}}" class="btn btn-primary">ADD</a>
			<div class="panel panel-primary">
			<div class="panel-heading">category_news</div>
			<div class="panel-body">
				<table class="table table-hover table-bordered">
					<tr>
						<th>Ten danh muc</th>
						<th style="width: 100px;"></th>
					</tr>
					@foreach($arr as $rows)
					<tr>
						<td>{{$rows->c_name}}</td>
						<td style="text-align: center;">
							<a href="{{url('admin/category/edit/'.$rows->pk_category_news_id)}}">Edit</a>&nbsp;&nbsp;
							<a href="{{url('admin/category/delete/'.$rows->pk_category_news_id)}}" onclick="return window.confirm('Are you Sure?')">Delete</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		</div>
	</div>
@endsection