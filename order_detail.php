<?php 
	require 'backendheader.php';
	require 'connection.php';

	$id=$_GET['id'];

	$sql="SELECT ord.*, u.name as uname,u.address as uaddress,u.phone as uphone,u.email as uemail FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE ord.id=:v1";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':v1',$id);
	$statement->execute();
	$order=$statement->fetch(PDO::FETCH_ASSOC);

	$sql="SELECT * FROM item_order io INNER JOIN items i ON io.item_id=i.id WHERE io.order_id=:v2";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':v2',$id);
	$statement->execute();
	$orderdetails=$statement->fetchAll();

	$orderstatus=$order['status'];
?>

	<div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>
      <div class="row">
      	<div class="col-md-12 mb-3">
      		<form class="d-inline-block" onsubmit="return confirm('Are you sure want to CONFIRM?')" action="order_status.php" method="POST">

                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="status" value="1">

                <button class="btn btn-outline-info" <?php if($orderstatus >=1) echo "disabled" ?> >
                     <i class="icofont-tick-mark"> Confirm </i>
                </button>
                
            </form>
            <form class="d-inline-block" onsubmit="return confirm('Are you sure want to DELIVER?')" action="order_status.php" method="POST">

                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="status" value="2">

                <button class="btn btn-outline-dark" <?php if($orderstatus >=2) echo "disabled" ?>>
                     <i class="icofont-delivery-time"> Deliver </i>
                </button>
                
            </form>
            <form class="d-inline-block" onsubmit="return confirm('Are you sure want to SUCCESS?')" action="order_status.php" method="POST">

                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="status" value="3">

                <button class="btn btn-outline-success" <?php if($orderstatus >=3) echo "disabled" ?>>
                     <i class="icofont-thumbs-up"> Success </i>
                </button>
                
            </form>
            <form class="d-inline-block" onsubmit="return confirm('Are you sure want to CANCEL?')" action="order_status.php" method="POST">

                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="status" value="4">

                <button class="btn btn-outline-danger" <?php if($orderstatus >=4) echo "disabled" ?>>
                     <i class="icofont-close"> Cancel </i>
                </button>
                
            </form>

            
      	</div>

        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                	<img src="logo/logo_med.jpg" class="img-fluid w-25">
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: <?= date('d M / Y') ?> </h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                	<address>
                		<strong>Shopules Inc.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: <?= $_SESSION['login_user']['email']; ?></address>
                </div>
                <div class="col-4">To
                	<address>
                		<strong><?= $order['uname']; ?></strong>
                		<br><?= $order['uaddress']; ?>
                		<br>Phone: <?= $order['uphone']; ?>
                		<br>Email: <?= $order['uemail']; ?>
                	</address>
                </div>
                <div class="col-4">
                	<b>Invoice #<?= $order['voucherno']; ?></b><br><br>
                	<b>Order date:</b> <?= date('F d, Y h:mA',strtotime($order['created_at']));?>
                	<br><b>Total:</b> <?= $order['total']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php 
                    		foreach($orderdetails as $orderdetail){
                    			$qty=$orderdetail['qty'];
                    			$item_name=$orderdetail['name'];
                    			$item_codeno=$orderdetail['codeno'];

                    			$item_price=$orderdetail['price'];
                    			$item_discount=$orderdetail['discount'];

                    			if($item_discount){
                    				$price=$item_discount;
                    			}else{
                    				$price=$item_price;
                    			}

                    			$subtotal=$qty*$price;

                    	?>
                    	<tr>
                    		<td> <?= $qty; ?> </td>
                    		<td> <?= $item_name; ?> </td>
                    		<td> <?= $item_codeno; ?> </td>
                    		<td> <?= $price; ?> </td>
                    		<td> <?= $subtotal; ?> </td>
                    	</tr>

                    	<?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>

<?php 
	require 'backendfooter.php';
?>