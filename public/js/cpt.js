var CPT={
    initControls: function (csrf) {

        //Validation
        $("#cpt").validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "title")
                    error.insertAfter("#title");
            },
            rules:{
                title:"required"
            },
            messages:{
                title:"Please enter the Title"
            },
        });

        $(".addCptAttrb").on('click',function(){
            var attr = '';

            var count = $(".attrb").length;

            attr +=  '<div class="attrb"> <div class="col-md-6"> <div class="form-group"> <label for="label">Label</label> <input type="text" class="form-control" required name="attrb[' + count + '][label]" placeholder="ex. StartDate" value=""> </div></div><div class="col-md-6"> <div class="form-group"> <label for="label">Data Type</label> <select class="form-control" name="attrb['+ count + '][datatype]"> <option value="">Choose DataType</option> <option value="text">Text</option> <option value="datetime">Date Time</option> <option value="textarea">Text Area</option> </select> </select> </div></div>';

            $(".attributes").append(attr);

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