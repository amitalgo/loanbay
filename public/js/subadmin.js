var SubAdmin={
    initControls: function () {
        $('#image').on('change', function(){
            Common.imagePreview(this, 'image-preview');
        });

        $(".alertify").delay(3000).fadeOut(1000);
        new Vue({
            el: '#example',
            data: {
                slides: 5
            },
            components: {
                'carousel-3d': Carousel3d.Carousel3d,
                'slide': Carousel3d.Slide
            }
        });
    }
};