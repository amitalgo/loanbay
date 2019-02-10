@extends('admin.layouts.admin')
@section('title')
    {{ (isset($documentData)) ? 'Edit Document Type' : 'Add Document Type' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($documentData)) ? 'Edit Document Type' : 'Add Document Type' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($documentData)) ? 'Edit Document Type' : 'Add Document Type' }}</li>
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
                        <h4 class="card-title">{{ (isset($documentData)) ? 'Edit Document Type' : 'Add Document Type' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('document-type.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" id="cpt" action="@if(isset($documentData)) {{route('document-type.update',['id' => $documentData->getId()] )}} @else{{route('document-type.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($documentData))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-12 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="title" name="title" placeholder="Enter Title" value="@if(isset($documentData)){{$documentData->getType()}} @endif">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="status">IsMandatory<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="isMandatory" id="isMandatory">
                                                        <option value="1" @if(isset($documentData)&&($documentData->getisMandatory()==1)){{ 'selected' }} @endif>Yes</option>
                                                        <option value="0" @if(isset($documentData)&&($documentData->getisMandatory()==0)){{ 'selected' }} @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- To Give Active Button only on Edit--}}
                                            @if(isset($documentData))
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="1" @if(isset($documentData)&&($documentData->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                            <option value="0" @if(isset($documentData)&&($documentData->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
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
<script type="text/javascript" src="{{asset('js/documentType.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        DocumentType.initControls();
    });
</script>
@endpush