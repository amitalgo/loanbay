var Common = {
    imagePreview: function (input, imageId,mul=false) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if(mul){
                    $(input).prev('.'+imageId).attr('src',e.target.result)
                }else{
                    $('#'+imageId).attr('src', e.target.result);
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
};