<x-app-layout>
    <!-- banner area start -->
    <section class="h10_banner-area">
        <div class="h10_single-banner bg-default" data-background="{{ url('assets/frontend/img/banner/10/bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="h10_banner-content mb-60 mb-lg-0">
                            <h1 class="h10_banner-content-title">Past Questions <span>for Students</span></h1>
                            <p class="h10_banner-content-text">Explore a world of Unlimited past questions (Pasco), and
                                educational resources, all designed to help students excel in their studies.</p>

                            <div class="h10_banner-content-btn mb-60">
                                <a href="#" class="theme-btn theme-btn-10 theme-btn-10-transparent">Get Started<i
                                        class="fa-light fa-arrow-right"></i></a>
                            </div>
                            <div class="h10_banner-bottom-info">
                                <span><i class="fa-light fa-book"></i>4k + Question</span>
                                <span><i class="fa-light fa-users"></i>18k Total Student</span>
                                <span><i class="fa-light fa-file-lines"></i>100+ Courses</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-6">
                        <div class="h10_banner-right pl-110">
                            <div class="h10_banner-img">
                                {{-- <img src="{{ url('assets/frontend/img/banner/10/11.png') }}" alt=""> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner area end -->





    <section class="h8_about-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="h8_about-wrap ml-30 mb-50">
                        <div class="section-area-8 mb-35">
                            <span class="section-subtitle">Past Question Library</span>
                            <h2 class="section-title mb-20">Free Access to Our Resources</h2>
                            <p class="section-text">Prepare for the upcoming WASSCE and BECE with access to a
                                comprehensive free
                                collection of past questions and resources. </p>
                        </div>

                        <a href="{{ route('libraries') }}" class="theme-btn theme-btn-8">Explore Library<i
                                class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="h8_about-img mr-35 mb-20">
                        <div class="h8_about-img-left mb-30 w_img">
                            <div class="h8_about-img-year">
                                <h3>24 WASSCE <span>QUESTIONS</span></h3>
                            </div>
                            <img src="{{ url('assets/frontend/img/about/8/a-1.jpg') }}" alt=""
                                class="wow fadeInLeft" data-wow-delay="0.3s">
                        </div>
                        <div class="h8_about-img-right mb-30">
                            <img src="{{ url('assets/frontend/img/about/8/a-2.jpg') }}" alt=""
                                class="w-100 wow fadeInRight" data-wow-delay="0.5s">
                            <div class="h8_about-img-count">
                                <div class="h8_about-img-count-info">
                                    <h3>32K+</h3>
                                    <p>BECE QUESTIONS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="h8_about-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="h8_about-img mr-35 mb-20">
                        <div class="h8_about-img-left mb-30 w_img">
                            <div class="h8_about-img-year">
                                <h3>24 WASSCE <span>QUESTIONS</span></h3>
                            </div>
                            <img src="{{ url('assets/frontend/img/about/8/a-1.jpg') }}" alt=""
                                class="wow fadeInLeft" data-wow-delay="0.3s">
                        </div>
                        <div class="h8_about-img-right mb-30">
                            <img src="{{ url('assets/frontend/img/about/8/a-2.jpg') }}" alt=""
                                class="w-100 wow fadeInRight" data-wow-delay="0.5s">
                            <div class="h8_about-img-count">
                                <div class="h8_about-img-count-info">
                                    <h3>32K+</h3>
                                    <p>BECE QUESTIONS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="h8_about-wrap ml-30 mb-50">
                        <div class="section-area-8 mb-35">
                            <span class="section-subtitle">Coming Soon</span>
                            <h2 class="section-title mb-20">Educational Lessons</h2>
                            <p class="section-text">Explore expertly crafted lessons designed to simplify difficult
                                JHS/SHS topics. Our team of experienced tutors and college professors ensures that every
                                lesson is easy to understand and engaging.</p>

                        </div>

                        <a href="{{ route('libraries') }}" class="theme-btn theme-btn-8">Access Lession<i
                                class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- category area start -->
    <x-student-subject />
    <!-- category area end -->

</x-app-layout>
