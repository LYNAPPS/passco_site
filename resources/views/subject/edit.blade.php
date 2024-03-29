@extends('layouts.admin')
@section('main')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Subject form</h4>
                    <form class="forms-sample" action="{{ route('subjects.update', $subject->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Subject Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="English Language" value="{{ old('name', $subject->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="level">Select Class</label>
                            <select name="level_id" id="level_id" class="form-control">
                                <option value="">Select A Class</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}"
                                        {{ $level->id == $subject->level_id ? 'selected' : '' }}>
                                        {{ $level->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('level_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
