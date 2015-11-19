$(function () {

    // Initialize file selectors.
    $('table [data-file]').click(function (e) {

        e.preventDefault();

        var table = $(this).closest('table');

        $('input[name="' + table.attr('id') + '"]').val($(this).data('file'));
        $('input[name="' + table.attr('id') + '_filename"]').val($(this).data('filename'));

        $('.modal').modal('hide');
    });
});
