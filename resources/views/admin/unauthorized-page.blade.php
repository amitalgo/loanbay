@extends('admin.layouts.admin')
@section('title')
    401 Unauthorized Access
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="error-page" id="wrapper">
                        <div class="error-box">
                            <div class="error-body text-center">
                                <h1>401</h1>
                                <h3 class="text-uppercase">Unauthorized Access</h3>
                                <p class="text-muted m-t-30 m-b-30">You are not authorized to access.</p>
                                <a class="btn btn-info btn-rounded waves-effect waves-light m-b-40" href="{{ url('/admin/dashboard') }}">Back to Dashboard</a> </div>
                        </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
