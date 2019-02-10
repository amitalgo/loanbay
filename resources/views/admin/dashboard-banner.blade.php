@extends('admin.layouts.admin')
@section('title')
    {{ (isset($dashboardBanner)) ? 'Edit Dashboard Banner' : 'Add Dashboard Banner' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($dashboardBanner)) ? 'Edit Dashboard Banner' : 'Add Dashboard Banner' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($dashboardBanner)) ? 'Edit Dashboard Banner' : 'Add Dashboard Banner' }}</li>
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
                        <h4 class="card-title">{{ (isset($dashboardBanner)) ? 'Edit Dashboard Banner' : 'Add Dashboard Banner' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('dashboardBanner.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($dashboardBanner)) {{route('dashboardBanner.update',['admins' => $dashboardBanner->getId()] )}} @else{{route('dashboardBanner.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($dashboardBanner))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-8 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="short-desc">Short Desc<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="short-desc" name="short-desc" placeholder="Enter Short Desc" value="@if(isset($dashboardBanner)){{$dashboardBanner->getShortDesc()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="image">Banner Image</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="form-control" id="image" name="image" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="isAdmin">Has Button</label>
                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-success">
                                                            <input type="radio" name="isAdmin" class="isBtn" value="1" @if(isset($dashboardBanner) && (null!=(($dashboardBanner->getButtonName())))) checked="true"@endif >Yes
                                                            <input type="radio" name="isAdmin" class="isBtn" value="0" @if(isset($dashboardBanner) && (null==(($dashboardBanner->getButtonName())))) checked="true"@endif >No
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="truebtn" style="{{((isset($dashboardBanner) && $dashboardBanner->getButtonName()!=null))? 'display:block': 'display:none' }} ">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="short-desc">Button Name<span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="btn-name" name="btn-name" placeholder="Enter Button Name" value="@if(isset($dashboardBanner)){{$dashboardBanner->getButtonName()}} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="btn-link">Button Link</label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="btn-link" name="btn-link" placeholder="Enter Button Link" value="@if(isset($dashboardBanner)){{$dashboardBanner->getButtonLink()}} @endif">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="status">Status</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" @if(isset($dashboardBanner)&&($dashboardBanner->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                        <option value="0" @if(isset($dashboardBanner)&&($dashboardBanner->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 float-left">
                                            @if(isset($dashboardBanner))
                                                <img src="{{$dashboardBanner->getImage()}}" id="image-preview" />
                                            @else
                                                <img src="#" id="image-preview" />
                                            @endif
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
<script type="text/javascript" src="{{asset('js/dashboardBanner.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        DashboardBanner.initControls();
    });
</script>
@endpush