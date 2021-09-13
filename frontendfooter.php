<!-- Footer -->
	<div class="container-fluid bg-light p-5 align-content-center align-items-center mt-5">
		
		<div class="row">
	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="icofont-fast-delivery serviceIcon maincolor"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6>Door to Door Delivery</h6>
		        		<p class="text-muted" style="font-size: 12px">On-time Delivery</p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="icofont-headphone-alt-2 serviceIcon maincolor"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6> Customer Service </h6>
		        		<p class="text-muted" style="font-size: 12px">  09-779-999-915 ၊ <br> 09-779-999-913 </p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class='bx bx-undo serviceIcon maincolor'></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6 > 100% satisfaction </h6>
		        		<p class="text-muted" style="font-size: 12px"> 3 days return </p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class="icofont-credit-card serviceIcon maincolor"></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6> Cash on Delivery </h6>
		        		<p class="text-muted" style="font-size: 12px"> Door to Door Service </p>
			    	</div>
			  	</div>
	  		</div>
	  	</div>
	</div>
	
	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	<div class="container">
		<div class="row text-center">
			<div class="col-12">
				<h1> News Letter </h1>
				<p>
					Subscribe to our newsletter and get 10% off your first purchase
				</p>

			</div>
			
			<div class="offset-2 col-8 offset-2 mt-5">
				<form>
					<div class="input-group mb-3">
						<input type="text" class="form-control form-control-lg px-5 py-3" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 15rem; border-bottom-left-radius: 15rem">
					  	
					  	<div class="input-group-append">
					    	<button class="btn btn-secondary subscribeBtn" type="button" id="button-addon2"> Subscribe </button>
					  	</div>


					</div>
				</form>
			</div>

		</div>
	</div>


	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
	

  	<footer class="py-3 mt-5">
    	<div class="container">
    		<div class="text-center pb-3">
				<a href="#myPage" title="To Top" class="text-white to_top text-decoration-none">
				    <i class="icofont-rounded-up" style="font-size: 20px"></i>
				</a>
			</div>

      		<p class="m-0 text-center text-white">Copyright &copy; <img src="logo/logo_wh_transparent.png" style="width: 30px; height: 30px"> 2019</p>
    	</div>
  	</footer>

  	<script type="text/javascript" src="frontend/js/jquery.min.js"></script>
	<!-- BOOTSTRAP JS -->
    <script type="text/javascript" src="frontend/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script type="text/javascript" src="frontend/js/custom.js"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="frontend/js/owl.carousel.js"></script>
    <!-- item count -->
    <!-- <script type="text/javascript" src="frontend/js/itemcount.js"></script> -->

	<script type="text/javascript">
    	$(document).ready(function(){

    		count();
    		getData();

    		$('.addtocartBtn').on('click',function(){
    			var id=$(this).data('id');
    			var name=$(this).data('name');
    			var price=$(this).data('price');
    			var discount=$(this).data('discount');
    			var photo=$(this).data('photo');
    			var codeno=$(this).data('codeno');

    			var item={
    				id : id,
    				name : name,
    				price : price,
    				discount : discount,
    				photo : photo,
    				codeno : codeno,
    				qty : 1
    			};

    			var shop_str=localStorage.getItem('shopules');
    			var shop_arr;

    			if(shop_str==null){
    				shop_arr=Array();
    			}else{
    				shop_arr=JSON.parse(shop_str);
    			}

    			var status=false;

    			$.each(shop_arr,function(i,v){
    				if(id==v.id){
    					v.qty++;
    					status=true;
    				}
    			})

    			if(status==false){
    				shop_arr.push(item);
    			}

    			var shopData=JSON.stringify(shop_arr);

    			localStorage.setItem('shopules',shopData);

    			count();
    			getData();
    		});
 
    		function count()
			{
				//alert('hello');
				var shop_str=localStorage.getItem('shopules');
				//console.log(shop_str);
				if (shop_str){
					var shop_arr=JSON.parse(shop_str);
					var count=0;
					$.each(shop_arr,function(i,v){
						count+=v.qty;
						if(v.discount){
							var cart_amount=cart_amount+parseInt(v.discount);
						}else{
							var cart_amount=cart_amount+parseInt(v.price);
						}
					});
					$('.count').html(count);
				}else{
					$('.count').html(0);
				}
			};

    		function getData(){
    			var shop_str=localStorage.getItem('shopules');
    			if(shop_str){
    				$('.shoppingcart_div').show();
    				$('.noneshoppingcart_div').hide();

    				var shop_arr=JSON.parse(shop_str);
    				if (shop_arr.length>0){
    				var html='';
    				var total=0;
    				$.each(shop_arr,function(i,v){
    					if(v.discount){
    						var sub_total=v.qty*v.discount;
    					}else{
    						var sub_total=v.qty*v.price;
    					}
    					
    					if(v.discount){
    					var rows=`<tr>
									<td>
										<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%" data-key="${i}"> 
											<i class="icofont-close-line"></i> 
										</button> 
									</td>
									<td> 
										<img src="${v.photo}" class="cartImg">						
									</td>
									<td> 
										<p> ${v.name} </p>
										<p> ${v.codeno} </p>
									</td>
									<td>
										<button class="btn btn-outline-secondary plus_btn" data-key="${i}"> 
											<i class="icofont-plus"></i> 
										</button>
									</td>
									<td>
										<p> ${v.qty} </p>
									</td>
									<td>
										<button class="btn btn-outline-secondary minus_btn" data-key="${i}"> 
											<i class="icofont-minus"></i>
										</button>
									</td>
									<td>
										<p class="text-danger"> 
											${v.discount} Ks
										</p>
										<p class="font-weight-lighter"> 
											<del> ${v.price} Ks </del> 
										</p>
									</td>
									<td>
										${sub_total} Ks
									</td>
								</tr>`;
						}else{
							var rows=`<tr>
									<td>
										<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%" data-key="${i}"> 
											<i class="icofont-close-line"></i> 
										</button> 
									</td>
									<td> 
										<img src="${v.photo}" class="cartImg">						
									</td>
									<td> 
										<p> ${v.name} </p>
										<p> ${v.codeno} </p>
									</td>
									<td>
										<button class="btn btn-outline-secondary plus_btn" data-key="${i}"> 
											<i class="icofont-plus"></i> 
										</button>
									</td>
									<td>
										<p> ${v.qty} </p>
									</td>
									<td>
										<button class="btn btn-outline-secondary minus_btn" data-key="${i}"> 
											<i class="icofont-minus"></i>
										</button>
									</td>
									<td>
										<p class="text-danger"> 
											${v.price} Ks
										</p>
									</td>
									<td>
										${sub_total} Ks
									</td>
								</tr>`;
						}
						html+=rows;
						total+=sub_total;
    				})

    				$('#shoppingcart_table').html(html);
    				$('#cart_total').html('Total : '+ total +' Ks');
    				$('.cart_amount').html(total+' Ks');
    			}else{
    				$('.shoppingcart_div').hide();
    				$('.noneshoppingcart_div').show();
    			}
    			}else{
    				$('.shoppingcart_div').hide();
    				$('.noneshoppingcart_div').show();
    			}
    		};


    		$('#shoppingcart_table').on('click','.plus_btn',function(){
    			var key=$(this).data('key');
    			var shop_str=localStorage.getItem('shopules');
    			if(shop_str){
    				var shop_arr=JSON.parse(shop_str);

    				$.each(shop_arr,function(i,v){
    					if(key==i){
    						v.qty++;
    					}

    					var shopData=JSON.stringify(shop_arr);
    					localStorage.setItem('shopules',shopData);
    					getData();
    					count();
    				})
    			}
    		})

    		$('#shoppingcart_table').on('click','.minus_btn',function(){
    			var key=$(this).data('key');
    			var shop_str=localStorage.getItem('shopules');
    			if(shop_str){
    				var shop_arr=JSON.parse(shop_str);

    				$.each(shop_arr,function(i,v){
    					if(key==i){
    						v.qty--;
    						if(v.qty==0){
    							shop_arr.splice(key,1);
    						}
    					}

    					var shopData=JSON.stringify(shop_arr);
    					localStorage.setItem('shopules',shopData);
    					getData();
    					count();
    				})
    			}
    		})
 
    		$('#shoppingcart_table').on('click','.remove',function(){
    			var id=$(this).data('key');

    			let ans=confirm('Are you sure to remove?');
    			if(ans){
    				var shop_str=localStorage.getItem('shopules');
	    			if(shop_str){
	    				var shop_arr=JSON.parse(shop_str);
	    				shop_arr.splice(id,1);
	    				var shopData=JSON.stringify(shop_arr);
	    				localStorage.setItem('shopules',shopData);
	    				getData();
	    				count();
	    			}
    			}
    		})

    		$('.checkoutbtn').on('click',function(){
    			var notes = $('#notes').val();
    			var shop_str = localStorage.getItem('shopules');
    			var shop_arr = JSON.parse(shop_str);

    			var total = 0;

    			$.each(shop_arr,function(i,v) {
    				var unitprice=v.price;
    				var discount=v.discount;
    				var qty=v.qty;

    				if(discount){
    					var price=discount;
    				}else{
    					var price=unitprice;
    				}

    				var subtotal=price*qty;
    				total+=subtotal;
    			});

    			$.post('storeorder.php',{
    				cart: shop_arr,
    				note: notes,
    				total: total
    			},function(response){
    				localStorage.clear();
    				location.href="ordersuccess.php";
    			});
    		});

    	})
    </script>
</body>
</html>