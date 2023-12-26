@extends('layouts.app')
@section('page-title')
    Home | Batch
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="text-center my-4">About Batch</h2>
        <!-- DataTales Example -->
        <div class="card mb-3" style="max-width: 100%;height:500px">
            <div class="text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $batchlist->batch_name }}</h5>
                    <p class="card-text">{{ $batchlist->course_id }}</p>
                    <p>{{ $batchlist->start_date }}</p>
                    <p><span>{{ $batchlist->created_at }}</span></p>
                </div>
            </div>
        </div>

    </div>
@endsection
