@extends('layouts.admin')
@section('main')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Classes form</h4>
                    <form class="forms-sample" action="{{ route('levels.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exam">Select Exams Type</label>
                            <select name="exam_id" id="exam_id" class="form-control">
                                <option value="">Select A Class</option>
                                @if ($exams->isEmpty())
                                    <option value="">No Classes Available</option>
                                @else
                                    @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subject">Select Subject</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option value="">Select A Subject</option>
                                @if ($subjects->isEmpty())
                                    <option value="">No Classes Available</option>
                                @else
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Class Name</label>
                            <input type="file" class="form-control" id="name" name="name" placeholder="JHS 1"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
