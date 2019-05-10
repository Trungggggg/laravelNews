@extends("backend.layout")
@section("controller")
<div class="col-md-8 col-xs-offset-2">
	<div style="margin-bottom:5px;">
		<a href="{{ url('admin/user/add') }}" class="btn btn-primary">Add user</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">List User</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th style="width:100px;"></th>
				</tr>
				<?php 
					foreach($arr as $rows)
					{
				 ?>
				<tr>
					<td><?php echo $rows->name; ?></td>
					<td><?php echo $rows->email; ?></td>
					<td style="text-align:center;">
						<a href="{{ url('admin/user/edit/'.$rows->id) }}">Edit</a>&nbsp;
						<a href="{{ url('admin/user/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
			<!--
				phân trang trong laravel, sử dụng 1 trong 2 hàm: $arr->render() hoặc $arr->links()
			-->
			<style type="text/css">
				.pagination{padding:0px; margin:0px;}
			</style>			
			<?php echo $arr->links(); ?>
		</div>
	</div>
</div>
@endsection