jQuery(document).ready(function ($) {


    $(document).on('click', '.sttcp-icon', function (e) {
        e.preventDefault();

        var sttcp_icon = wp.media({
            title: 'Select Scroll to Top Icon',
            multiple: false, // Set to true for selecting multiple images
            library: { type: 'image' }, // Restrict to image media type
            button: { text: 'Select Icon' }
        });

        // When an image is selected, handle the selection
        sttcp_icon.on('select', function () {
            var selection = sttcp_icon.state().get('selection');

            var attachment = selection.first().toJSON(); // Get the first (and only) selected imag
            $('.sttcp-icon-input').val(attachment.url);
            $('.sttcp-icon-img').attr('src',attachment.url);

        });

        // Open the media library
        sttcp_icon.open();
    });
});