var Words={
    initControls: function () {

        $("body").on('click','.add-meaning-box',function(){
            var div  ="<div class='col-lg-4 top-pdn'><select class='form-control' name='word-type[]'><option value='noun'>Noun</option>                <option value='verb'>Verb</option><option value='adjective'>Adjective</option><option value='adverb'>Adverb</option>                <option value='pronoun'>Pronoun</option><option value='preposition'>Preposition</option><option value='conjunction'>Conjunction</option><option value='Interjection'>Interjection</option></select><input type='text' class='form-control' name='word-synonyms[]' placeholder='Enter Synonyms'><textarea class='form-control' style='height: 20%;' rows='5' cols='5' name='word-mean[]' placeholder='Enter Meaning'></textarea><textarea class='form-control' style='height: 20%;' rows='5' cols='5' name='word-desc[]' placeholder='Enter Example'></textarea>";
                div += "</div>";
            $('.box-append').append(div);
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