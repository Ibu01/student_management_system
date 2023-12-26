@extends('layouts.app')
@section('page-title')
    Home | Course Edit
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">Edit Course</h1>
        @if (session('success'))
            <div class="alert alert-danger">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('course.update', ['courselist' => $courselist]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Course Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $courselist->name }}"
                            placeholder="Enter Name">

                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Old Image</label>
                        <img src="{{ asset($courselist->image) }}" class="form-control"
                            style="width:55px;height:55px;border-radius:100%" alt="image">

                        @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">

                        @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Syllabus</label>
                        <input type="text" class="form-control" name="syllabus" value="{{ $courselist->syllabus }}"
                            placeholder="Enter syllabus">

                        @error('syllabus')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duration<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="duration" value="{{ $courselist->duration }}"
                            placeholder="Enter duration">

                        @error('duration')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">All Seat<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="all_seat" value="{{ $courselist->all_seat }}"
                            placeholder="Enter seat">

                        @error('all_seat')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">About</label>
                        <textarea class="form-control" name="about">{{ $courselist->about }}</textarea>
                        @error('about')
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
