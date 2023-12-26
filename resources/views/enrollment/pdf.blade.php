<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h2>Enrollment List</h2>
            <table border="1" class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Batch Name</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Fees</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($enrollmentlist as $enrollment)
                        <tr>
                            <td>{{ $enrollment->batch->batch_name }}</td>
                            <td>{{ $enrollment->student->name }}</td>
                            <td>{{ $enrollment->course->name }}</td>
                            <td>{{ $enrollment->fees }}</td>
                            <td>{{ $enrollment->status }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
