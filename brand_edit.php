<?php 
    require 'backendheader.php';
    require 'connection.php';

    $id=$_GET['id'];

    $sql="SELECT * FROM brands where id=:value1";
    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$id);
    $statement->execute();

    $brand=$statement->fetch(PDO::FETCH_ASSOC);
?>

    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Brand Edit Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="brand_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="brand_update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $brand['id'] ?>">
                        <input type="hidden" name="oldphoto" value="<?= $brand['photo'] ?>">
                        
                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="name" value="<?= $brand['name'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                            <div class="col-sm-10">
                              <input type="file" id="photo_id" name="photo">

                              <img src="<?= $brand['photo'] ?>" alt="photo" class="w-25">
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