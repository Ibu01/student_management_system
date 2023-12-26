@extends('layouts.app')
@section('page-title')
    Home | Enrollment
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="text-center my-4">About Payment</h2>
        <!-- DataTales Example -->
        <div class="card mb-3" style="max-width: 100%;height:500px">
            <div class="text-center">
                <div class="card-body">
                    <h5 class="card-title">Enroll No: {{ $payments->enrollment->id }}</h5>
                    <p class="card-text">Amount: {{ $payments->enrollment->fees }}</p>
                    <p>Paid Date: {{ $payments->paid_date }} </p>
                    <p>Payment Status: {{ $payments->enrollment->status }} </p>
                </div>
            </div>
        </div>

    </div>
@endsection
