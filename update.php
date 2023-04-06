<?php
$con = new PDO("mysql:host=localhost;dbname=iarwebops",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE Name = '$str'");

  $result=mysqli_query($con, $sth);
  $sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

  if(!$result){
    die("query Failed".mysqli_error());
  }
  else{
    $row = mysqli_fetch_assoc($result);
    print_r($row);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup Form</title>
	<style>
		form {
			width: 500px;
			margin: 0 auto;
			background-color: #f1f1f1;
			padding: 20px;
			border-radius: 10px;
		}
		input[type=text], input[type=password], input[type=email] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		button[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		button[type=submit]:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<form method="post">
		<h2>Update Your Details</h2>
		
		<label for="username">Name</label>
		<input type="text" id="username" name="username" placeholder="Enter your username" value="<?php echo $row['Name']?>">

		<label for="email">Company</label>
		<input type="text" id="company" name="company" placeholder="Update your Company" value="<?php echo $row['Company']?>">

		<label for="password">Branch</label>
		<input type="text" id="Branch" name="branch" placeholder="Update your Branch" value="<?php echo $row['Branch']?>">

		<label for="confirm_password">Batch</label>
		<input type="text" id="batch" name="batch" placeholder="Update your Batch" value="<?php echo $row['Batch']?>">

		<button type="submit">Update</button>
	</form>
</body>
</html>

