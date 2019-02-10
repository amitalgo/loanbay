@extends('admin.layouts.admin')
@push('styles')
    <link href="{{asset('css/summernote.css')}}" rel="stylesheet">
@endpush
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Pages</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Create Page</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        @include('admin.includes.alert')
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="">
                        <div class="form-validation">
                            <form class="form-valide" action="@if(isset($page)) {{route('page.update', ['id'=>$page->getId()])}} @else {{route('page.store')}} @endif" method="post" enctype="multipart/form-data">
                                @csrf
                                @if($page)
                                    <input name="_method" type="hidden" value="PUT">
                                @endif
                                <div class="col-md-12">
                                    <div class="col-md-8 float-left">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Title..." name="title" value="@isset($page) {{$page->getTitle()}} @endisset">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea id="content" class="form-control summernote" name="content">@isset($page) {{$page->getContent()}} @endisset</textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="status">Status</label>--}}
                                            {{--<select class="form-control" id="status" name="status">--}}
                                                {{--<option value="">--Status--</option>--}}
                                                {{--<option value="1" @isset($page) {{($page->getisActive()==1)?'selected':''}} @endisset>Active</option>--}}
                                                {{--<option value="0" @isset($page) {{($page->getisActive()==0)?'selected':''}} @endisset>Inactive</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
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
        <!-- End PAge Content -->
    </div>
@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('js/summernote.js')}}"></script>
<script type="text/javascript" src="{{asset('js/page.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        Page.initControls();
    });
</script>
@endpush