var Register={
    initControls: function (csrf) {

        //Validation
        $("#register").validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "firstName")
                    error.insertAfter("#firstName");

                if(element.attr("name")== "lastName")
                    error.insertAfter("#lastName")

                if(element.attr("name")== "email")
                    error.insertAfter("#email")

                if(element.attr("name")== "contactNumber")
                    error.insertAfter("#contactNumber")

                if(element.attr("name")== "pan")
                    error.insertAfter("#pan")

                if(element.attr("name")== "dob")
                    error.insertAfter("#dob")

                if(element.attr("name")== "password")
                    error.insertAfter("#password")

                if(element.attr("name")== "cpass")
                    error.insertAfter("#cpass")
            },
            rules:{
                firstName:"required",
                lastName:"required",
                email:{
                    required:true,
                    email:true
                },
                contactNumber:{
                    required:true,
                    minlength:9,
                    maxlength:10,
                    number: true
                },
                pan:"required",
                dob:"required",
                password:"required",
                cpass:{
                    equalTo : "#password"
                }
            },
            messages:{
                firstName:"Please enter the First Name",
                lastName:"Please enter the Last Name",
                email : {
                    required:"Please enter the email id",
                    email:"Not a Valid Email ID"
                },
                contactNumber:{
                    required:"Please enter Mobile Number",
                    minlength:"Not a Valid Mobile No",
                    maxlength:"Not a Valid Mobile No",
                    number:"Not a Valid Mobile No"
                },
                pan:"Enter enter Pan Details",
                dob:"Enter Select DOB",
                password:"Please Enter Password",
                cpass:{
                    equalTo:"Password Not Matching"
                }
            },
        });
    }
};