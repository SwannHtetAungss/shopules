<?php 
	require 'frontendheader.php';
	require 'connection.php';

	$bid=$_GET['id'];

	$sql="SELECT * FROM brands where id=:value1";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$bid);
	$statement->execute();
	$brand=$statement->fetch(PDO::FETCH_ASSOC);

	$sql="SELECT s.id as sid, s.name as sname FROM subcategories s JOIN items i ON s.id=i.subcategory_id JOIN brands b ON i.brand_id=b.id where b.id=:value1 group by i.subcategory_id";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$bid);
	$statement->execute();
	$subcategories=$statement->fetchAll();

?>

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $brand['name']; ?> </h1>	
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">
		<?php 
			foreach($subcategories as $subcategory){
				$sid=$subcategory['sid'];
				$sname=$subcategory['sname'];

		?>
		<div class="row mt-5">
            <div class="col">
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title"> <?= $sname; ?> </h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                    	<?php 
                    		$sql="SELECT i.* FROM items i where i.subcategory_id=$sid";
                    		$statement=$pdo->prepare($sql);
                    		$statement->execute();
                    		$items=$statement->fetchAll();

                    		foreach($items as $item){
                    			$id=$item['id'];
                    			$name=$item['name'];
                    			$price=$item['price'];
                    			$discount=$item['discount'];
                    			$photo=$item['photo'];
                    			$codeno=$item['codeno'];

                    	?>

					    <div class="owl-item">
					        <div class="item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					        		<img src="<?= $photo; ?>" class="img-fluid" style="height: 150px; width: 100px; object-fit: cover;">
					            	<p class="text-truncate"> <?= $name; ?> </p>
					            	<p class="item-price">
					            		<?php if($discount){ ?>
					            			<strike> <?= $price; ?> Ks </strike> 
					            			<span class="d-block"> <?= $discount; ?> Ks</span>
					            		<?php } else{ ?>
					            			<span class="d-block"> <?= $price; ?> Ks</span>
					            		<?php } ?>
					            	</p>

					                <div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
										</ul>
									</div>

									<a class="addtocartBtn text-decoration-none" data-id="<?=$id?>" data-name="<?=$name?>" data-price="<?=$price?>" data-discount="<?=$discount?>" data-photo="<?=$photo?>" data-codeno="<?=$codeno?>">Add to Cart</a>
					        	</div>
					        </div>
					    </div>

						<?php } ?>
					</div>
                </div>
            </div>
        </div>
   		<?php } ?>
	</div>

<?php 
	require 'frontendfooter.php';
?>