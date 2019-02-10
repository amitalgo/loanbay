@extends('admin.layouts.admin')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">My Account</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Change Password</li>
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
                    <h4 class="card-title">Update Password</h4>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{route('admin.account.update-password')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="new-password">New Password<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="new-password" name="new-password" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="cnfrm-new-password">Confirm New Password<span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="cnfrm-new-password" name="cnfrm-new-password" placeholder="">
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