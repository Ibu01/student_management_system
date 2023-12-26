@extends('layouts.app')
@section('page-title')
    Home | Student
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 mt-4 text-gray-800 text-center">Student List:{{ $studentlist->count() }}</h1>

        <form class="main mb-4" action="{{ route('student.search') }}" method="POST">
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
                    <a href="{{ route('student.index') }}">
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
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="{{ route('student.create') }}">Add New Student</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Student Name</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($studentlist as $student)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->mobile }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->created_at }}</td>
                                    <td class="d-flex">
                                        <div>
                                            <a href="{{ route('student.edit', ['studentlist' => $student]) }}"
                                                class="btn btn-warning" style="margin-right:7px">Edit</a>
                                        </div>

                                        <form action="{{ route('student.delete', ['studentlist' => $student]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="margin-right:7px"
                                                onclick="return confirm('Are you sure to delete this??')">Delete</button>
                                        </form>

                                        <div>
                                            <a href="{{ route('student.showsingle', ['studentlist' => $student]) }}"
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
