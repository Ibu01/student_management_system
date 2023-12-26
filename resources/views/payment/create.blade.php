@extends('layouts.app')
@section('page-title')
    Home | Make Payment
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">Make Payment</h1>
        @if (session('success'))
            <div class="alert alert-danger">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('payment.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Enrollment Id<span class="text-danger">*</span></label>
                        {{-- <input type="text" class="form-control" name="course_id" value=""
                            placeholder="Enter course name"> --}}

                        <select name="enrollment_id" id="" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($enrollments as $enroll)
                                <option value="{{ $enroll->id }}">{{ $enroll->id }}</option>
                            @endforeach

                        </select>

                        @error('enrollment_id')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Payment Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="paid_date" value="{{ old('paid_date') }}"
                            placeholder="Enter paid date">

                        @error('paid_date')
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
