@extends('admin.layouts.admin')
@push('styles')
<link href="{{asset('css/summernote.css')}}" rel="stylesheet">
@endpush
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Custom UI</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">UI List</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        @include('admin.includes.alert')
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('admin.customui.create')}}" class="btn btn-primary pull-right">Create</a>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="30%">UI</th>
                            <th width="20%">Status</th>
                            <th width="50%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
@endsection

@push('scripts')
<script src="{{asset('js/lib/datatables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/page.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        Page.initControls();
    });
</script>
@endpush