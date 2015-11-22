$(function () {

    // Initialize file pickers
    $('.file-field-type').each(function () {

        $(this).find('input[data-toggle="choose"]').focus(function () {
            $(this).closest('.input-group').find('[data-toggle="modal"]').trigger('click');
        });

        $(this).find('[data-dismiss="file"]').click(function (e) {

            e.preventDefault();

            $(this).closest('.input-group').find('input').val('');
        });
    });
});
