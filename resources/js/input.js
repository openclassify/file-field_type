$(function () {

    // Initialize colorpickers
    $('.file-field-type [data-dismiss="fileinput"]').each(function () {

        // Remove ID on click.
        $(this).on('click', function () {
            $(this).closest('.fileinput').find('input[type="hidden"]').val('');
        });
    });
});
