<?php 
	require 'backendheader.php';
	require 'connection.php';

    $roleid=2;
    $active=0;

	$sql="SELECT u.* FROM users u JOIN model_has_roles m ON u.id=m.user_id JOIN roles r ON m.role_id=r.id where m.role_id=:v1 AND u.status=:v2";
	$statement=$pdo->prepare($sql);
    $statement->bindParam(':v1',$roleid);
    $statement->bindParam(':v2',$active);
	$statement->execute();
	$users=$statement->fetchAll();
?>

	<div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> User </h1>
        </div>
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
                                  <th>Contact</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                    $i=1;
                                    foreach($users as $user){
                                        $id=$user['id'];
                                        $name=$user['name'];
                                        $email=$user['email'];
                                        $profile=$user['profile'];
                                        $phone=$user['phone'];
                                        $address=$user['address'];

                                ?>
                                <tr>
                                    <td> <?= $i++ ?> </td>
                                    <td> 
                                        <div class="d-flex no-block align-items-center">
                                            
                                            <div class="mr-3">
                                                <img src="<?= $profile; ?>" alt="user" class="rounded-circle" width="100" height="90" />
                                            </div>
                                            
                                            <div class="">
                                               <h5 class="text-dark mb-0 font-16 font-weight-light">
                                                   <?= $name; ?>
                                               </h5>
                                               <span class="d-inline-block text-truncate">
                                                  <?= $email; ?>
                                                </span>
                                            </div>
                                        </div>

                                    </td>
                                    <td> 
                                        <div class="d-flex no-block align-items-center">                
                                            <div class="">
                                               <h5 class="text-dark mb-0 font-16 font-weight-light">
                                                   <?= $phone; ?>
                                               </h5>
                                               <span class="d-inline-block text-truncate">
                                                  <?= $address; ?>
                                                </span>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')" action="customer_delete.php" method="POST">

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