var UserRoleDetails={
    initControls: function () {
        $('.image').on('change', function(){
            Common.imagePreview(this, 'image-preview',true);
        });

        $("body").on('click','.add-image-box',function(){
            var div  ="<div class='col-lg-4 top-pdn'><img src='' alt='image' style='height:100px;weight:100px;' class='image-preview'><input type='file' class='form-control' name='image[]'><textarea class='form-control' style='height: 20%;' rows='5' cols='5' name='short-desc[]' placeholder='Enter Short Description'></textarea>";
            div += "</div>";
            $('.box-append').append(div);
        });

        $('.image').on('change', function(){
            $(this).next('.imageUrl').val('');
        });
    }
};