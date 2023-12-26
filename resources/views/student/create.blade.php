@extends('layouts.app')
@section('page-title')
    Student | Student Create
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">Create Student</h1>
        @if (session('success'))
            <div class="alert alert-danger">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Student Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            placeholder="Enter Name">

                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                            placeholder="Enter address">

                        @error('address')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mobile<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"
                            placeholder="Enter mobile">

                        @error('mobile')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="Enter email">

                        @error('email')
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
@endsection
