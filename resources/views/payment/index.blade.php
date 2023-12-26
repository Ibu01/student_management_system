@extends('layouts.app')
@section('page-title')
    Home | Payment
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 my-4  text-gray-800 text-center">Payment</h1>

        <form class="main mb-4" action="{{ route('batch.search') }}" method="POST">
            @csrf
            @method('GET')
            <div class="input-group">
                <input type="search" class="form-control" name="search" value="" placeholder="Search here">
                <div>
                    <button class="btn btn-secondary"
                        style="background-color: #f26522; border-color:#f26522;margin-right:10px "><i
                            class="fa fa-search"></i>Search</button>
                </div>

                <div>
                    <a href="">
                        <button class="btn btn-primary" type="button">Reset</button>
                    </a>
                </div>

            </div>

        </form>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session('message'))
                    <div class="alert alert-danger">
                        <h6>{{ session('message') }}</h6>
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a href="{{ route('payment.create') }}">Make Payment</a>
                    </h6>
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a href="{{ route('enrollment.create') }}">Enrollment Now</a>
                    </h6>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Enrollment Id</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $payment->enrollment->id }}</td>
                                    <td>{{ $payment->enrollment->fees }}</td>
                                    <td>{{ $payment->paid_date }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                    <td class="d-flex">
                                        <div>
                                            <a href="{{ route('payment.edit', ['payments' => $payment]) }}"
                                                class="btn btn-warning" style="margin-right:7px">Edit</a>
                                        </div>

                                        <form action="{{ route('payment.delete', ['payments' => $payment]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="margin-right:7px"
                                                onclick="return confirm('Are you sure to delete this??')">Delete</button>
                                        </form>

                                        <div>
                                            <a href="{{ route('payment.single', ['payments' => $payment]) }}"
                                                style="margin-right:7px" class="btn btn-dark">
                                                View
                                            </a>
                                        </div>

                                        <div>
                                            <a href="{{ route('payment.makepdf', ['payments' => $payment]) }}"
                                                class="btn btn-success">
                                                Print
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
