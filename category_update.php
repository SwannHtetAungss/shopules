<?php
    require 'connection.php';

    $id=$_POST['id'];
    $oldlogo=$_POST['oldlogo'];

    $name=$_POST['name'];
    $photo=$_FILES['photo'];
    

    $source_dir='image/category/';

    // image/category/12345.jpg 

    if(isset($photo) && $photo['size']>0){
        $filename = mt_rand(100000,999999);
    $file_array = explode('.', $photo['name']);
    $file_exe = $file_array[1];

    $filepath = $source_dir.$filename.".".$file_exe;
    move_uploaded_file($photo['tmp_name'], $filepath);

    unlink($oldlogo);
    }else{
        $filepath = $oldlogo;
    }
    

    $sql="UPDATE categories set name=:value1,logo=:value2 where id=:value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$name);
    $statement->bindParam(':value2',$filepath);
    $statement->bindParam(':value3',$id);
    $statement->execute();

    header('location:category_list.php');
?>
