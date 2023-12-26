@extends('layouts.app')
@section('page-title')
    Home | Student
@endsection
@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card mb-3" style="max-width: 100%;height:500px">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $studentlist->name }}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p>{{ $studentlist->email }}</p>
                        <p>{{ $studentlist->mobile }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
