$(function () {

    // Initialize file pickers
    $('.file-field_type').each(function () {

        var wrapper = $(this);
        var field = wrapper.data('field');

        $('#' + field + '-modal').on('click', '[data-file]', function (e) {

            e.preventDefault();

            wrapper.find('.selected').load('/streams/file-field_type/selected?uploaded=' + $(this).data('file'), function () {
                $('#' + field + '-modal').modal('hide');
            });

            $('[name="' + field + '"]').val($(this).data('file'));
        });

        $(wrapper).on('click', '[data-dismiss="file"]', function (e) {

            e.preventDefault();

            $('[name="' + field + '"]').val('');

            wrapper.find('.selected').load('/streams/file-field_type/selected', function () {
                $('#' + field + '-modal').modal('hide');
            });
        });
    });
});
