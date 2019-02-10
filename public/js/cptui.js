var CPTUI={
    initControls: function (csrf) {

        //Validation
        $("#cptui").validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "title")
                    error.insertAfter("#title");
                else if(element.attr("name") == "description")
                    error.insertAfter("#description")
            },
            rules:{
                title:"required",
                description:"required",
            },
            messages:{
                title:"Please enter the Title",
                description:"Please enter the Description",
            },
        });

        $(".summernote").summernote();

        $(".alertify").delay(3000).fadeOut(1000);

    }
};