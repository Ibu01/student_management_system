@extends('layouts.app')
@section('page-title')
    Home | Enrollment
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="text-center my-4">About Enrollment</h2>
        <!-- DataTales Example -->
        <div class="card mb-3" style="max-width: 100%;height:500px">
            <div class="text-center">
                <div class="card-body">
                    <h5 class="card-title">Enroll No: {{ $enrollmentlist->enroll_no }}</h5>
                    <p class="card-text">Batch Name: {{ $enrollmentlist->batch->batch_name }}</p>
                    <p>Student Name: {{ $enrollmentlist->student->name }}</p>
                    <p>Course Fee: {{ $enrollmentlist->fees }}</p>
                    <p>Payment Status: {{ $enrollmentlist->status }}</p>
                    <p><span>Start date: {{ $enrollmentlist->join_date }}</span></p>
                </div>
            </div>
        </div>

    </div>
@endsection
