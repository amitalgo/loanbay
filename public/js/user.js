var User={
    initControls: function () {
        $('#image').on('change', function(){
            Common.imagePreview(this, 'image-preview');
        });
    }
};