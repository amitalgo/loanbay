@extends('admin.layouts.admin')
@section('title')
    Document Types
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Document Types</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Document Types</li>
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
                        <h4 class="card-title">List
                            <span class="pull-right">
                            <a class="btn btn-primary m-b-10 m-l-5" href="{{ route('document-type.create') }}"><i class="fa fa-plus"></i> Add </a></span>
                        </h4>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Document Type</th>
                                    <th>Is Mandatory</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documentTypes as $documentType)
                                    <tr>
                                        <td>{{ $documentType->getId() }}</td>
                                        <td>{{ $documentType->getType() }}</td>
                                        <td>{{ ($documentType->getisMandatory()==1)? 'Yes': 'No' }}</td>
                                        <td>{{($documentType->getisActive()==1)? 'Active': 'InActive' }} </td>
                                        <td><a href="{{ route('document-type.edit',['id'=>$documentType->getId()]) }}" class="btn btn-icon waves-effect waves-light btn-white">
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
<script type="text/javascript" src="{{asset('js/documentType.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        DocumentType.initControls();
    });
</script>
@endpush