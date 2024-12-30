function calculatetotal(clicked_id)
{
	var price = document.getElementById ('price'+clicked_id).value;
	var quantity = document.getElementById (clicked_id).value;
	var initial_row_total=document.getElementById ('totalprice'+clicked_id).value;
	var initial_total=document.getElementById('total_cart_price').value-initial_row_total;
	var totalprice = price * quantity;
	var cart_total = initial_total+totalprice;
	document.getElementById ('totalprice'+clicked_id).value=totalprice;
	document.getElementById('total_cart_price').value = cart_total;
}

