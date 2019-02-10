@extends('admin.layouts.admin')
@section('title')
    {{ (isset($cpts)) ? 'Edit CPT' : 'Add CPT' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($cpts)) ? 'Edit CPT' : 'Add CPT' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($cpts)) ? 'Edit CPT' : 'Add CPT' }}</li>
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
                        <h4 class="card-title">{{ (isset($cpts)) ? 'Edit CPT' : 'Add CPT' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('cpt.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" id="cpt" action="@if(isset($cpts)) {{route('cpt.update',['id' => $cpts->getId()] )}} @else{{route('cpt.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($cpts))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-12 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="title" name="title" placeholder="Enter Title" value="@if(isset($cpts)){{$cpts->getTitle()}} @endif">
                                                </div>
                                            </div>

                                            {{-- To Show Form or not --}}

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="status">Show Form<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="showForm" id="showForm">
                                                        <option value="0" @if(isset($cpts)&&($cpts->getisActive()==0)){{ 'selected' }} @endif>No</option>
                                                        <option value="1" @if(isset($cpts)&&($cpts->getisActive()==1)){{ 'selected' }} @endif>Yes</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- To Give Active Button only on Edit--}}
                                            @if(isset($cpts))
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="1" @if(isset($cpts)&&($cpts->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                            <option value="0" @if(isset($cpts)&&($cpts->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                                <hr/>
                                            </div>
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <div class="col-md-6">
                                                <h4><u><b>Attributes</b></u></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <button style="float:right" type="button" class="btn btn-icon waves-effect btn-default waves-light addCptAttrb"> <i class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="attributes">
                                                @if(!isset($cpts))
                                                    <div class="attrb">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="label">Label</label>
                                                                <input type="text" class="form-control" name="attrb[0][label]" placeholder="ex. StartDate">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="label">Data Type</label>
                                                                <select class="form-control" name="attrb[0][datatype]">
                                                                    <option value="">Choose DataType</option>
                                                                    <option value="text">Text</option>
                                                                    <option value="datetime">Date Time</option>
                                                                    <option value="textarea">Text Area</option>
                                                                </select>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @if(null!=($cpts->getAttribute()) && !empty($cpts->getAttribute()))
                                                        <?php $attr = json_decode($cpts->getAttribute(),true); ?>
                                                        @foreach($attr as $key=>$value)
                                                            <div class="attrb">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Label</label>
                                                                        <input class="form-control" value="{{ $value['label'] }}"  placeholder="eq. StartDate" type="text" name="attrb[{{$key}}][label]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Data Type</label>
                                                                        <select class="form-control" name="attrb[{{$key}}][datatype]">
                                                                            <option value="">Choose DataType</option>
                                                                            <option value="text" {{ $value['datatype']=='text'?'selected':'' }}>Text</option>
                                                                            <option value="datetime" {{ $value['datatype']=='datetime'?'selected':'' }}>Date Time</option>
                                                                            <option value="textarea" {{ $value['datatype']=='textarea'?'selected':'' }}>Text Area</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
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
    <script type="text/javascript" src="{{asset('js/cpt.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function () {
            CPT.initControls();
        });
    </script>
    @endpush