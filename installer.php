<?php
	if (isset($_POST['submit'])) {
    $connect_code = "<?php
            define('HOST','".$_POST['host']."');
            define('USERNAME','".$_POST['username']."');
            define('PASSWORD','".$_POST['password']."');
            define('DB_NAME','".$_POST['db_name']."');
            \$base = '".$_POST['fullurl']."';
            \$siteTitle = '".$_POST['title']."';
            \$con = mysqli_connect(HOST, USERNAME,PASSWORD,DB_NAME);
            ?>";
    $fp = fopen(__DIR__ . '/.env', 'a');
    fwrite($fp, $connect_code);
    fclose($fp);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Install The App To Get Started</title>
	<link rel="icon" href="assets/img/favicon.png">
	<style>
		#radioButtons{
		    margin: 5px 0 10px 0;
		}

		input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
		}

		input[type=submit] {
            width: 100%;
            background-color: #016a70;
            color: white;
            padding: 14px 20px;
            margin-top: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
		}

		input[type=submit]:hover {
		    background-color: #018c94;
		}

		div {
            margin: auto;
            width: 30%;
            border-radius: 5px;
            background-color: #ededed;
            padding: 20px;
            font-family: 'Work Sans', sans-serif;
		}
	</style>
</head>
<body>
	<div>
	  <form method="post">
	    
	    <label for="lname">Site Title</label>
	    <input type="text" name="title" placeholder="My First Site">

	    <label for="fname">Full URL</label>
     	<input type="text" name="fullurl" placeholder="The Base URL">

	    <label for="lname">Database Host</label>
	    <input type="text" name="host" placeholder="localhost">

	    <label for="lname">Database Username</label>
	    <input type="text" name="username" placeholder="username">

	    <label for="lname">Database Password</label>
	    <input type="text" name="password" placeholder="****">

	    <label for="lname">Database Name</label>
	    <input type="text" name="db_name" placeholder="db_name">

	  
	    <input type="submit" name="submit" value="Submit">
	  </form>
	</div>
</body>
</html>
