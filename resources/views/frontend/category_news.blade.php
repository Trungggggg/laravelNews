@extends("frontend.layout")
@section('controller')
	<div id="block_tin">
	<?php 
		$category = DB::table("tbl_category_news")->where("pk_category_news_id","=",$id)->get();
		
	?>
	@foreach($category as $rows_category)
		<div style="background-image:url('{{ asset('frontend/images/bar.jpg') }}'); background-repeat:no-repeat; width:250px; height:25px;"><div style="padding-top:5px; padding-left:10px; font-weight:bold;">{{ $rows_category->c_name }}</div></div>
		<!-- End Bar Tin tuc -->
		<?php
			$arr = DB::table("tbl_news")->where("fk_category_news_id","=",$rows_category->pk_category_news_id)->orderBy("pk_news_id","desc")->paginate(2);
			?>
			@foreach ($arr as $key => $rows)		
		<!-- Tin tuc -->
	<div style="font-weight:bold; padding-top:10px; padding-bottom:10px;"><a href="{{url('news/detail/'.$rows->pk_news_id)}}">{{$rows->c_name}}</a></div>			
	<div style="text-align:justify;"><img src="{{asset('upload/news/'.$rows->c_img)}}" align="left" style="border:1px solid #dddddd;width: 100px;" />{!!$rows->c_description!!}</div>
	<div style="clear: both"></div>
	<!-- phai co 4 dau ! -->
		<!-- End Tin tuc -->
		@endforeach
		<br>
	@endforeach
	 </div>
	 <style type="text/css">
	 	.pagination{
	 		padding: 0px;
	 		margin: 0px;
	 		list-style-type: none;
	 	}
	 	.pagination li{
	 		display: inline;
	 	}
	 </style>
	 <div><?php echo $arr->links(); ?></div>
@endsection