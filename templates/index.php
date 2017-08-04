<!DOCTYPE html>
<html>
	<head>
		<title>task11</title>
		<link href="templates/css/bootstrap.min.css" rel="stylesheet">
		<link href="templates/css/style.css" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<body style="background: #71b3ca">
		<div class="container">

			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-4" style="font-weight: bold; text-align: center">
					%output%
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-4" style="background: #d5ecf4; padding: 30px;">
				<form method="post" action="">
				выбрать запись user9<input type="submit" name="select" value="SELECT">
				</form>
				<form method="post" action="">добавить запись<p><input type="text" name="string"/><input type="submit" name="addRow">
				</form>
				<form method="post" action="">перезаписать<p><input type="text" name="string"/><input type="submit" name="updateRow">
				</form>

				<form method="post" action="">
				удалить запись user9<input type="submit" name="deleteRow" value="DELETE">
				</form>
				</div>
			</div>
		</div>
 </body>
</html>