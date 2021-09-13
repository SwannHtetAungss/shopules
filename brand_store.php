<?php 

	require 'connection.php';

	$name=$_POST['name'];
	$photo=$_FILES['photo'];
	//var_dump($photo);

	$source_dir="image/brand/";

	// image/brand/1234.png
	$filename=mt_rand(100000,999999);
	$file_array=explode('.', $photo['name']);
	$file_exe=$file_array[1];

	$filepath=$source_dir.$filename.'.'.$file_exe;
	move_uploaded_file($photo['tmp_name'], $filepath);

	$sql = "INSERT INTO brands (name,photo) Values (:value1,:value2)";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$name);
	$statement->bindParam(':value2',$filepath);
	$statement->execute();

	header('location:brand_list.php');
?>