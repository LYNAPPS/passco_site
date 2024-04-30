<x-app-layout>
    <!-- category area start -->
    <section class="h4_category-area pt-50 pb-110">
        <div class="container">
            <div class="row align-items-end mb-10">
                <div class="col-md-9">
                    <div class="section-area-3">
                        <span class="section-subtitle">{{ $category->examType->short_name }}
                            {{ $category->name }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="h3_category-section-button mb-40 text-md-end">

                    </div>
                </div>
            </div>

            <div class="row mb-50">

                <form class="forms-sample" id="filterForm">

                    @csrf
                    <div class="row">
                        <input type="hidden" value="{{ $id }}" name="category_id" id="category_id">
                        <div class="form-group col-sm-3 col-6">
                            <label for="exam_year">Select Year</label>
                            <select name="exam_year" id="exam_year" class="form-control" required>
                                <option value="">Select Year</option>
                                @php
                                    $currentYear = now()->year;
                                    $startYear = 2015;
                                @endphp
                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>

                        </div>

                        <div class="form-group col-sm-3 col-6">
                            <label for="exam">Select Subject</label>
                            <select name="subject_id" id="subject_id" class="form-control" required>
                                <option value="">Select A Subject</option>
                                @if ($subjects->isEmpty())
                                    <option value="">No Subjects Available</option>
                                @else
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                        </div>



                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>




            <div id="quiz-container" class="row">


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

    @push('scripts')
        <script>
            function fetchFilteredResources() {

                const id = {{ $id }};
                const url = `/load-initial-resources?id=${id}`; // Send ID as a query parameter


                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('quiz-container').innerHTML = data.html;
                    })
                    .catch(error => console.error('Error fetching quizzes:', error));
            }
            document.addEventListener('DOMContentLoaded', function() {
                fetchFilteredResources();
                document.getElementById('searchButton').addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default form submission
                    // document.querySelector('form').reset();
                    fetchFilteredResources();
                });
            });
        </script>


        <script>
            document.getElementById('exam_year').addEventListener('change', fetchResources);
            document.getElementById('subject_id').addEventListener('change', fetchResources);
            // document.getElementById('category_id').addEventListener('change', fetchResources);

            function fetchResources() {
                const selectedYear = document.getElementById('exam_year').value;
                const selectedSubjectId = document.getElementById('subject_id').value;
                const categoryID = document.getElementById('category_id').value;

                fetch(
                        `/filter-resources?exam_year=${selectedYear}&subject_id=${selectedSubjectId}&category_id=${categoryID}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('quiz-container').innerHTML = data.html;
                    })
                    .catch(error => {
                        console.error('Error fetching lectures:', error);
                    });
            }

            // Fetch lectures when the page loads
            fetchResources();
        </script>
    @endpush
</x-app-layout>
