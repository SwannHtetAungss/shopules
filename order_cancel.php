<?php 
	require 'connection.php';

	$id=$_POST['id'];
	$status=4;

	$sql="UPDATE orders SET status=:value1 where id=:value2";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$status);
	$statement->bindParam(':value2',$id);
	$statement->execute();

	header('location:order_list.php');

?>