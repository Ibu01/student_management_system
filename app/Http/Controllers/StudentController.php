<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $studentlist = Student::latest()->get();
        return view('student.index',['studentlist'=>$studentlist]);
    }

    public function create()  {
        return view('student.create');
    }

    public function store(Request $request) {
         $request->validate([
            'name'=>'required',
            'address'=>'nullable',
            'mobile'=>'required',
            'email'=>'nullable | unique:students,email',
        ]);

        $studentlist = new Student;

        $studentlist->name = $request->name;
        $studentlist->address = $request->address;
        $studentlist->mobile = $request->mobile;
        $studentlist->email = $request->email;

        $studentlist->save();

        return redirect(route('student.index'))->with('message','Student added successfully!!');
    }

    public function delete(Student $studentlist) {
        $studentlist->delete();
        return redirect()->back()->with('message','Student deleted success !!!');
    }

    public function edit(Student $studentlist) {
        return view('student.edit',['studentlist'=>$studentlist]);
    }

    public function update(Request $request, Student $studentlist)  {
        $request->validate([
            'name'=>'required',
            'address'=>'nullable',
            'mobile'=>'required',
            'email'=>'nullable',
        ]);

        $studentlist->name = $request->name;
        $studentlist->address = $request->address;
        $studentlist->mobile = $request->mobile;
        $studentlist->email = $request->email;

        $studentlist->save();

        return redirect(route('student.index'))->with('message','Student updated successfully!!');
    }

    public function search(Request $request)  {
        $searchtext = $request->search;
        $studentlist = Student::where('name','LIKE',"%$searchtext%")->get();
        return view('student.index',['studentlist'=>$studentlist,'searchtext'=>$searchtext]);
    }

    public function showsingle(Student $studentlist)  {
        return view('student.single',['studentlist'=>$studentlist]);
    }
}
