@extends('layouts.app')
@section('page-title')
    Home | Enrollment
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 mt-4 text-gray-800 text-center">Enrollment List:{{ $enrollmentlist->count() }}</h1>

        <form class="main mb-4" action="{{ route('student.search') }}" method="POST">
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
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="m-0 font-weight-bold text-primary">
                            <a href="{{ route('enrollment.create') }}">Add New Enrollment</a>
                        </h6>
                    </div>

                    <div>
                        <a href="{{ route('enrollment.pdf') }}" class="btn btn-success">Print</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Enrollment No</th>
                                <th>Batch Id</th>
                                <th>Batch Name</th>
                                <th>Student Id</th>
                                <th>Student Name</th>
                                <th>Course Name</th>
                                <th>Course Id</th>
                                <th>Join Date</th>
                                <th>Fees</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($enrollmentlist as $enrollment)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $enrollment->enroll_no }}</td>
                                    <td>{{ $enrollment->batch_id }}</td>
                                    <td>{{ $enrollment->batch->batch_name }}</td>
                                    <td>{{ $enrollment->student_id }}</td>
                                    <td>{{ $enrollment->student->name }}</td>
                                    <td>{{ $enrollment->course->name }}</td>
                                    <td>{{ $enrollment->course->id }}</td>
                                    <td>{{ $enrollment->join_date }}</td>
                                    <td>{{ $enrollment->fees }}</td>
                                    <td>{{ $enrollment->status }}</td>
                                    <td>{{ $enrollment->created_at }}</td>
                                    <td class="d-flex">
                                        <div>
                                            <a href="{{ route('enrollment.edit', ['enrollmentlist' => $enrollment]) }}"
                                                class="btn btn-warning" style="margin-right:7px">Edit</a>
                                        </div>

                                        <form action="{{ route('enrollment.delete', ['enrollmentlist' => $enrollment]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="margin-right:7px"
                                                onclick="return confirm('Are you sure to delete this??')">Delete</button>
                                        </form>

                                        <div>
                                            <a href="{{ route('enrollment.single', ['enrollmentlist' => $enrollment]) }}"
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
