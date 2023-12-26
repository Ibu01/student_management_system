<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index() {
        $enrollmentlist = Enrollment::latest()->get();
        return view('enrollment.index',['enrollmentlist'=>$enrollmentlist]);
    }

    public function single(Enrollment $enrollmentlist) {
        return view('enrollment.single',['enrollmentlist'=>$enrollmentlist]);
    }

    public function create()  {
        $students = Student::latest()->get();
        $batches = Batch::latest()->get();
        $courses = Course::latest()->get();
        return view('enrollment.create',['students'=>$students,'batches'=>$batches,'courses'=>$courses]);
    }

    public function store(Request $request) {
        $request->validate([
            'enroll_no'=>'required',
            'batch_id'=>'required',
            'student_id'=>'required',
            'course_id'=>'required',
            'join_date'=>'required|date',
            'fees'=>'nullable',
        ]);

        $enrollmentlist = new Enrollment;

        $enrollment_status = "Due";

        $enrollmentlist->enroll_no = $request->enroll_no;
        $enrollmentlist->batch_id = $request->batch_id;
        $enrollmentlist->student_id = $request->student_id;
        $enrollmentlist->course_id =  $request->course_id;
        $enrollmentlist->join_date = $request->join_date;
        $enrollmentlist->fees = $request->fees;
        $enrollmentlist->status = $enrollment_status;

        Course::where('id', $enrollmentlist->course_id)->decrement('total_seat',1);

        $enrollmentlist->save();

        return redirect(route('enrollment.index'))->with('message','Enrollment has been added');
    }

    public function delete(Enrollment $enrollmentlist)  {
        $enrollmentlist->delete();
        return redirect(route('enrollment.index'))->with('message','Enrollment has been deleted');
    }

    public function edit(Enrollment $enrollmentlist)  {
        $students = Student::latest()->get();
        $batches = Batch::latest()->get();
        $courses = Course::latest()->get();
        return view('enrollment.edit',['enrollmentlist'=>$enrollmentlist,'students'=>$students,'batches'=>$batches,'courses'=>$courses]);
    }

    public function update(Request $request,Enrollment $enrollmentlist)  {

         $request->validate([
            'enroll_no'=>'required',
            'batch_id'=>'required',
            'student_id'=>'required',
            'course_id'=>'required',
            'join_date'=>'required|date',
            'fees'=>'nullable',
        ]);

        $enrollmentlist->enroll_no = $request->enroll_no;
        $enrollmentlist->batch_id = $request->batch_id;
        $enrollmentlist->student_id = $request->student_id;
        $enrollmentlist->course_id =  $request->course_id;
        $enrollmentlist->join_date = $request->join_date;
        $enrollmentlist->fees = $request->fees;

        $enrollmentlist->save();

        return redirect(route('enrollment.index'))->with('message','Enrollment has been Update');
    }
}
