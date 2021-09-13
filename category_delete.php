<?php 
	require 'connection.php';
	$id=$_POST['id'];
	// var_dump($id);
	
	$sql = "DELETE FROM categories where id=:value1";

	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$id);
	$statement->execute();

	header('location:category_list.php');

?>