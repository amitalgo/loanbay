@extends('admin.layouts.admin')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">My Account</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">My Account</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        @include('admin.includes.alert')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h4 class="card-title">Update Account</h4>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{route('admin.account.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="col-md-8 float-left">
                                        <div class="form-group row">
                                            <input type="hidden" name="account" value="1">
                                            <input type="hidden" name="status" value="1">
                                            <label class="col-lg-4 col-form-label" for="first-name">First Name<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="" value="{{$user->getFirstName()}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="last-name">Last Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="" value="{{$user->getLastName()}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{$user->getEmail()}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="image">Profile Pic</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="image" name="image" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 float-left">
                                        <img src="{{$user->getProfileImage()}}" id="image-preview" />
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
        <!-- End PAge Content -->
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('js/user.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function () {
            User.initControls();
        });
    </script>
@endpush