@extends('admin.layouts.admin')
@section('title')
    Roles
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Roles</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
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
                        <h4 class="card-title">Add Roles
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('role.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($role)) {{route('role.update',['role' => $role->getId()] )}} @else{{route('role.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($role))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-6 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="role-name">Role Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" required class="form-control" id="role-name" name="role-name" placeholder="Enter Role" value="@if(isset($role)){{$role->getRole()}} @endif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 float-left">
                                            <label>Permission : </label>
                                            <ul class="file-tree">
                                                @foreach($routers as $key => $router)
                                                    <li><a href="#">{{ucfirst($key)}}</a>
                                                    @foreach($router as $route)
                                                        <ul>
                                                            <li>
                                                                <input type="checkbox" name="permission[]" value="{{$route['pageName']}}" @if(isset($role))
                                                                @foreach($permissions as $permission)
                                                                @if($route['pageName']==$permission) checked @else  @endif
                                                                        @endforeach
                                                                        @endif>@if($route['pageMethod']=='destroy')  Delete @else  {{ucfirst($route['pageMethod'])}} @endif
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-left">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1" @if(isset($role)&&($role->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                    <option value="0" @if(isset($role)&&($role->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 center form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary center-block">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
    <script type="text/javascript" src="{{asset('js/roles.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function () {
            Roles.initControls();
        });
    </script>
@endpush