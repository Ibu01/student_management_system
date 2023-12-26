@extends('layouts.app')
@section('page-title')
    Home | Teacher
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 my-4  text-gray-800 text-center">Teacher List:{{ $teacherlist->count() }}</h1>

        <form class="main mb-4" action="{{ route('teacher.search') }}" method="POST">
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
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="{{ route('teacher.create') }}">Add New Teacher</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Teacher Name</th>
                                <th>Image</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($teacherlist as $teacher)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>
                                        <img src="{{ asset($teacher->image) }}"
                                            style="width: 55px;height:55px;border-radius:100%" alt="image">
                                    </td>
                                    <td>{{ $teacher->address }}</td>
                                    <td>{{ $teacher->mobile }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->created_at }}</td>
                                    <td class="d-flex">
                                        <div>
                                            <a href="{{ route('teacher.edit', ['teacherlist' => $teacher]) }}"
                                                class="btn btn-warning" style="margin-right:7px">Edit</a>
                                        </div>

                                        <form action="{{ route('teacher.delete', ['teacherlist' => $teacher]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="margin-right:7px"
                                                onclick="return confirm('Are you sure to delete this??')">Delete</button>
                                        </form>

                                        <div>
                                            <a href="{{ route('teacher.signle', ['teacherlist' => $teacher]) }}"
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
