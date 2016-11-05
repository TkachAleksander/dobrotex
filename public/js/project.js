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




/* Cart */
$(document).ready(function() {
	$('.buy').on('click', function(){
		$id_product = $(this).data("id");

		setBasket($id_product);
	});
});

function setBasket(id_product){

    // var cookies = $.cookie('basket');

	// if (cookies == null){
			$.ajax({
				type: "POST",
				url: "/setCookie",
				data: {id_product:id_product},
				dataType: "JSON",
				beforeSend: function(xhr){ 
					xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')); 
				},
				success: function(id_cookie){
					// alert('ok');
					$.cookie('basket',JSON.stringify(id_cookie),{ expires: 60, path:'/'});
				}
			});
	//}
}

/* Multiselect */
if ($('.multiselect').length > 0){
	$('.multiselect').multiselect();
}

/* Cookies */