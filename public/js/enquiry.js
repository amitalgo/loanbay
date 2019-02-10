var Enquiry={
    initControls: function (csrf) {

        $("body").on("click",".viewEnquiry",function(){
            var data={"enquiryId":$(this).data('enquiryid'),"_token": csrf};

            $.ajax({
                url:"/admin/enquiries/getEnquiryById",
                type:"post",
                data:data,
                context:this,
                dataType:"json",
                success:function(xyz){
                    $(".name").html(xyz.name);
                    $(".sub").html(xyz.sub);
                    $(".date").html(xyz.date.date);
                    $(".contact").html(xyz.contact);
                    $(".email").html(xyz.email);
                    $(".msg").html(xyz.msg);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
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