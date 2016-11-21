/* Подсветка активных вкладок */
if (window.location.href == 'http://dobrotex/'){ $('#cat2').addClass('active'); }
if (window.location.href == 'http://dobrotex/blankets' || $('#category').val() == 'Одеяло'){ $('#cat1').addClass('active'); }
if (window.location.href == 'http://dobrotex/pillow' || $('#category').val() == 'Подушка'){ $('#cat0').addClass('active'); }


/* Подтверждение удаления */
$('.confirmDelete').on('click', function() {
    if (confirm("Вы подтверждаете удаление?")) {
        return true; 
    } else {
        return false;
    }
});


/* Multiselect */
if ($('.multiselect').length > 0){
	$('.multiselect').multiselect();
}


/* Cart */
// Вывод суммы корзины при загрузке страницы 
showCart();
// Клик по корзине
$('.cart').on('click', function(){
	showCart();
});

// Клик по кнопке купить
$(document).ready(function() {

	$('.buy').on('click', function(){
		$id_product = $(this).data("id");
		setCart($id_product);
		showCart();
	});

});

function setCart(id_product){

    var id_cookie = $.cookie('cart');
	$.ajax({
		type: "POST",
		url: "/setCookie",
		data: {id_product:id_product, id_cookie:id_cookie},
		dataType: "JSON",
		beforeSend: function(xhr){ 
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(array){
			if (array.addCookie === true){
				$.cookie('cart',JSON.stringify(array.id_cookie),{ expires: 60, path:'/'});
				showCart();
			}
		}
	});

}

function showCart(){

	$('.tr-cart').remove();
	var id_cookie = $.cookie('cart');
	$.ajax({
		type: "POST",
		url: "/showCart",
		data: {id_cookie:id_cookie},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(arrayProducts){
			var sum = 0;
			arrayProducts.forEach(function(product, key, arrayProducts){
			    arrayProducts[key].price = (arrayProducts[key].discount == 0) ? arrayProducts[key].price : parseFloat($price = arrayProducts[key].price - arrayProducts[key].discount_price).toFixed(2);

				$('#th-cart').after('<tr style="background-color: #f5f5f5;" id="tr'+arrayProducts[key].id+'" class="tr-cart">'+
										'<td class="name-product-cart">'+ arrayProducts[key].category +' '+ arrayProducts[key].name +'</td>'+
										'<td class="text-center">'+
											'<img class="img-in-cart img-responsive" src="../img/products/'+ arrayProducts[key].name_img +'">'+
										'</td>'+
										'<td class="text-center">'+ arrayProducts[key].id +'</td>'+
										'<td class="text-center">'+ arrayProducts[key].size +' см</td>'+
										'<td class="text-center">'+
										'<img class="img-responsive minus-cart" onclick="cartMinus('+arrayProducts[key].id+')" src="/img/cart/remove.png">'+
										'<input readonly class="count-product text-center input'+arrayProducts[key].id+'" value="'+arrayProducts[key].quantity+'">'+
										'<img class="img-responsive plus-cart" onclick="cartPlus('+arrayProducts[key].id+')" src="/img/cart/add.png">'+
										'<img class="img-responsive delete-cart" onclick="cartDelete('+arrayProducts[key].id+')" src="/img/cart/delete.png"></td>'+
										'<td class="text-center">'+ arrayProducts[key].price +'</td>'+
									'</tr>'
									);
			});
			updateSum(id_cookie)

		}
	});

}

function updateSum(id_cookie){
	$.ajax({
		type:"POST",
		url:"/updateSum",
		data: {id_cookie:id_cookie},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
		},
		success: function(arrayProducts){
			var sum = 0;
			arrayProducts.forEach(function(product, key, arrayProducts){
				arrayProducts[key].price = (arrayProducts[key].discount == 0) ? arrayProducts[key].price : parseFloat($price = arrayProducts[key].price - arrayProducts[key].discount_price).toFixed(2);
				sum += parseFloat(arrayProducts[key].price) * parseFloat(arrayProducts[key].quantity);
			console.log(sum);});
			$('.summa-cart').text(sum.toFixed(2));
		}
	});
}


function cartMinus(id_product){
	var id_cookie = $.cookie('cart');

	$.ajax({
		type: "POST",
		url: "/cartMinus",
		data: {id_product:id_product, id_cookie:id_cookie},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(quantity){
			$('.input'+id_product).val(quantity);
			updateSum(id_cookie);
		}
	});
}

function cartPlus(id_product){
	var id_cookie = $.cookie('cart');

	$.ajax({
		type: "POST",
		url: "/cartPlus",
		data: {id_product:id_product, id_cookie:id_cookie},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(quantity){
			$('.input'+id_product).val(quantity);
			updateSum(id_cookie);
		}
	});
}

function cartDelete(id_product){
	var id_cookie = $.cookie('cart');

	$.ajax({
		type: "POST",
		url: "/cartDelete",
		data: {id_product:id_product, id_cookie:id_cookie},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(ok){
			 $('#tr'+id_product).remove(); updateSum(id_cookie); 		
		}
	});
}

