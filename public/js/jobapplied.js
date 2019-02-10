var JobApplied={
    initControls: function (csrf) {

        $(".approveJobApplied").change(function(){

            var jobappliedid=$(this).data("jobappliedid");
            var isActive=$(this).data('isactive');
            var data={'jobappliedid':jobappliedid,'isActive':isActive,"_token": csrf};
            $.ajax({
                url:'/admin/jobapplied/approveordisapprovejob',
                type:'POST',
                data:data,
                context:this,
                success:function(result){
                    if(result==1){
                        $(this).attr('data-isactive',(isActive)?0:1);
                        alert('Done SucessFully');
                    }else{
                        alert('Something Went Wrong');
                        location.reload=true;
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            })
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