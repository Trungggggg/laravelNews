<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="{{ asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet" />
<title>Laravel tin tuc</title>




</head>

<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59219a048028bb732704704c/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<div id="wrapper">
<!-- header -->
<div id="header">
	<div style="text-align:right; padding-top:50px; padding-right:300px; font-size:20px;">Họ và tên: Nguyễn Văn A</div>
</div>
<div id="menu">
	<a href="{{url('')}}">Trang chủ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="{{url('')}}"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="{{url('')}}"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div id="menu_line"></div>
<!-- end header -->
<!-- content -->
<div id="content">
<!-- left -->
	<div id="left" style="float:left;">
		<div id="menu_left">
			<?php
				$arr=DB::table("tbl_category_news")->get();
				foreach($arr as $rows){
			?>
			
			<div id="text_menu_left"><a href="{{url('news/category/'.$rows->pk_category_news_id)}}"><?php echo $rows->c_name;?></a></div>
			<?php
				}
			?>
		</div>
		
		
		
		<div id="logo">
			<div style="text-align:right; font-weight:bold; padding-right:60px; padding-top:6px;">Logo</div>
			<div style="border-color:#dddddd; border-style:solid; border-width:1px; margin-top:8px; padding-left:0px; padding-top:5px; padding-bottom:5px; padding-right:0px;">
			<?php
				$arr_adv=DB::table("tbl_adv")->where("c_position","=","1")->get();
			?>
			@foreach($arr_adv as $rows_adv)
			<div><a href="#"><img src="{{ asset($rows_adv->c_img) }}" border="0" width="190" /></a></div>
			@endforeach
			</div>
		</div>
	</div>
<!-- end left -->
<!-- main -->
	<div id="main">
	
	@yield('controller')

	</div>
<!-- end main -->
<!-- right -->
	<div id="menu_right">
		<div id="hot_news_bar"><div style="padding-top:5px; text-align:center; font-weight:bold">Tin nổi bật</div></div>
		<div id="hot_news">
		<marquee style="height:200px;"  direction="up" height="300" scrollamount="2" scrollamount=2 scrolldelay=2 onmouseover='this.stop()' onmouseout='this.start()'>
		<?php
			$arr_hotnews=DB::table("tbl_news")->where("c_hotnews","=","1")->orderBy("pk_news_id","desc")->get();
		?>
		@foreach($arr_hotnews as $rows_hotnews)
			<div style="padding-bottom:5px; padding-top:5px;">
			<a href="{{url('news/detail/'.$rows_hotnews->pk_news_id)}}">- {{$rows_hotnews->c_name}}</a></div>
		@endforeach
		</marquee>
		</div>		
		
		<div id="logo">
			<div style="text-align:right; font-weight:bold; padding-right:60px; padding-top:6px;">Logo</div>
			<div style="border-color:#dddddd; border-style:solid; border-width:1px; margin-top:8px; padding-left:0px; padding-top:5px; padding-bottom:5px; padding-right:0px;">
			<?php
				$arr_adv=DB::table("tbl_adv")->where("c_position","=","2")->get();
			?>
			@foreach($arr_adv as $rows_adv2)
			<div><a href="#"><img src="{{ asset($rows_adv2->c_img) }}" border="0" width="190" /></a></div>
			@endforeach
			
		</div>
		
	</div>
 <!-- end right -->
</div>
<!-- footer -->
<div id="footer">
	Your site<br />
	Địa chỉ: Cầu giấy - Hà Nội. Email: my_email@mail.com
</div>
<!-- end footer -->
</div>



</body>
</html>
