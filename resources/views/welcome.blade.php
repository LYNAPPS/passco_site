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

    <!-- career area start -->
    <section class="h8_career-area pt-110 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-area-8 text-center mb-50">
                        <span class="section-subtitle">Choose Your Level</span>
                        <h2 class="section-title mb-0">Choose Your Level</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-6 col-lg-6">
                    <div class="h8_career-item mb-30">
                        {{-- <div class="h8_career-item-img">
                            <img src="assets/img/career/1.png" alt="">
                        </div> --}}
                        <div class="h8_career-item-content">
                            <span>BECE</span>
                            <h4 style="margin-bottom: 2px;">Join Our UI/UX Design Course & Build Your Skill.</h4>
                            <p>Get access to bece past questions</p>
                            <a href="#" class="theme-btn theme-btn-8 h8_career-btn">Join Now<i
                                    class="fa-light fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- career area end -->


    <!-- category area start -->
    <x-student-subject />
    <!-- category area end -->

</x-app-layout>
