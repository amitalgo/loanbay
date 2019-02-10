@extends('admin.layouts.admin')
@section('title')
    {{ (isset($questionaries)) ? 'Edit Questionaries' : 'Add Questionaries' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($questionaries)) ? 'Edit Questionaries' : 'Add Questionaries' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($questionaries)) ? 'Edit Questionaries' : 'Add Questionaries' }}</li>
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
                        <h4 class="card-title">{{ (isset($questionaries)) ? 'Edit Questionaries' : 'Add Questionaries' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('question.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($questionaries)) {{route('question.update',['id' => $questionaries->getId()] )}} @else{{route('question.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($questionaries))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-12 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="title">Question<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="question" name="question" placeholder="Enter Question" value="@if(isset($questionaries)){{$questionaries->getQuestionText()}} @endif">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="type">Type<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="type" class="type" id="type">
                                                        <option value="string" @if(isset($questionaries)){{($questionaries->getType()=='string')?'selected':''}} @endif>String</option>
                                                        <option value="number" @if(isset($questionaries)){{($questionaries->getType()=='number')?'selected':''}} @endif>Number</option>
                                                        <option value="alphanumeric" @if(isset($questionaries)){{($questionaries->getType()=='alphanumeric')?'selected':''}} @endif>Alpha Numeric</option>
                                                        <option value="email" @if(isset($questionaries)){{($questionaries->getType()=='email')?'selected':''}} @endif>Email</option>
                                                        <option value="text" @if(isset($questionaries)){{($questionaries->getType()=='text')?'selected':''}} @endif>Text</option>
                                                        <option value="dropdown" @if(isset($questionaries)){{($questionaries->getType()=='dropdown')?'selected':''}} @endif>Dropdown</option>
                                                    </select>
                                                </div>
                                            </div>


                                        <div class="appendType">
                                            @if(isset($questionaries) && ($questionaries->getType()=='dropdown'))
                                                <?php
                                                    $options = $questionaries->getOptions();
                                                    $optionsVal = implode(PHP_EOL,explode(',',$options));
                                                ?>
                                                <div class="form-group row"><label class="col-lg-2 col-form-label" for="status">Options</label><div class="col-lg-4"><textarea name="options" cols="35" rows="4">{{ $optionsVal }}</textarea></div></div>
                                            @endif
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="mandatory">Is Mandatory<span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <select class="form-control" name="mandatory" class="mandatory" id="mandatory">
                                                    <option value="1" @if(isset($questionaries)){{($questionaries->getisMandatory()==1)?'selected':''}} @endif>Yes</option>
                                                    <option value="0" @if(isset($questionaries)){{($questionaries->getisMandatory()==0)?'selected':''}} @endif>No</option>
                                                </select>
                                            </div>
                                        </div>

                                            {{-- To Give Active Button only on Edit--}}
                                            @if(isset($questionaries))
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="1" @if(isset($questionaries)&&($questionaries->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                            <option value="0" @if(isset($questionaries)&&($questionaries->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                        </select>
                                                    </div>
                                                </div>
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
    <!-- End Page Content -->
    </div>
    <!-- End Container fluid  -->
@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('js/questionaries.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        Questionaries.initControls();
    });
</script>
@endpush