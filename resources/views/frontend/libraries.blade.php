<x-app-layout>
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

                @if ($exams->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        There are currently no exams available. Please check back later.
                    </div>
                @else
                    @foreach ($exams as $exam)
                        <div class="col-xl-6 col-lg-6">
                            <div class="h8_career-item mb-30">
                                <div class="h8_career-item-content">
                                    <span>{{ $exam->short_name }}</span>
                                    <h4 style="margin-bottom: 10px;">{{ $exam->name }}
                                    </h4>
                                    <p style="font-size: 14px;">Prepare for the upcoming
                                        <strong>{{ $exam->short_name }}</strong> with access to
                                        a comprehensive
                                        collection of past questions and resources.
                                    </p>

                                    <a href="#" class="theme-btn theme-btn-8 h8_career-btn">Join Now<i
                                            class="fa-light fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>
    <!-- career area end -->
</x-app-layout>
