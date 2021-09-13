<?php 

	require 'frontendheader.php';
	require 'connection.php';

	$item_id=$_GET['id'];

	$sql="SELECT i.*,b.name as brand_name,b.id as brand_id FROM items i JOIN brands b ON i.brand_id=b.id where i.id=:value1";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$item_id);
	$statement->execute();
	$item=$statement->fetch(PDO::FETCH_ASSOC);

	$sql="SELECT ri.*,rb.name as rbrand_name FROM items ri JOIN brands rb ON ri.brand_id=rb.id where ri.brand_id=:value1 OR ri.subcategory_id=:value2 ORDER BY rand()";
	$statement=$pdo->prepare($sql);
	$statement->bindParam(':value1',$item['brand_id']);
	$statement->bindParam(':value2',$item['subcategory_id']);
	$statement->execute();
	$related_items=$statement->fetchAll();

?>

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $item['codeno']; ?></h1>
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
				<img src="<?= $item['photo']; ?>" class="img-fluid">
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<h4> <?= $item['name']; ?> </h4>

				<div class="star-rating">
					<ul class="list-inline">
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
					</ul>
				</div>

				<p>
					<?= $item['description']; ?>
				</p>

				<p> 
					<span class="text-uppercase "> Current Price : </span>
					<?php if($item['discount']){ ?>
						<span class="maincolor ml-3 font-weight-bolder"> <?= $item['discount']; ?> Ks </span>
					<?php }else{ ?>
						<span class="maincolor ml-3 font-weight-bolder"> <?= $item['price']; ?> Ks </span>
					<?php } ?>
				</p>

				<p> 
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3"> 
						<a href="" class="text-decoration-none text-muted"> 
							<?= $item['brand_name']; ?> 
						</a> 
					</span>
				</p>


				<a class="addtocartBtn text-decoration-none" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>" data-photo="<?=$item['photo']?>" data-codeno="<?=$item['codeno']?>">
					<i class="icofont-shopping-cart mr-2"></i> Add to Cart
				</a>
				
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-12">
				<h3> Related Item </h3>
				<hr>
			</div>

			<?php 
				foreach($related_items as $related_item){
			?>
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
					<a href="item_detail.php?id=<?=$related_item['id']?>">
						<img src="<?= $related_item['photo']; ?>" class="img-fluid" style="height: 200px; object-fit: cover;">
					</a>
				</div>
			<?php } ?>
		</div>

		
	</div>



<?php 
	require 'frontendfooter.php';
?>