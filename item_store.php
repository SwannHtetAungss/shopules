<?php 
	require 'connection.php';
 
	$codeno=$_POST['codeno'];
	$name=$_POST['name'];
	$brand_id=$_POST['brand_id'];
	$subcategory_id=$_POST['subcategory_id'];
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$description=$_POST['description'];

	$photo=$_FILES['photo'];
	$source_dir="image/item/";
	$filename=mt_rand(100000,999999);
	$file_array=explode('.', $photo['name']);
	$file_exe=$file_array[1];

	$filepath=$source_dir.$filename.".".$file_exe;
	move_uploaded_file($photo['tmp_name'],$filepath);

	$sql="INSERT INTO items(codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES (:value1,:value2,:value3,:value4,:value5,:value6,:value7,:value8)";

	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$codeno);
	$statement->bindParam(':value2',$name);
	$statement->bindParam(':value3',$filepath);
	$statement->bindParam(':value4',$price);
	$statement->bindParam(':value5',$discount);
	$statement->bindParam(':value6',$description);
	$statement->bindParam(':value7',$brand_id);
	$statement->bindParam(':value8',$subcategory_id);
	$statement->execute();

	header('location:item_list.php');

?>