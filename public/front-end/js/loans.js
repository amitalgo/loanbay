var Loans={
    initControls: function (csrf,url) {
        $(".getDetails").on("click",function(){
            var id = $(this).data('id');
            var type = $(this).data('type');
            var data={"id":id,"type":type,"_token": csrf};

            $.ajax({
                url:url+'/fetchLoanDetailsByCptuiId',
                type:"post",
                data:data,
                dataType:"json",
                context:this,
                success:function(xyz){
                    if(xyz==1){
                        if(type=='requestcall'){
                            alert('Thank you we will be calling you shortly');
                        }else if(type=='requestemail'){
                            alert('Details has been mailed to your email Id');
                        }
                    }else{
                        alert('Something Went Wrong');
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    }
};