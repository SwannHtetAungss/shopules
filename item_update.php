<?php 
	require 'connection.php';

	$id=$_POST['id'];
	$oldphoto=$_POST['oldphoto'];

	$codeno=$_POST['codeno'];
	$name=$_POST['name'];
	$price=$_POST['price'];
	$discount=$_POST['discount'];
	$description=$_POST['description'];
	$photo=$_FILES['photo'];

	$brand_id=$_POST['brand_id'];
	$subcategory_id=$_POST['subcategory_id'];

	$source_dir='image/item/';

    // image/category/12345.jpg 

    if(isset($photo) && $photo['size']>0){
        $filename = mt_rand(100000,999999);
	    $file_array = explode('.', $photo['name']);
	    $file_exe = $file_array[1];

	    $filepath = $source_dir.$filename.".".$file_exe;
	    move_uploaded_file($photo['tmp_name'], $filepath);

	    unlink($oldphoto);
    }else{
        $filepath = $oldphoto;
    }

    $sql="UPDATE items SET codeno=:value1,name=:value2,price=:value3,discount=:value4,description=:value5,photo=:value6,brand_id=:value7,subcategory_id=:value8 where id=:value9";
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$codeno);
    $statement->bindParam(':value2',$name);
    $statement->bindParam(':value3',$price);
    $statement->bindParam(':value4',$discount);
    $statement->bindParam(':value5',$description);
    $statement->bindParam(':value6',$filepath);
    $statement->bindParam(':value7',$brand_id);
    $statement->bindParam(':value8',$subcategory_id);
    $statement->bindParam(':value9',$id);
    $statement->execute();

    header('location:item_list.php');

?>