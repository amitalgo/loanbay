@extends('admin.layouts.admin')
@section('title')
    {{ (isset($cmsData)) ? 'Edit Words' : 'Add Words' }}
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">{{ (isset($cmsData)) ? 'Edit Words' : 'Add Words' }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{ (isset($cmsData)) ? 'Edit Words' : 'Add Words' }}</li>
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
                        <h4 class="card-title">{{ (isset($cmsData)) ? 'Edit Words' : 'Add Words' }}
                            <span class="pull-right">
                            <a class="btn btn-info m-b-10 m-l-5" href="{{ route('word.index') }}"><i class="fa fa-reply"></i> Back </a></span>
                        </h4>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="@if(isset($cmsData)) {{route('cms.update',['cms' => $cmsData->getId()] )}} @else{{route('cms.store')}} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($cmsData))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-12 float-left">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="title" name="title" placeholder="Enter Title" value="@if(isset($cmsData)){{$cmsData->getTitle()}} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="slug">Slug<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" required id="slug" name="slug" placeholder="" value="@if(isset($cmsData)){{$cmsData->getSlug()}} @endif">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="content">Content<span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <textarea cols="40" name="content" rows="10" id="content">@if(isset($cmsData)){{$cmsData->getContent()}} @endif</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="feature-img">Featured Image<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="file" class="form-control" id="feature-img" name="image" placeholder="">
                                                </div>
                                                <div class="col-lg-6">
                                                    @if(isset($admin))
                                                        <img src="{{$admin->getProfileImage()}}" id="image-preview" />
                                                    @else
                                                        <img src="" onerror="this.style.display='none'" id="image-preview" />
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="status">Status<span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" @if(isset($cmsData)&&($cmsData->getisActive()==1)){{ 'selected' }} @endif>Active</option>
                                                        <option value="0" @if(isset($cmsData)&&($cmsData->getisActive()==0)){{ 'selected' }} @endif>InActive</option>
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
<script type="text/javascript" src="{{asset('js/cms.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        CMS.initControls();
    });
</script>
@endpush