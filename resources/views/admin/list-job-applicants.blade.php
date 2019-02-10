@extends('admin.layouts.admin')
@section('title')
    Job Applicants
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Job Applicants</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Job Applicants</li>
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
                        <h4 class="card-title">List of Job Applicants</h4>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Job Id</th>
                                    <th>Job Title</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobApplicants as $jobApplicant)
                                        <tr>
                                            <td>{{ $jobApplicant->getJobPostedId()->getId() }}</td>
                                        <td>{{ $jobApplicant->getJobPostedId()->getJobTitle() }}</td>
                                        <td>{{ $jobApplicant->getUserId()->getFirstName().' '.$jobApplicant->getUserId()->getLastName() }}</td>
                                        <td>{{ $jobApplicant->getUserId()->getEmail() }}</td>
                                        <td>{{ $jobApplicant->getUserId()->getContactNumber() }}</td>
                                        <td>
                                            <input type="checkbox" data-isactive="{{ $jobApplicant->getisActive() }}" data-jobappliedid="{{ $jobApplicant->getId() }}" class="approveJobApplied" @if($jobApplicant->getisActive()) {{ 'checked' }} @else {{ '' }} @endif data-toggle="toggle" data-on="Approved" data-off="Pending" data-offstyle="danger" data-onstyle="info" data-size="mini">
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
    <script type="text/javascript" src="{{asset('js/jobapplied.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function () {
            var csrf="{{ csrf_token() }}";
            JobApplied.initControls(csrf);
        });
    </script>
@endpush