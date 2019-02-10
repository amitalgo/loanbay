@extends('admin.layouts.admin')
@section('title')
    Enquiries
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Enquiries</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Enquiries</li>
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
                        <h4 class="card-title">List of Enquiries</h4>

                        <div class="m-t-40 col-md-6">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($enquiries as $enquiry)
                                        <tr>
                                            <td>{{ $enquiry->getFullName() }}</td>
                                            <td>{{ $enquiry->getEmail() }}</td>
                                            <td><a data-enquiryid="{{ $enquiry->getId() }}" href="javascript:void(0)" class="btn btn-icon waves-effect waves-light btn-white viewEnquiry"><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 m-t-40 search-table">
                            <div class="search-list">
                                        <div class="bg_colo">
                                            <h4 class="name"></h4>
                                            <h5 class="date"></h5>
                                        </div>
                                        <table class="table table-striped">
                                            <tbody>
                                            <br/>
                                            <tr>
                                                <td width="25%">Subject :</td>
                                                <td width="75%" class="sub"></td>
                                            </tr>
                                            <tr>
                                                <td width="21%">Email :</td>
                                                <td class="email"> </td>
                                            </tr>
                                            <tr>
                                                <td width="21%">Contact :</td>
                                                <td class="contact"></td>
                                            </tr>
                                            <tr>
                                                <td width="21%">Message :</td>
                                                <td class="msg"></td>
                                            </tr>
                                        </table>

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
<script type="text/javascript" src="{{asset('js/enquiry.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        var csrf="{{ csrf_token() }}";
        Enquiry.initControls(csrf);
    });
</script>
@endpush