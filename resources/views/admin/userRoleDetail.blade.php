@extends('admin.layouts.admin')
@section('title')
    {{ (isset($userRolesDet)) ? 'Edit User Role Details' : 'Add User Role Details' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($userRolesDet)) ? 'Edit User Role Details' : 'Add User Role Details' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($userRolesDet)) ? 'Edit User Role Details' : 'Add User Role Details' }}</li>
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
                        <h4 class="card-title">{{ (isset($userRolesDet)) ? 'Edit User Role Details' : 'Add User Role Details' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('userRoleDetail.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($userRolesDet)) {{route('userRoleDetail.update',['admins' => $userRolesDet->getId()] )}} @else{{route('userRoleDetail.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($userRolesDet))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-12 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="name">Name<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="name" name="name" placeholder="Enter Name" value="@if(isset($userRolesDet)){{$userRolesDet->getName()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="role_type">Role Type<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select name="role_type" class="form-control" id="role_type">
                                                        <option value="">-- Select Role Type --</option>
                                                        @foreach($userRoles as $userRole)
                                                            <option value="{{$userRole->getId()}}"
                                                                @if(isset($userRolesDet))
                                                                    {{ ($userRolesDet->getUserRole()->getId()==$userRole->getId())?'selected':'' }}
                                                                @endif

                                                            >{{ $userRole->getRole() }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row box-append">
                                                <div class="col-lg-11"><h4 class="card-title">Media</h4></div>
                                                <div class="float-right"><a href="javascript:void(0)"><i class="fa fa-plus-square add-image-box"></i></a></div>
                                                @if(@isset($userRolesDet))
                                                        @foreach($userRolesDet->getroleDetailImage() as $key=>$roleDetImg)
                                                            <div class="col-lg-4 top-pdn">

                                                                <img src="@if(null!==$roleDetImg->getImage()){{$roleDetImg->getImage()}} @endif" alt="image" style="height:100px;weight:100px;" class="image-preview">
                                                                <input type="file" class="form-control image" name="<?php echo "group[$key][image]" ?>">
                                                                <input type="hidden" class="imageUrl" name="<?php echo "group[$key][imageUrl]" ?>" value="@if(null!==$roleDetImg->getImage()){{$roleDetImg->getImage()}} @endif">
                                                                <textarea class="form-control" style="height: 20%;" rows="5" cols="5" name="<?php echo "group[$key][short-desc]" ?>" placeholder="Enter Short Description">@if(null!==$roleDetImg->getShortDesc()){{$roleDetImg->getShortDesc()}} @endif</textarea>
                                                            </div>
                                                        @endforeach
                                                    {{--@endif--}}
                                                @else
                                                    <div class="col-lg-4 top-pdn">
                                                        <img src="" alt="image" style="height:100px;weight:100px;" class="image-preview">
                                                        <input type="file" class="form-control image" name="image[]">
                                                        <textarea class="form-control" style="height: 20%;" rows="5" cols="5" name="short-desc[]" placeholder="Enter Short Description"></textarea>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" @if(isset($userRolesDet)&&($userRolesDet->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                        <option value="0" @if(isset($userRolesDet)&&($userRolesDet->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
<script type="text/javascript" src="{{asset('js/userRoleDetails.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        UserRoleDetails.initControls();
    });
</script>
@endpush