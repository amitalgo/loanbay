var JobPosted={
    initControls: function (csrf) {

        $(".approveJobPosted").change(function(){

            var jobId=$(this).data("jobid");
            var isActive=$(this).data('isactive');
            var data={'jobId':jobId,'isActive':isActive,"_token": csrf};
            $.ajax({
                url:'/admin/jobposted/approveordisapprovejob',
                type:'POST',
                data:data,
                success:function(result){
                    if(result==1){
                        alert('Done SucessFully');
                    }else{
                        alert('Something Went Wrong');
                        location.reload=true;
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    // console.log(data);
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