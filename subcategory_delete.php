<?php 
	require 'connection.php';
	$id=$_POST['id'];

	$sql="DELETE FROM subcategories where id=:value1";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$id);
	$statement->execute();

	header('location:subcategory_list.php');

?>