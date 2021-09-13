<?php 
	require 'connection.php';
	$id=$_POST['id'];

	$sql="DELETE FROM brands where id=:value1";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$id);
	$statement->execute();

	header('location:brand_list.php');
?>