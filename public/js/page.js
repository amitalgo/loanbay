var Page={
    initControls: function () {
        $('.summernote').summernote({
            height: 150,
        });
        $('#image').on('change', function () {
            Common.imagePreview(this, 'featured-image-preview');
        });
    }
};