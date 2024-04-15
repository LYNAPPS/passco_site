@extends('layouts.admin')
@section('main')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Subject form</h4>
                    <form class="forms-sample" action="{{ route('subjects.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="level">Select Exams Type</label>
                            <select name="exam_type_id" id="exam_type_id" class="form-control">
                                <option value="">Select Exams Type</option>
                                @if ($exams->isEmpty())
                                    <option value="">No Exams Type Available</option>
                                @else
                                    @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="name">Subject Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="English Language" value="{{ old('name') }}">
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
