<x-app-layout>
    <!-- category area start -->
    <section class="h3_category-area pt-135 pb-110">
        <div class="container">
            <div class="row align-items-end mb-30">
                <div class="col-md-9">
                    <div class="section-area-3 mb-30">
                        <span class="section-subtitle">Resources</span>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="h3_category-section-button mb-40 text-md-end">

                    </div>
                </div>
            </div>
            <div class="row">
                @if ($resources->isEmpty())
                @else
                    @foreach ($resources as $resource)
                        <div class="col-xl-4 col-lg-6">
                            <div class="h3_category-item mb-30">
                                <div class="h3_category_inner">
                                    <div class="h3_category-item-content">
                                        <h5><a href="{{ route('submit.phone', $resource->id) }}">
                                                {{ $resource->examType->short_name }} {{ $resource->subject->name }} -
                                                {{ $resource->questionType->name }}
                                                <span style="color: red;"> ({{ $resource->exam_year }})</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="h3_category-btn">
                                        <a href="{{ route('submit.phone', $resource->id) }}"><i
                                                class="fa-light fa-download"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <style>
                    .h3_category-item {
                        padding: 20px 10px 20px 15px;
                    }

                    .h3_category-item-content a {
                        font-size: 20px;
                    }
                </style>

            </div>
        </div>
    </section>
    <!-- category area end -->
</x-app-layout>
