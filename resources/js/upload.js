$(function () {

    // Initialize uploaders.
    $('#upload').each(function () {

        var wrapper = $(this);

        var myDropzone = new Dropzone('.dropzone',
            {
                paramName: 'upload',
                url: '/streams/files-field_type/upload',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                sending: function (file, xhr, formData) {
                    formData.append('folder', wrapper.data('folder'));
                },

                autoQueue: true,
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                maxFilesize: wrapper.find('.files').data('max'),
                dictDefaultMessage: 'Click or drop files here to upload.'
            }
        );

        // While file is in transit...
        myDropzone.on('sending', function (file) {

            // Update the progress bar when sending.
            wrapper.find('[data-progress="total"]').css('visibility', 'visible');

            // If a preview is not possible - use no-preview.
            var images = ['jpeg', 'jpg', 'png', 'bmp', 'gif'];
            var regex = /(?:\.([^.]+))?$/;
            var extension = regex.exec(file.name)[1];

            extension = extension.toLowerCase();

            // Reveal file upload progress.
            //file.previewElement.querySelector('[data-progress="file"]').setAttribute('style', 'visibility: visible;');
        });

        // When file successfully uploads.
        myDropzone.on('success', function (file) {

            var response = JSON.parse(file.xhr.response);

            var uploaded = wrapper.data('uploaded');

            if (uploaded == undefined) {
                uploaded = [];
            } else {
                uploaded = uploaded.split(',');
            }

            uploaded.push(response.id);

            wrapper.data('uploaded', uploaded.join(','));

            $('#table').load('/streams/file-field_type/test?uploaded=' + wrapper.data('uploaded'));
        });

        // Hide the progress bar when done.
        myDropzone.on('queuecomplete', function (progress) {
            wrapper.find('[data-progress="total"]').css('visibility', 'hidden');
        });
    });
});
