@extends('admin.layouts.admin')
@section('title')
    {{ (isset($cpiui)) ? 'Edit CPTUI' : 'Add CPTUI' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($cpiui)) ? 'Edit CPTUI' : 'Add CPTUI' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($cpiui)) ? 'Edit CPTUI' : 'Add CPTUI' }}</li>
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
                        <h4 class="card-title">{{ (isset($cpiui)) ? 'Edit CPTUI' : 'Add CPTUI' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{url('admin/cptui/list/'.$slug)}}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="clearfix"></div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" id="cptui" action="@if(isset($cpiui)) {{route('cptui.update',['id' => $cpiui->getId()] )}} @else{{route('cptui.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{$slug}}">
                                    @if(isset($cpiui))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-6 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" required id="title" name="title" placeholder="Enter Title" value="@if(isset($cpiui)){{$cpiui->getTitle()}} @endif">
                                                </div>
                                            </div>

                                            {{-- To Give Active Button only on Edit--}}
                                            @if(isset($cpiui))
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="1" @if(isset($cpiui)&&($cpiui->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                            <option value="0" @if(isset($cpiui)&&($cpiui->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-6 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="image">Image</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" id="image" name="image" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label" for="parent">Parent</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" name="parent" id="parent">
                                                        <option value="">Choose Parent</option>
                                                       @if(isset($parents) && !empty($parents))
                                                            @foreach($parents->getCpt() as $parent)
                                                                @if($parent->getParent()==null)
                                                                    <option value="{{$parent->getId()}}" @if(isset($cpiui) && null!=$cpiui->getParent()) {{$parent->getId() == $cpiui->getParent()->getId() ? "selected=selected" : "" }} @endif> {{$parent->getTitle()}}</option>
                                                                @endif
                                                            @endforeach
                                                       @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 form-group">
                                        <label class="col-lg-3 col-form-label" for="contact">Description<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control summernote" style="height: 50%;" rows="10" cols="5" id="description" name="description" placeholder="Enter Description">@if(isset($cpiui)){{$cpiui->getDescription()}} @endif</textarea>
                                        </div>
                                    </div>
                                    <hr/>

                                    {{--Questionaries--}}
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <h4><u><b>Questionaries</b></u></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="question">Questions</label>
                                            <div class="col-lg-6">
                                                <select class="form-control select2" name="question[]" id="question" multiple>
                                                    <option value="">Choose Question</option>
                                                    @if(is_array($questions))
                                                        @forelse($questions as $question)
                                                            <option value="{{ $question->getId() }}"
                                                            @if(isset($cpiui))
                                                                @foreach($cpiui->getcptuiQuestion() as $cpiuiQuestion)
                                                                    @if($cpiuiQuestion->getQuestionaries()->getId()==$question->getId()){{ 'selected' }}@endif
                                                                @endforeach
                                                            @endif
                                                            >{{ $question->getquestionText() }}</option>
                                                            @empty
                                                        @endforelse
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    {{--Document--}}
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <h4><u><b>Documents</b></u></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label" for="question">Document</label>
                                            <div class="col-lg-6">
                                                <select class="form-control select2" name="document[]" id="document" multiple>
                                                    <option value="">Choose Document</option>
                                                    @if(is_array($documents))
                                                        @forelse($documents as $document)
                                                            <option value="{{ $document->getId() }}"
                                                            @if(isset($cpiui))
                                                                @foreach($cpiui->getcptuiDocument() as $cpiuiDocument)
                                                                    @if($cpiuiDocument->getDocument()->getId()==$document->getId()){{ 'selected' }}@endif
                                                                @endforeach
                                                            @endif
                                                            >{{ $document->getType() }}</option>
                                                        @empty
                                                        @endforelse
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    {{--Attributes--}}
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            <h4><u><b>Attributes</b></u></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="attributes">
                                            @if(isset($attr))
                                                @foreach($attr as $at)
                                                <div class="attrb">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="label">{{ $at['label']}} </label>
                                                            @if($at['datatype']=='textarea')
                                                                <textarea rows="5" class="form-control summernote" name=df[{{$at['key']}}]>@if(isset($cpiuiAttr)){!! $cpiuiAttr[$at['key']] !!}@endif</textarea>
                                                            @else
                                                            <input type="{{ $at['datatype'] }}" class="{{ $at['datatype'] }}  form-control" name=df[{{$at['key']}}] value="@if(isset($cpiuiAttr)){!! $cpiuiAttr[$at['key']] !!}@endif">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif

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
<script type="text/javascript" src="{{asset('js/cptui.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        CPTUI.initControls();
    });
</script>
@endpush