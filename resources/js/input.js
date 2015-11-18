$(function () {

    // Initialize file pickers
    $('.file-field-type').each(function () {

        $(this).find('input[data-toggle="choose"]').focus(function () {
            $(this).closest('.input-group').find('[data-toggle="modal"]').trigger('click');
        });
    });
});
