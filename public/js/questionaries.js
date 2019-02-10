var Questionaries={

    initControls: function (csrf) {

        $(document).ready(function(){
            $("#type").on('change',function(){
                console.log($(this).val());
                if($(this).val()=='dropdown'){
                    var options = '<div class="form-group row"><label class="col-lg-2 col-form-label" for="status">Options</label><div class="col-lg-4"><textarea name="options" cols="35" rows="4"></textarea></div></div>';
                    $(".appendType").html(options).hide().slideDown(300);
                }else{
                    $(".appendType").html('');
                }
            });

            $(".questionaries").dataTable();
        });

        $(".alertify").delay(3000).fadeOut(1000);
    }
};