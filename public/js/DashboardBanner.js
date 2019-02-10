var DashboardBanner={
    initControls: function () {
        $('#image').on('change', function(){
            Common.imagePreview(this, 'image-preview');
        });

        $('.isBtn').on('change',function(){
            var val=$(this).val();
            if(val==1){
                $(".truebtn").css("display","block");
            }else{
                $(".truebtn").css("display","none");
                $("#btn-name").val(null);
                $("#btn-link").val(null);
            }
        });
    }
};