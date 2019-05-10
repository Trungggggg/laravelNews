<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<meta charset="utf-8">
	<!--
		ham asset(duong dan) de load duong dan file, image (nhung file vat ly)
		ham route(duong dan) su dung de link de cac route
	-->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap.min.css') }}">
  <script language="javascript" src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('admin/home')}}">Home</a></li>
            <li class="active"><a href="{{ url('admin/category') }}">Danh mục tin tức</a></li>
            <li class="active"><a href="{{ url('admin/news') }}">Tin tức</a></li>
            <li class="active"><a href="{{ url('admin/user') }}">User</a></li>
            <li class="active"><a href="{{ url('logout') }}">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" style="margin-top:80px;">
    	@yield("controller")
    </div>
</body>
</html>