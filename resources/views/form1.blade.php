<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<legend style="width: 300px;margin: auto;">
		<form method="post" action="">
		<input type="hidden" name="_token" value="{{ csrf_token()}}">
		<!-- hidden la k hien nhung van luu giu lieu -->
		<table>
			<tr cell-padding=5;>
				String <input type="text" name="str"><input type="submit" name="" value="Add">
			</tr>
		</table>
		</form>
	</legend>
</body>
</html>