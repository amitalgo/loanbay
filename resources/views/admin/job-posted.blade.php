@extends('admin.layouts.admin')
@section('title')
    {{ (isset($jobDetail)) ? 'Edit Job' : 'Add Job' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($jobDetail)) ? 'Edit Job' : 'Add Job' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($jobDetail)) ? 'Edit Job' : 'Add Job' }}</li>
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
                        <h4 class="card-title">{{ (isset($jobDetail)) ? 'Edit Job' : 'Add Job' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('jobposted.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($jobDetail)) {{route('jobposted.update',['admins' => $jobDetail->getId()] )}} @else{{route('jobposted.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($jobDetail))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-8 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="job-title">Job Title<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" required id="job-title" name="job-title" placeholder="Enter Job Title" value="@if(isset($jobDetail)){{$jobDetail->getJobTitle()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="job-type">Job Type<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="job-type" id="job-type">
                                                        <option value="">Choose Job Type</option>
                                                        @foreach($jobTypes as $jobType)
                                                            <option value="{{ $jobType->getId() }}"
                                                                    @if(isset($jobDetail))
                                                                    @if(null!=$jobDetail->getId())
                                                                    @if($jobType->getId()==$jobDetail->getJobTypeId()->getId()) selected="selected" @else  @endif
                                                                    @endif

                                                                    @endif
                                                            >{{ $jobType->getJobType() }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="no-of-position">No of Position<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" required class="form-control" id="no-of-position" name="no-of-position" placeholder="No Of Position" value="@if(isset($jobDetail)){{$jobDetail->getNoOfPosition()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="email">Experience<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" required class="form-control" id="experience" name="experience" placeholder="Enter Experience" value="@if(isset($jobDetail)){{$jobDetail->getExperience()}} @endif">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="job-location">Job Location<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <input type="text" required class="form-control" id="job-location" name="job-location" placeholder="Enter Job Location" value="@if(isset($jobDetail)){{$jobDetail->getJobLocation()}} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="job-skill">Job Skill<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="job-skill" name="job-skill" placeholder="Enter Job Skill" value="@if(isset($jobDetail)){{$jobDetail->getJobSkill()}} @endif">
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="contact">Job Description<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control" style="height: 20%;" rows="5" cols="5" id="job-desc" name="job-desc" placeholder="Enter Job Description">@if(isset($jobDetail)){{$jobDetail->getJobDescription()}} @endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="user">User<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="user" id="user">
                                                        <option value="">Choose User</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->getId() }}"
                                                                    @if(isset($jobDetail))
                                                                    @if(null!=$jobDetail->getUserId())
                                                                    @if($user->getId()==$jobDetail->getUserId()->getId()) selected="selected" @else  @endif
                                                                    @endif
                                                                    @endif
                                                            >{{ $user->getFirstName().' '. $user->getLastName() }}</option>
                                                        @endforeach
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