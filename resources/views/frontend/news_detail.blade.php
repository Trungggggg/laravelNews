@extends("frontend.layout")
@section("controller")
<?php 
	$arr= DB::table('tbl_news')->where("pk_news_id","=",$id)->first();
	//xem lai
?>
	<div id="block_tin">
		<!-- Bar Tin tuc -->
		<div style="background-image:url({{asset('frontend/images/bar.jpg')}}); background-repeat:no-repeat; width:250px; height:25px;"><div style="padding-top:5px; padding-left:10px; font-weight:bold;">Tin sự kiện</div></div>
		<!-- End Bar Tin tuc -->
		<!-- Tin tuc -->
	<div style="font-weight:bold; padding-top:10px; padding-bottom:10px;">{{$arr->c_name}}</div>			
	<div style="text-align:justify;"><img src="{{asset('upload/news/'.$arr->c_img)}}" style="max-width: 200px;margin-right: 5px;text-align: left;" />
		<div>{!! $arr->c_description !!}</div>
		<div>{!! $arr->c_content !!}</div>
	</div>
		<!-- End Tin tuc -->
		
		<!--Cac tin khac--><br /><br />
		<div style="font-weight:bold;">Tin tức khác</div>
		<ul>
		<?php 
			$news_other=DB::table("tbl_news")->where("pk_news_id","<",$arr->pk_news_id)->orderBy("pk_news_id","desc")->limit(8)->get();
		 ?>
		 @foreach($news_other as $news_other_rows)
			<li style="padding-top:5px;"><a href="{{url('news/detail/'.$news_other_rows->pk_news_id)}}">{{$news_other_rows->c_name}}</a></li>
		@endforeach
		</ul>
		<!--End-->
		
	  </div>
@endsection