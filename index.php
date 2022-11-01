<?php

    $mysqli = new mysqli("localhost","root","","php_gexton");

    if($mysqli->connect_error)
    {
        die('Connection Failed'.$mysqli->connect_error);
    }

   // echo "Database Connected Successfully ". $mysqli->host_info;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Create a QRCode</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		
</head>
<style>
	.center{
		margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
	}
</style>
<body>
<div class="container">
	<div class="col">

		<h1 class="page-header text-center">Create a QRCode</h1>
		<div>

			<form method="POST" action="api.php">
				
				<div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input type="text" class="form-control" id="text_code"name="text_code" >
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>
				<button type="submit"name="generate" class="btn btn-primary">Generate</button>
			</div>
		</div>
  
</form>
</div>
</body>
</html>