@extends('admin.layouts.admin')
@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-check f-s-40 color-success"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                {{--<h2>{{ $jobsApproved }}</h2>--}}
                                <p class="m-b-0">Job Approved</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                            </div>
                            <div class="media-body media-text-right">

                                <p class="m-b-0">Job Applied</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-globe f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                {{--<h2>{{ $words }}</h2>--}}
                                <p class="m-b-0">Total Word</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>{{ $users }}</h2>
                                <p class="m-b-0">User</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">

        <div class="col-lg-8"> <div class="card"> <div class="card-title"> <h4>Recent Job Applied </h4> </div> <div class="card-body"> <div class="table-responsive"> <table class="table"> <thead> <tr>
                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Experience</th>
                                <th>Status</th> </tr> </thead> <tbody>
                            </tbody> </table> </div> </div> </div> </div>
        </div></div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
@endsection