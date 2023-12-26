@extends('layouts.app')
@section('page-title')
    Home | Teacher
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="text-center my-4">Techer Details</h2>
        <!-- DataTales Example -->
        <div class="card mb-3" style="max-width: 100%;height:500px">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($teacherlist->image) }}" class="w-100" alt="image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $teacherlist->name }}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p>{{ $teacherlist->email }}</p>
                        <p>{{ $teacherlist->mobile }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
