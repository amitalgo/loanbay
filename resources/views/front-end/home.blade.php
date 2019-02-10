@extends('front-end.layouts.frontlayout')

@section('content')
    <div class="slide-one-item home-slider owl-carousel">
        @include('front-end.include.banner-area')
    </div>

    {{--About Us--}}
    <div class="site-section border-bottom bg-light py-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5 py-5" data-aos="fade" data-aos-delay="0">
                    <h2>About Our Company</h2>
                    <img class="mb-5" src="{{ asset('front-end/images/bdr-botm.png') }}"/>
                    <p class="mb-5">
                        {!! \Illuminate\Support\Str::words($about->getContent(), 40,' ...')!!}
                    </p>
                    <p><a href="{{ route('about-us') }}" class="btn btn-outline-primary btn-sm rounded-0 p-2 px-4">Read More</a></p>
                </div>
                <div class="col-lg-6 col-12 mb-2" data-aos="fade" data-aos-delay="0">
                    <div class="col-12 col-lg-6 offer-one" data-aos="fade" data-aos-delay="100">
                        <div class="mr-3">
                            <img src="{{ asset('front-end/images/personal-loan.png') }}" alt="home-loan"/>
                        </div>
                        <div class="">
                            <h2 class="text-black">8.96%</h2> <strong class="text-black">Personal Loans</strong>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 offer-one offer-two" data-aos="fade" data-aos-delay="200">
                        <div class="mr-3">
                            <img src="{{ asset('front-end/images/car-loan.png') }}" alt="car-loan"/>
                        </div>
                        <div class="">
                            <h2 class="with-colr">6.70%</h2> <strong class="with-colr">Car Loans</strong>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 offer-one offer-three" data-aos="fade" data-aos-delay="400">
                        <div class="mr-3">
                            <img src="{{ asset('front-end/images/home-loan.png') }}" alt="home-loan"/>
                        </div>
                        <div class="">
                            <h2 class="with-colr">3.74%</h2> <strong class="with-colr">Home Loans</strong>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-12 offer-one" data-aos="fade" data-aos-delay="600">
                        <div class="mr-3">
                            <img src="{{ asset('front-end/images/credit-laoan.png') }}" alt="credit-laoan"/>
                        </div>
                        <div class="">
                            <h2 class="text-black">9.00%</h2> <strong class="text-black">Credit card</strong>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{--Services--}}
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-12 text-center">
                    <h2 class="text-black">Our Services</h2>
                    <img class="center" src="{{ asset('front-end/images/bdr-botm-center.png') }}" alt="bdr-botm-center">
                </div>
                <div class="col-md-10 text-center">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-section aos-animate">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="owl-carousel owl-theme">
                    @foreach($cpts as $cpt)
                    @if($cpt->getSlug()=='services')
                    @if($cpt->getCpt())
                    @foreach($cpt->getCpt() as $cpiuis)
                        @if($cpiuis->getParent()==null)
                        <div class="item">
                            <div class="service-tab">
                                <img src="{{ asset($cpiuis->getFeaturedImage()) }}" alt="{{ $cpiuis->getTitle() }}">
                                <h3>{{ $cpiuis->getTitle() }}</h3>
                                <p>{!! \Illuminate\Support\Str::words($cpiuis->getDescription(), 50,' ...')!!}</p>
                                <a href="{{ route('loan-detail',['slug'=>$cpiuis->getSlug()]) }}">Read more...</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    @endif
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    {{--How it works--}}
    <div class="container" data-aos="fade-up">
        <div class="hand"></div>
        <div class="work-section">
            <h2>How it works</h2>
            <img class="center" src="{{ asset('front-end/images/bdr-botm-center.png') }}" alt="bdr-botm-center">
            <div class="col-lg-12 col-xs-12">
                <div class="col-lg-3 col-12">
                    <div class="work-tab">
                        <div class="inner-triangle">
                            <div class="inner-triangle-text">1</div>
                        </div>
                        <h3>Apply Online</h3>
                        <p>Suspendisse accumsan imperdue ligula dignissim sit amet vestibulum</p>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="work-tab">
                        <div class="inner-triangle">
                            <div class="inner-triangle-text">2</div>
                        </div>
                        <h3>Meet with LoanBay</h3>
                        <p>Suspendisse accumsan imperdue ligula dignissim sit amet vestibulum</p>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="work-tab">
                        <div class="inner-triangle">
                            <div class="inner-triangle-text">3</div>
                        </div>
                        <h3>Documention</h3>
                        <p>Suspendisse accumsan imperdue ligula dignissim sit amet vestibulum</p>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="work-tab">
                        <div class="inner-triangle">
                            <div class="inner-triangle-text">4</div>
                        </div>
                        <h3>Progress Reports</h3>
                        <p>Suspendisse accumsan imperdue ligula dignissim sit amet vestibulum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="site-section partner">
        <div class="container">
            <h2>We working with right partners.</h2>
            <div><img class="center" src="{{ asset('front-end/images/bdr-botm-center.png') }}" alt="bdr-botm-center"></div>
            <div class="center slider">
                @foreach($cpts as $cpt)
                    @if($cpt->getSlug()=='partners')
                        @if($cpt->getCpt())
                            @foreach($cpt->getCpt() as $cpiuis)
                                <div>
                                    <img class="center" src="{{ asset($cpiuis->getFeaturedImage()) }}" alt="bdr-botm-center">
                                </div>
                            @endforeach
                        @endif
                    @endif
                @endforeach
            </div>
        </div>


    </div>


@endsection