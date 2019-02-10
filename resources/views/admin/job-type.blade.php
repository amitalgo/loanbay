@extends('admin.layouts.admin')
@section('title')
    {{ (isset($jobTypes)) ? 'Edit Job' : 'Add Job' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Add Job Type</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add Job Type</li>
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
                        <h4 class="card-title">Add Job Type
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('jobtype.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($jobTypes)) {{route('jobtype.update',['admins' => $jobTypes->getId()] )}} @else{{route('jobtype.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($jobTypes))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-8 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="first-name">Job Type<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="jobType" name="jobType" placeholder="Enter Job Type" value="@if(isset($jobTypes)){{$jobTypes->getJobType()}} @endif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" @if(isset($jobTypes)&&($jobTypes->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                        <option value="0" @if(isset($jobTypes)&&($jobTypes->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
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
<script type="text/javascript" src="{{asset('js/subadmin.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        SubAdmin.initControls();
    });
</script>
@endpush