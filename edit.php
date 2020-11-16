<?php 
	require 'config.php';

	if ($_POST) {
		$title=$_POST['title'];
 		$desc=$_POST['description'];
 		$id=$_POST['id'];

 		$pdostatement=$pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id=$id");
 		$result=$pdostatement->execute();
 		if($result){
 		echo "<script>alert('New Todo is Updated');window.location.href='index.php';</script>";
 	}
	}else{
		$pdostatement=$pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
		$pdostatement->execute();
		$result=$pdostatement->fetchAll();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit New</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
		<div class="card">
			<div class="card-body">
				<h2>Edit New Todo</h2>
				<form class="" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea calss="form-group" name="description" rows="8" cols="80"><?php echo $result[0]['description'] ?></textarea>
					
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="" value="UPDATE"></input>
						<a href="index.php" class="btn btn-warning" name="" >BACK</a>
					</div>


				</form>

			</div>
		</div>
</body>
</html>