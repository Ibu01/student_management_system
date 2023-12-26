@extends('layouts.app')
@section('page-title')
    Student | Teacher Edit
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">Edit Teacher</h1>
        @if (session('success'))
            <div class="alert alert-danger">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('teacher.update', ['teacherlist' => $teacherlist]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Teacher Name<span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="name" value="{{ $teacherlist->name }}"
                            placeholder="Enter Name">

                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Old Image</label>
                        <img src="{{ asset($teacherlist->image) }}" style="width:55px;height:55px;border-radius:100%"
                            alt="image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter address">

                        @error('address')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $teacherlist->address }}"
                            placeholder="Enter address">

                        @error('address')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mobile<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mobile" value="{{ $teacherlist->mobile }}"
                            placeholder="Enter mobile">

                        @error('mobile')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $teacherlist->email }}"
                            placeholder="Enter email">

                        @error('email')
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
