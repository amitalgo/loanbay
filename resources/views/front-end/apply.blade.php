<form method="post" action="{{ route('apply.store',['type'=>$slug]) }}">
    @csrf
    Questions <br>
    @if($cptui->getCptuiQuestion())
        @foreach($cptui->getCptuiQuestion() as $value)
            @if($value->getQuestionaries())
                {{--New Question : {{ $value->getQuestionaries()->getQuestionText() }}--}}
                @if($value->getQuestionaries())
                    <input type="{{ $value->getQuestionaries()->getType() }}"> <br>
                @endif
            @endif
        @endforeach
    @endif
    <input type="submit" value="Submit">
</form>