@extends('layouts.app')
@section('page-title')
    Home | Enrollment Create
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">Create Enrollment</h1>
        @if (session('success'))
            <div class="alert alert-danger">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('enrollment.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Enrollment No<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="enroll_no" value="{{ old('enroll_no') }}"
                            placeholder="Enter enroll no">

                        @error('enroll_no')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Batch Name<span class="text-danger">*</span></label>
                        {{-- <input type="text" class="form-control" name="batch_id" value="{{ old('batch_id') }}"
                            placeholder="Enter batch id"> --}}

                        <select name="batch_id" id="" class="form-control">
                            <option value="">Select one</option>
                            @foreach ($batches as $batch)
                                <option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
                            @endforeach

                        </select>

                        @error('batch_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Student Name<span class="text-danger">*</span></label>
                        {{-- <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}"
                            placeholder="Enter student id"> --}}

                        <select name="student_id" id="" class="form-control">
                            <option value="">Select one</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach

                        </select>

                        @error('student_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Course Name<span class="text-danger">*</span></label>

                        <select name="course_id" id="" class="form-control">
                            <option value="">Select one</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach

                        </select>

                        @error('batch_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Join Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="join_date" value="{{ old('join_date') }}"
                            placeholder="Enter join date">

                        @error('join_date')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fees<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="fees" value="{{ old('fees') }}"
                            placeholder="Enter Fees">

                        @error('fees')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <!-- Your existing HTML code remains the same -->
@endsection
