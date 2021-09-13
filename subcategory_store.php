<?php 
	require 'connection.php';

	$name=$_POST['name'];
	$category_id=$_POST['category_id'];

	$sql="INSERT INTO subcategories (name,category_id) VALUES (:value1,:value2)";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$name);
	$statement->bindParam(':value2',$category_id);
	$statement->execute();

	header('location:subcategory_list.php');

?>