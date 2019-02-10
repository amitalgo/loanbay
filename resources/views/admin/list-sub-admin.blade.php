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
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('admin.includes.alert')
                        <h4 class="card-title">List of SubAdmin
                            <span class="pull-right">
                            <a class="btn btn-primary m-b-10 m-l-5" href="{{ route('sub-admin.create') }}"><i class="fa fa-plus"></i> Add </a></span>
                        </h4>
                        {{--<h6 class="card-subtitle">Data table example</h6>--}}

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Role</th>
                                    <th>Is SuperAdmin</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->getfirstName() }}</td>
                                    <td>{{ $admin->getEmail() }}</td>
                                    <td>{{ $admin->getContactNumber() }}</td>
                                    <td><ul>@foreach($admin->getAdminRole() as $adminRole)
                                            <li>{{ $adminRole->getRoleId()->getRole() }}</li>
                                            @endforeach</ul>
                                    </td>
                                    <td>{{($admin->getisSuperUser())? 'Yes':  'No' }} </td>
                                    <td> @if($admin->getisActive()) {{ 'Active' }} @else {{ 'InActive' }} @endif</td>
                                    <td><a href="{{ route('sub-admin.edit',['admin'=>$admin->getId()]) }}" class="btn btn-icon waves-effect waves-light btn-white">
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
@push('scripts')
    <script type="text/javascript" src="{{asset('js/subadmin.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function () {
            SubAdmin.initControls();
        });
    </script>
@endpush