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
			});
			$('.summa-cart').text(sum.toFixed(2));
			if(sum == 0)
				$('.btn-checkout').css('display','none');
			else 
				$('.btn-checkout').css('display','');
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


// переключение Delivery
$('#input-np').on('click',function(){
	$delivery = $('#div-delivery');
	$delivery.empty().append('<input type="text" name="address" class="form-control" placeholder="Город получателя, номер отделения" required>'+
		                     '<p> Стоимость доставки: 2% от суммы заказа </p>');
});

$('#input-issuing-point').on('click',function(){
	$delivery = $('#div-delivery');
	$delivery.empty().append('<input type="text" name="address" class="form-control" placeholder="Город Сумы, ул.Харьковская, д.54" required disabled>');
});


// Проверка ввода значений
$('input#f_name, input#l_name, input#s_name, input#phone').unbind().blur( function(){
            
            var id = $(this).attr('id');
            var val = $(this).val();
            var textError = '&bull; значение должно составлять не менее двух символов<br> &bull; используйте только русские буквы';
           
           switch(id)
           {
                case 'f_name':
                    var rv_name = /^[а-яА-Яб,є,ї,і]+$/; 

                    if(val.length > 2 && val != '' && rv_name.test(val))
                    {
                       $(this).addClass('not_error');
                       $(this).next('.error-box').text('Принято')
                                                 .css('color','green')
                                                 .animate({'paddingLeft':'10px'},400)
                                                 .animate({'paddingLeft':'5px'},400);
                    } else {
                       $(this).removeClass('not_error').addClass('error');
                       $(this).next('.error-box').html(textError)
                                                  .css('color','red')
                                                  .animate({'paddingLeft':'10px'},400)
                                                  .animate({'paddingLeft':'5px'},400);
                    }
                break;
                case 'l_name':
                    var rv_name = /^[а-яА-Яб,є,ї,і]+$/; 

                    if(val.length > 2 && val != '' && rv_name.test(val))
                    {
                       $(this).addClass('not_error');
                       $(this).next('.error-box').text('Принято')
                                                 .css('color','green')
                                                 .animate({'paddingLeft':'10px'},400)
                                                 .animate({'paddingLeft':'5px'},400);
                    } else {
                       $(this).removeClass('not_error').addClass('error');
                       $(this).next('.error-box').html(textError)
                                                  .css('color','red')
                                                  .animate({'paddingLeft':'10px'},400)
                                                  .animate({'paddingLeft':'5px'},400);

                    }
                break;
                case 's_name':
                    var rv_name = /^[а-яА-Яб,є,ї,і]+$/; 

                    if(val.length > 2 && val != '' && rv_name.test(val))
                    {
                       $(this).addClass('not_error');
                       $(this).next('.error-box').text('Принято')
                                                 .css('color','green')
                                                 .animate({'paddingLeft':'10px'},400)
                                                 .animate({'paddingLeft':'5px'},400);
                    } else {
                       $(this).removeClass('not_error').addClass('error');
                       $(this).next('.error-box').html(textError)
                                                  .css('color','red')
                                                  .animate({'paddingLeft':'10px'},400)
                                                  .animate({'paddingLeft':'5px'},400);
                    }
                break;
                case 'phone':
                    var rv_name = /^[0-9]{10}$/; 

                    if(val.length > 2 && val != '' && rv_name.test(val))
                    {
                       $(this).addClass('not_error');
                       $(this).next('.error-box').text('Принято')
                                                 .css('color','green')
                                                 .animate({'paddingLeft':'10px'},400)
                                                 .animate({'paddingLeft':'5px'},400);
                    } else {
                       $(this).removeClass('not_error').addClass('error');
                       $(this).next('.error-box').html('&bull; поле "Телефон" обязательно для заполнения')
                                                  .css('color','red')
                                                  .animate({'paddingLeft':'10px'},400)
                                                  .animate({'paddingLeft':'5px'},400);
                    }
                break;
           }         

});

// three
function tree_toggle(event) {
    event = event || window.event
    var clickedElem = event.target || event.srcElement

    if (!hasClass(clickedElem, 'Expand')) {
        return // клик не там
    }

    // Node, на который кликнули
    var node = clickedElem.parentNode
    if (hasClass(node, 'ExpandLeaf')) {
        return // клик на листе
    }

    // определить новый класс для узла
    var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
    // заменить текущий класс на newClass
    // регексп находит отдельно стоящий open|close и меняет на newClass
    var re =  /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
    node.className = node.className.replace(re, '$1'+newClass+'$3')
}


function hasClass(elem, className) {
    return new RegExp("(^|\\s)"+className+"(\\s|$)").test(elem.className)
}


$('.alert-close').on('click', function(){
	$.cookie('cartInfo','',{ expires: -1, path:'/'});
});

$('.removeRootGroup').on('click', function(){

	var id_root = $(this).data('idRoot');
	$.ajax({
		type: "POST",
		url: "/removeRootGroup",
		data: {id_root:id_root},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(){
			location.reload();	
		}
	});
});


$('.removeChildGroup').on('click', function(){

	var id_root = $(this).data('idRoot');
	var id_child = $(this).data('idChild');
	$.ajax({
		type: "POST",
		url: "/removeChildGroup",
		data: {id_root:id_root, id_child:id_child},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(){
			location.reload();	
		}
	});
});

$('.btn-more-order').on('click', function(){

	var id_order = $(this).data('idOrder');
	$.ajax({
		type: "POST",
		url: "/showMoreOrder",
		data: {id_order:id_order},
		dataType: "JSON",
		beforeSend: function(xhr){
			xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
		},
		success: function(moreOrder){

			var sum = 0;
			$moreOrder = $('#tr-moreOrder');
			$('.new').empty();
			moreOrder.forEach( function(value, key, moreOrder){
				moreOrder[key].price = (moreOrder[key].discount == 0) ? moreOrder[key].price : parseFloat($price = moreOrder[key].price - moreOrder[key].discount_price).toFixed(2);
				sum += parseFloat(moreOrder[key].price) * parseFloat(moreOrder[key].quantity); 
				$moreOrder.after('<tr class="new">'+
					             '<td>'+ value.id_products +'</td>'+
					             '<td><a href="http://dobrotex/more/'+value.id_products+'" target="_blank">'+ value.category+' '+value.name_product+'</a></td>'+
					             '<td>'+ value.set_of_characteristics +'</td>'+
					             '<td class="text-center">'+ value.quantity +'</td>'+
					             '<td>'+ moreOrder[key].price +'</td>'+
					             '</tr>');
			});
			$('#sum-more-order').html(sum.toFixed(2));

		}
	});
});



/* Cart */
// Вывод суммы корзины при загрузке страницы 
updateSum($.cookie('cart'));