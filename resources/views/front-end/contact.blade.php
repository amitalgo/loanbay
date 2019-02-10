@extends('front-end.layouts.frontlayout')

@section('content')
    <div class="site-blocks-cover inner-page overlay" style="background-image: url({{ asset('front-end/images/contact-banner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.79">

    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2 class="text-black">Contact Us</h2>
                    <img class="center slick-initialized slick-slider" src="{{ asset('front-end/images/bdr-botm-center.png') }}" alt="bdr-botm-center">
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">
                    <form action="{{ route('contact.send') }}" class="p-5 bg-white" id="contact" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Contact No</label>
                                <input type="text" id="contactNumber" name="contactNumber" class="form-control" placeholder="Contact No">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="message">Message</label>
                                <textarea name="message" id="message" name="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Talk to us</h3>
                        <p class="mb-4">We would be keen to talk to you. You could give us a call at 9820860978.</p>

                        <h3 class="h5 text-black mb-3">Mail us</h3>
                        <p class="mb-0 ">We would be keen to receive your email.</p>
                        <p class="mb-0">You could mail us at <a href="mailto:jatin@corpbay.co.in">jatin@corpbay.co.in</a></p>

                    </div>

                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Visit us</h3>
                        <p>We would be keen to see you in person. You could visit us at Corpbay Financial Services LLP, 2nd Floor, Raghuvanshi Mansion, Raghuvanshi Mills Compound< Lower Parel, Mumbai 400063</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('alert'))
        <?php echo "<script>";
        echo "alert('Thank you for Contacting');";
        echo "</script>"; ?>
    @endif
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('front-end/js/contact.js')}}"></script>
<script type="text/javascript">
    $('document').ready(function () {
        Contact.initControls();
    });
</script>
@endpush