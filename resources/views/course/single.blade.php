@extends('layouts.app')
@section('page-title')
    Home | Course
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="text-center my-4">About Course</h2>
        <!-- DataTales Example -->
        <div class="card mb-3" style="max-width: 100%;height:500px">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($courselist->image) }}" class="img-fluid rounded-start " alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $courselist->name }}</h5>
                        <p class="card-text">{{ $courselist->about }}</p>
                        <p>{{ $courselist->duration }}</p>
                        <p><span>{{ $courselist->created_at }}</span></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
