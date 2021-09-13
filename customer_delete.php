<?php 
	require 'connection.php';

	$id=$_POST['id'];
	$status=1;

	$sql="UPDATE users SET status=:v1 WHERE id=:v2";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':v1',$status);
	$statement->bindParam(':v2',$id);
	$statement->execute();

	header('location:customer_list.php');
?>