@extends('admin.layouts.admin')
@section('title')
    Job Type
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Job Type</h3> </div>
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
                        <h4 class="card-title">List of JobType
                            <span class="pull-right">
                            <a class="btn btn-primary m-b-10 m-l-5" href="{{ route('jobtype.create') }}"><i class="fa fa-plus"></i> Add </a></span>
                        </h4>
                        {{--<h6 class="card-subtitle">Data table example</h6>--}}

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>JobType</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobTypes as $jobtype)
                                    <tr>
                                        <td>{{ $jobtype->getJobType() }}</td>
                                        <td>{{($jobtype->getisActive()==1)? 'Active': 'InActive' }} </td>
                                        <td><a href="{{route('jobtype.edit',['jobtype' =>$jobtype->getId()])}}" class="btn btn-icon waves-effect waves-light btn-white">
                                                <i class="fa fa-edit"></i>
                                            </a></td>
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