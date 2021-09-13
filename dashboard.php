<?php 
	require 'backendheader.php';
	require 'connection.php';

	$todayDate=date('Y-m-d');
	$active=0;
	$roleid=2;

	// Today Order Count
	$sql="SELECT count(ord.id) as ordertotal FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate=:value2";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$todayDate);
    $statement->execute();
    $orderCount=$statement->fetch(PDO::FETCH_ASSOC);

    // Customer Count
    $sql="SELECT count(u.id) as usertotal FROM users u JOIN model_has_roles m ON u.id=m.user_id JOIN roles r ON m.role_id=r.id where m.role_id=:v1 AND u.status=:v2";
	$statement=$pdo->prepare($sql);
    $statement->bindParam(':v1',$roleid);
    $statement->bindParam(':v2',$active);
	$statement->execute();
	$userCount=$statement->fetch(PDO::FETCH_ASSOC);

	// Brand Count
	$sql="SELECT count(b.id) as brandtotal FROM brands b";
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$brandCount=$statement->fetch(PDO::FETCH_ASSOC);

	// Item Count
	$sql="SELECT count(i.id) as itemtotal FROM items i";
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$itemCount=$statement->fetch(PDO::FETCH_ASSOC);
?>
	
	<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon">
            <i class="icon icofont-prestashop"></i>
            <div class="info">
              <h4>Today order</h4>
              <p><b> <?= $orderCount['ordertotal']; ?> </b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon">
            <i class="icon icofont-ui-user-group"></i>
            <div class="info">
              <h4>Customers</h4>
              <p><b> <?= $userCount['usertotal']; ?> </b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon">
            <i class="icon icofont-badge"></i>
            <div class="info">
              <h4>Brands</h4>
              <p><b> <?= $brandCount['brandtotal']; ?> </b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon">
            <i class="icon icofont-box"></i>
            <div class="info">
              <h4>Items</h4>
              <p><b> <?= $itemCount['itemtotal']; ?> </b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      	<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Monthly Sales</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>

<?php 
	require 'backendfooter.php';
?>