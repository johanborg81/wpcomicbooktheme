jQuery(document).ready(function($){
    var mediaUploader;
    $('#upload_button').on('click', function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: "Choose comic page",
            button: {
                text: "Choose Comic Page"
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#jaybee_comics_pages_field').val(attachment.url);
        });
        mediaUploader.open();
    })

    var btnUploader;
    $('#upload_btn').on('click', function (e) {
        e.preventDefault();
        if (btnUploader) {
            btnUploader.open();
            return;
        }
        console.log(btnUploader);
        btnUploader = wp.media.frames.file_frame = wp.media({
            title: "Choose character image",
            button: {
                text: "Choose character image"
            },
            multiple: false
        });

        btnUploader.on('select', function () {
            attachment = btnUploader.state().get('selection').first().toJSON();
            $('#jaybee_characters_image_field').val(attachment.url);
        });
        btnUploader.open();
    })
}) 
