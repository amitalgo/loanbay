@extends('admin.layouts.admin')
@section('title')
    {{ (isset($words)) ? 'Edit Words' : 'Add Words' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($words)) ? 'Edit Words' : 'Add Words' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($words)) ? 'Edit Words' : 'Add Words' }}</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb-->
    <!-- Container fluid  -->
    <div class="container-fluid">
    @include('admin.includes.alert')
    <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ (isset($words)) ? 'Edit Words' : 'Add Words' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('word.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($words)) {{route('word.update',['admins' => $words->getId()] )}} @else{{route('word.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($words))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-12 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="word">Word<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="word" name="word" placeholder="Enter Word" value="@if(isset($words)){{$words->getWord()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="pinyin-word">Pinyin Word<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="pinyin-word" name="pinyin-word" placeholder="" value="@if(isset($words)){{$words->getPinyinWord()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row box-append">
                                                <div class="col-lg-11"><h4 class="card-title">Meaning</h4></div>
                                                <div class="float-right"><a href="javascript:void(0)"><i class="fa fa-plus-square add-meaning-box"></i></a></div>
                                                    @if(@isset($words))
                                                        @if(null!==$words->getwordId())
                                                            @foreach($words->getwordId() as $key=>$meaning)
                                                            <div class="col-lg-4 top-pdn">
                                                                <select class="form-control" name="word-type[]">
                                                                <option value="noun" {{ ($meaning->getType()=='noun')? 'selected' :''}}>Noun</option>
                                                                    <option value="verb" {{ ($meaning->getType()=='verb')? 'selected' :''}}>Verb</option>
                                                                    <option value="adjective" {{ ($meaning->getType()=='adjective')? 'selected' :''}}>Adjective</option>
                                                                    <option value="adverb" {{ ($meaning->getType()=='adverb')? 'selected' :''}}>Adverb</option>
                                                                    <option value="pronoun" {{ ($meaning->getType()=='pronoun')? 'selected' :''}}>Pronoun</option>
                                                                    <option value="preposition" {{ ($meaning->getType()=='preposition')? 'selected' :''}}>Preposition</option>
                                                                    <option value="conjunction" {{ ($meaning->getType()=='conjunction')? 'selected' :''}}>Conjunction</option>
                                                                    <option value="Interjection" {{ ($meaning->getType()=='Interjection')? 'selected' :''}}>Interjection</option>
                                                                </select>
                                                                <input type="text" class="form-control" name="word-synonyms[]" placeholder="Enter Synonyms" value="@if(null!==$meaning->getSynonyms()){{$meaning->getSynonyms()}} @endif">
                                                                <textarea class="form-control" style="height: 20%;" rows="5" cols="5" name="word-mean[]" placeholder="Enter Meaning">@if(null!==$meaning->getMeaning()){{$meaning->getMeaning()}} @endif</textarea>
                                                                <textarea class="form-control" style="height: 20%;" rows="5" cols="5" id="job-desc" name="word-desc[]" placeholder="Enter Example">@if(null!==$meaning->getExample()){{$meaning->getExample()}} @endif</textarea>
                                                            </div>
                                                            @endforeach
                                                        @endif
                                                    @else

                                                    <div class="col-lg-4 top-pdn">
                                                        <select class="form-control" name="word-type[]">
                                                                <option value="noun">Noun</option>
                                                                <option value="verb">Verb</option>
                                                                <option value="adjective">Adjective</option>
                                                                <option value="adverb" selected>Adverb</option>
                                                                <option value="pronoun">Pronoun</option>
                                                                <option value="preposition">Preposition</option>
                                                                <option value="conjunction">Conjunction</option>
                                                                <option value="Interjection">Interjection</option>
                                                        </select>
                                                        <input type="text" class="form-control" name="word-synonyms[]" placeholder="Enter Synonyms">
                                                        <textarea class="form-control" style="height: 20%;" rows="5" cols="5" name="word-mean[]" placeholder="Enter Meaning"></textarea>
                                                        <textarea class="form-control" style="height: 20%;" rows="5" cols="5" id="job-desc" name="word-desc[]" placeholder="Enter Example"></textarea>
                                                    </div>

                                                    @endif

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" @if(isset($words)&&($words->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                        <option value="0" @if(isset($words)&&($words->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('js/words.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        Words.initControls();
    });
</script>
@endpush