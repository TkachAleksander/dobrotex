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
$(document).ready(function() {

	$('.buy').on('click', function(){
		$id_product = $(this).data("id");
		setBasket($id_product);
	});

	// $('.buy').on('click', function(){ 
	// 	$id_product = $(this).data("id");
	// 	$category = $(this).data("category");
	// 	$name = $(this).data("name");
	// 	$price = $(this).data("price");
	// 	addInBasket($id_product,$category,$name,$price);
	// });
});



// function addInBasket(id_product,category,name,price){
// 		var cookies = $.cookie('basket');

// 		// если cookie нет (корзина пуста) оправляем запрос на
// 		// добавление товара и уникального id для cookie
// 		if (cookies == 0){

// 			$.ajax({
// 				type: "POST",
// 				url: "/addNewIdInBasket",
// 				data: {id_product:id_product,
// 					   category:category,
// 					   name:name,
// 					   price:price},
// 				dataType: "json",
// 				beforeSend: function(xhr){ 
// 		        	xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
// 		        },	
// 				success: function(id_cookie){
// 					$.cookie('basket',JSON.stringify(id_cookie),{ expires: 60, path:'/'});
// 				}
// 			});

// 		// если cookie существует (в корзине что то есть) отправляем
// 		// запрос для добавления нового товара (если такого нет в корзине)
// 		// или для увеличения значения на +1 (если такой товар уже имеется)
// 		} else {

// 			var id_cookie = JSON.parse($.cookie('basket'));

// 			$.ajax({
// 				type: "POST",
// 				url: "/addToIdInBasket",
// 				data: {id_product:id_product,
// 					   category:category,
// 					   name:name,
// 					   price:price,
// 					   id_cookie:id_cookie},
// 				dataType: "json",
// 				beforeSend: function(xhr){ 
// 		        	xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
// 		        },	
// 				success: function(data){
// 					alert('ok');
// 				}
// 			});

// 		}

// 	}

// 	function refillBasket(){
// 		$('.td-basket').remove();
// 		$('#summa-basket').html(0);

// 		var id_cookie = $.cookie('basket');

// 		if(id_cookie != 0){
// 			$.ajax({
// 				type: "POST",
// 				url: "/showBasket",
// 				data: {id_cookie:id_cookie},
// 				dataType: "json",
// 		        beforeSend: function(xhr){ 
// 		        	xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
// 		        },				
// 				success: function(products){
// console.log(products);
// 					for ( var i=0; i < products.length; i++){
// 						$('#th-basket').after('<tr class="active td-basket td'+products[i].id+'">'+
// 						'<td class="name-tovar-basket hide-mobile">'+products[i].category+' '+products[i].name+
// 						// '<td class="text-center">'+'<img class="img-responsive img-produkt-in-basket" src="/img/products/'+products[i].dir+'/'+products[i].photo +'">'+
// 						'<td class="text-center basket-code hide-mobile" data-basCode="'+products[i].id_products+'">'+products[i].id_products+
// 						'<td class="text-center">'+
// 						'<img class="img-responsive minus" onclick="basketMinus('+products[i].id_products+')" src="/img/basket/remove.png">'+
// 						'<input readonly class="count-product text-center input'+products[i].id_products+'" value="'+products[i].quantity+'">'+
// 						'<img class="img-responsive plus" onclick="basketPlus('+products[i].id_products+')" src="/img/basket/add.png">'+
// 						'<img class="img-responsive delete" onclick="basketDelete('+products[i].id_products+')" src="/img/basket/delete.png">'+
// 						'<td class="sum text-center">'+products[i].price);
// 					var sum = $('#summa-basket').text();
// 					sum = parseFloat(sum) + (parseFloat(products[i].price) * parseFloat(products[i].quantity));
// 					$('#summa-basket').text(parseFloat(sum).toFixed(2));
// 					}
// 				}

// 			});
// 	}
// }







$('.cart').on('click', function(){
	showCart();
});

function setBasket(id_product){

    var id_cookie = $.cookie('basket');
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
				$.cookie('basket',JSON.stringify(array.id_cookie),{ expires: 60, path:'/'});
			}
		}
	});

}

function showCart(){

	var id_cookie = $.cookie('basket');
	$.ajax({
		type: "POST",
		url: "/showCart",
		data: {id_cookie:id_cookie},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(arrayProducts){
			console.log(arrayProducts);
			arrayProducts.forEach(function(product, key, arrayProducts){
				$('#th-cart').after('<tr style="background-color: #f5f5f5;" class="tr-cart">'+
										'<td>'+ arrayProducts[key].category +' '+ arrayProducts[key].name +'</td>'+
										'<td class="text-center">'+
											'<img class="img-in-cart img-responsive" src="img/products/'+ arrayProducts[key].name_img +'">'+
										'</td>'+
										'<td class="text-center">'+ arrayProducts[key].id +'</td>'+
										'<td class="text-center">'+ arrayProducts[key].size +' см</td>'+
										'<td class="text-center">'+
										'<img class="img-responsive minus" onclick="basketMinus('+arrayProducts[key].id+')" src="/img/cart/remove.png">'+
										'<input readonly class="count-product text-center input'+arrayProducts[key].id+'" value="'+arrayProducts[key].quantity+'">'+
										'<img class="img-responsive plus" onclick="basketPlus('+arrayProducts[key].id+')" src="/img/cart/add.png">'+
										'<img class="img-responsive delete" onclick="basketDelete('+arrayProducts[key].id+')" src="/img/cart/delete.png"></td>'+
										'<td class="text-center">'+ arrayProducts[key].cost_price +'</td>'+
									'</tr>'
									);
			});
		}
	});

}