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
                            <label for="name">Subject Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="English Language" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="level">Select Class</label>
                            <select name="level_id" id="level_id" class="form-control">
                                <option value="">Select A Class</option>
                                @if ($levels->isEmpty())
                                    <option value="">No Classes Available</option>
                                @else
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
