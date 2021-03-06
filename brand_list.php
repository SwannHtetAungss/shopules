<?php
	require 'backendheader.php';
    require 'connection.php';

    $sql="SELECT * FROM brands ORDER BY name ASC";
    $statement=$pdo->prepare($sql);
    $statement->execute();

    $brands=$statement->fetchAll();
?>

	<div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Brands </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="brand_new.php" class="btn btn-outline-primary">
                <i class="icofont-plus"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach($brands as $brand){
                                        $id=$brand['id'];
                                        $name=$brand['name'];
                                        $photo=$brand['photo'];

                                ?>
                                <tr>
                                    <td> <?= $i++ ?> </td>
                                    <td> 
                                        <div class="d-flex no-block align-items-center">
                                            <?php if($photo){ ?>
                                                <div class="mr-3">
                                                    <img src="<?= $photo; ?>" alt="user" class="rounded-circle" width="100" height="90" />
                                                </div>
                                            <?php } ?>
                                            <div class="">
                                               <h5 class="text-dark mb-0 font-8 font-weight-light">
                                                   <?= $name; ?>
                                               </h5> 
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="brand_edit.php?id=<?=$id?>" class="btn btn-warning">
                                            <i class="icofont-ui-settings"></i>
                                        </a>

                                        <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')" action="brand_delete.php" method="POST">

                                            <input type="hidden" name="id" value="<?= $id ?>">

                                            <button class="btn btn-outline-danger">
                                                 <i class="icofont-close"></i>
                                            </button>
                                            
                                        </form>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
	require 'backendfooter.php';
?>