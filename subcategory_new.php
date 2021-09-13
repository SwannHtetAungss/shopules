<?php
    require 'backendheader.php';
?>

    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Sub Category Form </h1>
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
                    <form action="subcategory_store.php" method="POST">
                        
                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="name">
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
                                        foreach($rows as $category){
                                            $id=$category['id'];
                                            $name=$category['name'];
                                            echo "<option value='$id'>$name</option>";
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icofont-save"></i>
                                    Save
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