@extends('admin.layouts.admin')
@section('title')
    Words
@endsection

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Words</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Words</li>
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
                        <h4 class="card-title">List of Words
                            <span class="pull-right">
                            <a class="btn btn-primary m-b-10 m-l-5" href="{{ route('word.create') }}"><i class="fa fa-plus"></i> Add </a></span>
                        </h4>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    {{--<th>ID</th>--}}
                                    <th>Word</th>
                                    <th>Meaning</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($words as $word)
                                    <tr>
                                        {{--<td>{{ $word->getId() }}</td>--}}
                                        <td>{{ $word->getWord() }}</td>
                                        <td>
                                            <ul>
                                            @foreach($word->getWordId() as $wordmeaning)
                                                    <b><li>{{ ucfirst(trans($wordmeaning->getType()))}}</li></b>
                                                    <li>{{ ($wordmeaning->getMeaning())? $wordmeaning->getMeaning()  :'Not Mentioned'}}</li>
                                                    <li> <i>ex. {{($wordmeaning->getExample())?$wordmeaning->getExample(): 'Not Mentioned' }}</i> </li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>{{($word->getisActive()==1)? 'Active': 'InActive' }} </td>
                                        <td>
                                            <a href="{{ route('word.edit',['word'=>$word->getId()]) }}" class="btn btn-icon waves-effect waves-light btn-white">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
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
<script type="text/javascript" src="{{asset('js/words.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function() {
        var csrf="{{ csrf_token() }}";
        Words.initControls(csrf);
    });
</script>
@endpush