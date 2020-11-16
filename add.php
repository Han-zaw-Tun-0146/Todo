<?php 
 require "config.php";

 if ($_POST) {
 	$title=$_POST['title'];
 	$desc=$_POST['description'];

 	$sql="INSERT INTO todo(title,description) VALUES(:title,:description)";
 	$pdostatement=$pdo->prepare($sql);
 	$result=$pdostatement->execute(
 		array(
 			':title'=>$title,
 			':description'=>$desc


 		)
 	);
 	if($result){
 		echo "<script>alert('New Todo is added');window.location.href='index.php';</script>";
 	}
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
		<div class="card">
			<div class="card-body">
				<h2>Create New Todo</h2>
				<form class="" action="add.php" method="post">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title" value="" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea calss="form-group" name="description" rows="8" cols="80"></textarea>
					
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="" value="SUBMIT"></input>
						<a href="index.php" class="btn btn-warning" name="" >BACK</a>
					</div>


				</form>

			</div>
		</div>
</body>
</html>