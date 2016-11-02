/* Подсветка активных вкладок */
if (window.location.href == 'http://dobrotex/'){ $('#cat2').addClass('active'); }
if (window.location.href == 'http://dobrotex/blankets'){ $('#cat1').addClass('active'); }
if (window.location.href == 'http://dobrotex/pillow' || $('.Philosopher h3').val() == 'Подушка'){ $('#cat0').addClass('active'); }

/* Подтверждение удаления */
$('.confirmDelete').on('click', function() {
    if (confirm("Вы подтверждаете удаление?")) {
        return true;
    } else {
        return false;
    }
});

/* Multiselect */
$('#categories').multiselect();
$('#sets').multiselect();
$('#discount').multiselect();


