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
$('.multiselect').multiselect();


