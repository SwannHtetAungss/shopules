/*
$(document).ready(function(){
	alert('hi');
	count();
	function count()
{
	alert('hello');
	var shop_str=localStorage.getItem('shopules');
	console.log(shop_str);
	if (shop_str){
		var shop_arr=JSON.parse(shop_str);
		var count=0;
		$.each(shop_arr,function(i,v){
			count+=v.qty;
			if(v.discount){
				cart_amount=cart_amount+parseInt(v.discount);
			}else{
				cart_amount=cart_amount+parseInt(v.price);
			}
		});
		$('.count').html(count);
	}
}

})
*/
