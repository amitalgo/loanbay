@extends('admin.layouts.admin')
@section('title')
    Sub Admin
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Sub Admin</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Sub Admin</li>
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
                        <h4 class="card-title">Add SubAdmin
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('sub-admin.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($admin)) {{route('sub-admin.update',['admins' => $admin->getId()] )}} @else{{route('sub-admin.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($admin))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-8 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="first-name">First Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Enter First Name" value="@if(isset($admin)){{$admin->getFirstName()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="last-name">Last Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Enter Last Name" value="@if(isset($admin)){{$admin->getLastName()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Id" value="@if(isset($admin)){{$admin->getEmail()}} @endif">
                                                </div>
                                            </div>
                                            @if(!isset($admin))
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="password">Password<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="cpassword">Confirm Password<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" >
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="contact">Contact No<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" value="@if(isset($admin)){{$admin->getContactNumber()}} @endif" id="contact" name="contact" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="image">Profile Pic</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="form-control" id="image" name="image" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="isAdmin">Is Admin</label>
                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-success">
                                                            <input type="checkbox" name="isAdmin" id="isAdmin"  @if(isset($admin) && (null!=(($admin->getisSuperUser())))) checked="true"@endif >

                                                            {{--<label for="isAdmin"> Is Admin </label>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="contact">Role<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="role" id="role">
                                                        <option value="">Choose Role</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->getId() }}"
                                                                @if(isset($admin))
                                                                @foreach($admin->getAdminRole() as $roleSelected)
                                                                @if(null!=$roleSelected->getRoleId())
                                                                @if($role->getId()==$roleSelected->getRoleId()->getId()) selected="selected" @else  @endif
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                        >{{ $role->getRole() }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="status">Status</label>
                                                <div class="col-md-4">
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="1" @if(isset($admin)&&($admin->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                            <option value="0" @if(isset($admin)&&($admin->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 float-left">
                                            @if(isset($admin))
                                               <img src="{{$admin->getProfileImage()}}" id="image-preview" />
                                            @else
                                               <img src="#" id="image-preview" />
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
    <script type="text/javascript" src="{{asset('js/subadmin.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function () {
            SubAdmin.initControls();
        });
    </script>
@endpush