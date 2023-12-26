@extends('layouts.app')
@section('page-title')
    Home | Batch
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 my-4  text-gray-800 text-center">Batch List</h1>

        <form class="main mb-4" action="{{ route('batch.search') }}" method="POST">
            @csrf
            @method('GET')
            <div class="input-group">
                <input type="search" class="form-control" name="search" value="{{ $searchtext ?? '' }}"
                    placeholder="Search here">
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
                        <a href="{{ route('batch.create') }}">Add New Batch</a>
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
                                <th>Batch Name</th>
                                <th>Course Name</th>
                                <th>Teacher Name</th>
                                <th>Remaining Seat</th>
                                <th>Start Date</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($batchlist as $batch)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $batch->batch_name }}</td>
                                    <td>{{ optional($batch->course)->name }}</td>
                                    <td>{{ optional($batch->teacher)->name }}</td>
                                    <td>{{ optional($batch->course)->total_seat }}</td>
                                    <td>{{ $batch->start_date }}</td>
                                    <td>{{ $batch->created_at }}</td>
                                    <td class="d-flex">
                                        <div>
                                            <a href="{{ route('batch.edit', ['batchlist' => $batch]) }}"
                                                class="btn btn-warning" style="margin-right:7px">Edit</a>
                                        </div>

                                        <form action="{{ route('batch.delete', ['batchlist' => $batch]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="margin-right:7px"
                                                onclick="return confirm('Are you sure to delete this??')">Delete</button>
                                        </form>

                                        <div>
                                            <a href="{{ route('batch.single', ['batchlist' => $batch]) }}"
                                                class="btn btn-dark">
                                                View
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
