<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="backend/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-6 col-xs-offset-3">
			<form method="post" action="">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-primary">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						<!-- row -->
						<div class="row" style="margin-top:5px;">
							<div class="col-md-3">Email</div>
							<div class="col-md-9"><input type="email" name="email" class="form-control"></div>
						</div>
						<!-- end row -->
						<!-- row -->
						<div class="row" style="margin-top:5px;">
							<div class="col-md-3">Password</div>
							<div class="col-md-9"><input type="password" name="password" class="form-control"></div>
						</div>
						<!-- end row -->
						<!-- row -->
						<div class="row" style="margin-top:5px;">
							<div class="col-md-3"></div>
							<div class="col-md-9">
								<input type="submit" value="Login" class="btn btn-primary"> 
								<input type="reset" value="Reset" class="btn btn-danger">
							</div>
						</div>
						<!-- end row -->
					</div>
				</div>
			</form>
			<?php if(Request::get("err") == 1){ ?>
			<div class="alert alert-danger">
				Sai email hoặc password	
			</div>
			<?php } ?>
		</div>
	</div>
</div>
</body>
</html>