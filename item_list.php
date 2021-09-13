<?php 
	require 'backendheader.php';
    require 'connection.php';

    $sql="SELECT i.id,i.codeno,i.name,i.photo,i.price,i.discount,i.description,b.name as brand_name,s.name as subcategory_name FROM items i JOIN brands b ON i.brand_id=b.id JOIN subcategories s ON i.subcategory_id=s.id ORDER BY i.name ASC";

    $statement=$pdo->prepare($sql);
    $statement->execute();

    $items=$statement->fetchAll();
?>

	<div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Items </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="item_new.php" class="btn btn-outline-primary">
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
                                  <th>Brand</th>
                                  <th>Price</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach ($items as $item) {
                                        $id=$item['id'];
                                        $codeno=$item['codeno'];
                                        $name=$item['name'];
                                        $photo=$item['photo'];
                                        $price=$item['price'];
                                        $discount=$item['discount'];
                                        $description=$item['description'];
                                        $brand_name=$item['brand_name'];

                                ?>
                                <tr>
                                    <td> <?= $i++ ?> </td>
                                    <td> 
                                        <div class="d-flex no-block align-items-center">
                                            <?php if($photo){ ?>
                                                <div class="mr-3">
                                                    <img src="<?= $photo; ?>" alt="user" class="rounded-circle" width="60" height="50" />
                                                </div>
                                            <?php } ?>
                                            <div class="">
                                               <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                    <?= $codeno; ?>
                                               </h5> 
                                               <span class="d-inline-block text-truncate" style="max-width: 300px;">
                                                  <?= $description; ?>
                                                </span>
                                            </div>
                                        </div>

                                    </td>
                                    <td> 
                                        <div class="d-flex no-block align-items-center">
                                            <div class="">
                                               <h5 class="text-dark mb-0 font-8 font-weight-light">
                                                   <?= $brand_name; ?>
                                               </h5> 
                                            </div>
                                        </div>

                                    </td>
                                    <td> 
                                        <div class="d-flex no-block align-items-center">
                                            <?php if($discount){ ?>
                                            <div class="">
                                               <h5 class="text-dark mb-0 font-8 font-weight-light">
                                                    <?= $discount.' MMK'; ?><br>
                                                   <del><?= $price.' MMK'; ?></del>
                                               </h5> 
                                            </div>
                                            <?php }else{ ?>
                                            <div class="">
                                               <h5 class="text-dark mb-0 font-8 font-weight-light">
                                                   <?= $price.' MMK'; ?>
                                               </h5> 
                                            </div>
                                            <?php } ?>    
                                        </div>

                                    </td>
                                    <td>
                                        <a href="item_edit.php?id=<?=$id?>" class="btn btn-warning">
                                            <i class="icofont-ui-settings"></i>
                                        </a>

                                        <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')" action="item_delete.php" method="POST">

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