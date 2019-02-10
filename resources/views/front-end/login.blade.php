@extends('front-end.layouts.frontlayout')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <!----------------Form Start-------------------------->
            <div class="row">

                <div class="col-lg-6">
                    <h2 class="text-black">Login From</h2>
                    <img class="center mb-5" src="{{ asset('front-end/images/bdr-botm-center.png') }}" alt="bdr-botm-center">
                    <div class="clearfix"></div>
                    <form action="{{ route('user.login.verify') }}" method="post" class="">
                        @csrf()
                        <div class="row form-group">
                            <div class="col-md-8">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8">
                                <label class="font-weight-bold" for="email">Password</label>
                                <input type="password" id="pass" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        {{--<div class="custom-control mb-3 custom-checkbox custom-control-inline">--}}
                            {{--<input type="checkbox" class="custom-control-input" id="defaultInline1">--}}
                            {{--<label class="custom-control-label" for="defaultInline1">Remember me</label>--}}
                        {{--</div>--}}
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Login" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                    @if($errors->any())
                    <span style="color:red;border:1px solid red;border-radius:5px;padding:9px;">Invalid Credential. Please Try Again</span>@endif
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('front-end/images/Converted.png') }}" alt="Converted">
                </div>
            </div>
        </div>
    </div>
@endsection