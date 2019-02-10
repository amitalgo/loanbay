@extends('admin.layouts.admin')
@section('title')
    Jobs Posted
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Jobs Posted</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Jobs Posted</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb-->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('admin.includes.alert')
                        <h4 class="card-title">List of Job Posted
                            <span class="pull-right">
                            <a class="btn btn-primary m-b-10 m-l-5" href="{{ route('jobposted.create') }}"><i class="fa fa-plus"></i> Add </a></span>
                        </h4>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Job Title</th>
                                    <th>No of Position</th>
                                    <th>Experience</th>
                                    <th>Job Location</th>
                                    <th>Posted By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    @foreach($jobPosts as $jobPost)
                                        <tr>
                                        <td>{{ $jobPost->getId() }}</td>
                                        <td>{{ $jobPost->getJobTitle() }}</td>
                                        <td>{{ $jobPost->getNoOfPosition() }}</td>
                                        <td>{{ $jobPost->getExperience() }}</td>
                                        <td>{{ $jobPost->getJobLocation() }}</td>
                                        <td>{{ $jobPost->getUserId()->getFirstName() }}</td>
                                        <td> @if($jobPost->getisClosed()) {{ 'Closed' }} @else {{ 'Open' }} @endif</td>
                                        <td>
                                            <input type="checkbox" data-isactive="{{ $jobPost->getisActive() }}" data-jobid="{{ $jobPost->getId() }}" class="approveJobPosted" @if($jobPost->getisActive()) {{ 'checked' }} @else {{ '' }} @endif data-toggle="toggle" data-on="Approved" data-off="Pending" data-offstyle="danger" data-onstyle="info" data-size="mini">
                                            <a href="{{ route('jobposted.filterapplicants',['jobid'=>$jobPost->getId()]) }}" class="btn btn-icon waves-effect waves-light btn-white"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('jobposted.edit',['jobpost'=>$jobPost->getId()]) }}" class="btn btn-icon waves-effect waves-light btn-white"><i class="fa fa-edit"></i></a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <script type="text/javascript" src="{{asset('js/jobposted.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function() {
            var csrf="{{ csrf_token() }}";
            JobPosted.initControls(csrf);
        });
    </script>
@endpush