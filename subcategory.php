<?php 
	require 'frontendheader.php';

	$sid=$_GET['id'];

	$sql="SELECT * FROM subcategories where id=:value1";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$sid);
	$statement->execute();
	$subcategory=$statement->fetch(PDO::FETCH_ASSOC);

	$sql="SELECT * FROM subcategories";
	$statement=$pdo->prepare($sql);
	$statement->execute();
	$subcategories=$statement->fetchAll();

?>

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $subcategory['name']; ?> </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		Category
		    	</li>
		    	<li class="breadcrumb-item">
		    		Category Name
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					Subcategory Name
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
					<?php foreach($subcategories as $subcategory) { 
							$subid=$subcategory['id'];
							$subname=$subcategory['name'];
					?>
					<?php if($subid==$sid) { ?>
					  	<li class="list-group-item active">
					  		<a href="subcategory.php?id=<?=$subid?>" class="text-decoration-none secondarycolor"> <?= $subname; ?> </a>
					  	</li>
					<?php }else{ ?>
						<li class="list-group-item">
					  		<a href="subcategory.php?id=<?=$subid?>" class="text-decoration-none secondarycolor"> <?= $subname; ?> </a>
					  	</li>
					<?php } ?>
				  	<?php } ?>
				</ul>
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="row">
					<?php 

						$sql="SELECT i.*,b.name as brand_name FROM items i JOIN subcategories s ON i.subcategory_id=s.id JOIN brands b ON i.brand_id=b.id where i.subcategory_id=$sid";
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
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="card pad15 mb-3">
						  	<img src="<?= $photo; ?>" class="card-img-top" alt="...">
						  	
						  	<div class="card-body text-center">
						    	<h5 class="card-title text-truncate"> <?= $name; ?> </h5>
						    	
						    	<p class="item-price">
						    		<?php if($discount) { ?>
		                        		<strike><?= $price; ?> Ks </strike> 
		                        		<span class="d-block"><?= $discount; ?> Ks</span>
		                        	<?php } else{ ?>
		                        		<span class="d-block"><?= $price; ?> Ks</span>
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

								<a class="addtocartBtn text-decoration-none"  data-id="<?=$id?>" data-name="<?=$name?>" data-price="<?=$price?>" data-discount="<?=$discount?>" data-photo="<?=$photo?>" data-codeno="<?=$codeno?>">Add to Cart</a>
						  	</div>
						</div>
					</div>

					<?php } ?>
				</div>


				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>

		
	</div>

<?php 
	require 'frontendfooter.php';
?>