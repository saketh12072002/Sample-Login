<!DOCTYPE html>
<html>
<head>
	<title>Editor</title>
	 <style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
		.search-box {
			display: flex;
			align-items: center;
			width: 300px;
			height: 40px;
			border: 2px solid #ccc;
			border-radius: 20px;
			overflow: hidden;
			transform: translatex(40vw);
		}
		
		.search-box input[type="text"] {
			flex-grow: 1;
			height: 100%;
			padding: 0 10px;
			border: none;
			background-color: transparent;
			font-size: 14px;
		}
		
		#buttom {
			height: 100%;
			padding: 20px 20px;
			border: none;
			background-color: #4CAF50;
			color: #fff;
			font-size: 14px;
			cursor: pointer;
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
			margin-left:21px;
		}
		
		#buttom:hover {
			background-color: #aaa;
		}
		.btn{
			padding: 10px 20px;
			color:#000;
			background-color:red;
		}
		.btn a{
			text-decoration:none;
			color:#fff;
		}
		h2{
			text-align:center;
			margin: 20px 0px;

		}
	 </style>

</head>
<body>
<h2>You can search for Michael, Rohit, Kohli to get their details</h2>
<div class="search-box">
<form method="post">
<input type="text" name="search" placeholder="Search....">
<input id="buttom" type="submit" name="submit">
	</div>
</form>



</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=iarwebops",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE Name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Company</th>
        <th>Branch</th>
        <th>Batch</th>
				<th>.</th>
			</tr>
			<tr>
				<td><?php echo $row->Name; ?></td>
				<td><?php echo $row->Company;?></td>
        <td><?php echo $row->Branch;?></td>
        <td><?php echo $row->Batch;?></td>
				<td>
          <button class="btn "><a href="update.php? updateid='.$id.'">Update</a></button>
        </td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>