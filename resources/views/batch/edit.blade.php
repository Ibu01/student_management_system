@extends('layouts.app')
@section('page-title')
    Home | Batch Edit
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">Edit Batch</h1>
        @if (session('success'))
            <div class="alert alert-danger">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('batch.update', ['batchlist' => $batchlist]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Batch Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="batch_name" value="{{ $batchlist->batch_name }}"
                            placeholder="Enter batch name">

                        @error('batch_name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Course Name<span class="text-danger">*</span></label>

                        <select name="course_id" id="" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @if ($course->id == $batchlist->course_id) selected @endif>
                                    {{ $course->name }}</option>
                            @endforeach

                        </select>

                        @error('course_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Teacher Name<span class="text-danger">*</span></label>
                        {{-- <input type="text" class="form-control" name="course_id" value=""
                            placeholder="Enter course name"> --}}

                        <select name="teacher_id" id="" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" @if ($teacher->id == $batchlist->teacher_id) selected @endif>
                                    {{ $teacher->name }}</option>
                            @endforeach

                        </select>

                        @error('course_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label">Total Seat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="total_seat" value="{{ old('total_seat') }}"
                            placeholder="Enter batch name">

                        @error('total_seat')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div> --}}


                    <div class="mb-3">
                        <label class="form-label">Start Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="start_date" value="{{ $batchlist->start_date }}"
                            placeholder="Enter start date">

                        @error('start_date')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
