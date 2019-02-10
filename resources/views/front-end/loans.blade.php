@extends('front-end.layouts.frontlayout')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-left mb-5">
                    <h2 class="text-black">Find the best deals on {{ $parent->getTitle() }}</h2>
                    <img class="center slick-initialized slick-slider" src="{{ asset('front-end/images/bdr-botm-center.png') }}" alt="bdr-botm-center">
                </div>
            </div>

            <div class="row">

                @foreach($loans as $loan)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <div class="demo">
                            <figure class="imghvr-hinge-left">
                                <div class="com-div">
                                    <h4>{{ $loan->getTitle() }}</h4>
                                    <p>{!! $loan->getDescription()  !!} }}</p>
                                </div>
                                <figcaption class="py-5">
                                    <div class="flip-imghvr-vert">
                                        <h3>{{ $loan->getTitle() }}</h3>
                                        <?php $check=(Auth::guard('web')->check())?'getDetails':'dologin' ?>
                                        <button onclick="{{ ($check=='dologin')?'location.href='."'".route('user.login.create')."'":'javascript:void(0)' }}" data-id="{{ $loan->getId() }}" data-title="{{ $loan->getTitle() }}" data-type="requestcall" class="{{ $check }}">Request for call back</button>
                                        <button onclick="{{ ($check=='dologin')?'location.href='."'".route('user.login.create')."'":'javascript:void(0)' }}" data-id="{{ $loan->getId() }}" data-title="{{ $loan->getTitle() }}" data-type="requestemail" class="{{ $check }}">Email</button>
                                        <button onclick="javascript:void(0)">Apply Online</button>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('front-end/js/loans.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        var csrf="{{ csrf_token() }}";
        var url = "{{ url('/') }}";
        Loans.initControls(csrf,url);
    });
</script>
@endpush