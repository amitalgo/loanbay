@extends('admin.layouts.admin')
@section('title')
    {{ (isset($user)) ? 'Edit User' : 'Add User' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($user)) ? 'Edit User' : 'Add User' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($user)) ? 'Edit User' : 'Add User' }}</li>
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
                        <h4 class="card-title">{{ (isset($user)) ? 'Edit User' : 'Add User' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('user.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($user)){{route('user.update',['users'=>$user->getId()])}}@else{{route('user.store')}}@endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($user))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-8 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="firstName">First Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Firstname" value="@if(isset($user)){{$user->getFirstName()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="lastName">Last Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Lastname" value="@if(isset($user)){{$user->getLastName()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="@if(isset($user)){{$user->getEmail()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="contact">Contact Number<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="contact" name="contactNumber" placeholder="Contact number" value="@if(isset($user)){{$user->getContactNumber()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="location">Location</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="@if(isset($user)){{$user->getLocation()}} @endif">
                                                </div>
                                            </div>
                                            @if(!isset($user))
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="password">Password<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="password" >
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" @if(isset($user)&&($user->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                        <option value="0" @if(isset($user)&&($user->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
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
<script type="text/javascript" src="{{asset('js/user.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        User.initControls();
    });
</script>
@endpush
