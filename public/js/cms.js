var CMS={
    initControls: function () {
        $('#feature-img').on('change', function(){
            $("#image-preview").css("display","block");
            Common.imagePreview(this, 'image-preview');
        });


        $('#content').summernote({
            placeholder: 'Hello bootstrap 4',
            tabsize: 2,
            height: 100
        });
    }
};