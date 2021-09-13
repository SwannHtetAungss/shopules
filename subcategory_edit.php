<?php
    require 'backendheader.php';
    require 'connection.php';
 
    $id=$_GET['id'];

    $sql="SELECT * FROM subcategories where id=:value1";
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$id);
    $statement->execute();

    $subcategory=$statement->fetch(PDO::FETCH_ASSOC);
    $edit_category_id=$subcategory['category_id'];
?>

    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Sub Category Edit Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategory_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="subcategory_update.php" method="POST">
                        <input type="hidden" name="id" value="<?=$subcategory['id']?>">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="name" value="<?=$subcategory['name']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
                            <div class="col-sm-10">
                                <select name="category_id" id="category_id" class="form-control">
                                    <?php 
                                        require 'connection.php';
                                        $sql="SELECT * FROM categories";
                                        $result=$pdo->query($sql);
                                        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                                        echo "<option> -- Choose one category -- </option>";
                                        if(isset($edit_category_id)){
                                            foreach($rows as $category){
                                            $category_id=$category['id'];
                                            $name=$category['name'];
                                            if($edit_category_id==$category_id){
                                                echo "<option value='$category_id' selected='selected'>$name</option>";
                                            }else{
                                                echo "<option value='$category_id'>$name</option>";
                                            }
                                            
                                            }
                                        }
                        
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icofont-save"></i>
                                    Update
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php 
    require 'backendfooter.php';
?>