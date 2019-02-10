{{--<form method="post" action="{{ route('user.register.store') }}" enctype="multipart/form-data">--}}
{{--@csrf()--}}
    {{--<input type="text" placeholder="FirstName" name="firstName"><br>--}}
    {{--<input type="text" placeholder="LastName" name="lastName"><br>--}}
    {{--<input type="text" placeholder="Email" name="email"><br>--}}
    {{--<input type="text" placeholder="mobile" name="contactNumber"><br>--}}
    {{--<input type="text" placeholder="location" name="location"><br>--}}
    {{--<input type="file" name="image"><br>--}}
    {{--<input type="text" placeholder="aadharNo" name="aadhar"><br>--}}
    {{--<input type="text" placeholder="panNo" name="pan"><br>--}}
    {{--<input type="text" placeholder="address" name="address"><br>--}}
    {{--<input type="text" placeholder="state" name="state"><br>--}}
    {{--<input type="password" placeholder="password" name="password"><br>--}}
    {{--<input type="submit" value="Submit">--}}
{{--</form>--}}

@extends('front-end.layouts.frontlayout')

@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <!----------------Form Start-------------------------->
            <div class="row">

                <div class="col-lg-6">
                    <h2 class="text-black">Register Form</h2>
                    <img class="center mb-5" src="{{ asset('front-end/images/bdr-botm-center.png') }}" alt="bdr-botm-center">
                    <div class="clearfix"></div>
                    <form action="{{ route('user.register.store') }}" method="post" id="register">
                        @csrf()
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">First Name</label>
                                <input type="text" id="firstName" class="form-control" name="firstName" placeholder="First Name">
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Last Name</label>
                                <input type="text" id="lastName" class="form-control" name="lastName" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-6">
                                <label class="font-weight-bold" for="email">Mobile No</label>
                                <input type="text" id="contactNumber" class="form-control" name="contactNumber" placeholder="Mobile No">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label class="font-weight-bold" for="email">Pan Card</label>
                                <input type="text" id="pan" class="form-control" name="pan" placeholder="Pan no">
                            </div>
                            <div class="col-md-6">
                                <label class="font-weight-bold" for="email">Date of Birth</label>
                                <input  class="form-control" id="dob" type="text" name="dob" placeholder="DD-MM-YYYY">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label class="font-weight-bold" for="email">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>
                            <div class="col-md-6">
                                <label class="font-weight-bold" for="email">Confirm Password</label>
                                <input  class="form-control" id="cpass" type="password" name="cpass" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Register" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('front-end/images/Converted.png') }}" alt="Converted">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('front-end/js/register.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        Register.initControls();
    });
</script>
@endpush