var Contact={
    initControls: function (csrf) {

        //Validation
        $("#contact").validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "fullname")
                    error.insertAfter("#fullname");

                if(element.attr("name")== "email")
                    error.insertAfter("#email")

                if(element.attr("name")== "contactNumber")
                    error.insertAfter("#contactNumber")

                if(element.attr("name")== "subject")
                    error.insertAfter("#subject")

                if(element.attr("name")== "message")
                    error.insertAfter("#message")
            },
            rules:{
                fullname:"required",
                email:{
                    required:true,
                    email:true
                },
                subject:"required",
                contactNumber:{
                    number: true
                },
                message:"required",
            },
            messages:{
                fullname:"Please enter the First Name",
                email : {
                    required:"Please enter the email id",
                    email:"Not a Valid Email ID"
                },
                contactNumber:{
                    number:"Not a Valid Mobile No"
                },
                subject:"Please Enter Subject",
                message:"Please Enter Password"
            },
        });
    }
};