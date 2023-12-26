<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()  {
        $teacherlist = Teacher::latest()->get();
        return view('teacher.index',['teacherlist'=>$teacherlist]);
    }

    public function create()  {
        return view('teacher.create');
    }

    public function store(Request $request)  {
        $request->validate([
            'name'=>'required',
            'image'=>'nullable',
            'address'=>'nullable',
            'mobile'=>'required',
            'email'=>'nullable | unique:teachers,email',
        ]);

        $teacherlist = new Teacher;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imagename = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imagename);
            $imageurl = 'images/' . $imagename;
            $teacherlist->image = $imageurl;
        }
        
        $teacherlist->name = $request->name;
        $teacherlist->address = $request->address;
        $teacherlist->mobile = $request->mobile;
        $teacherlist->email = $request->email;

        $teacherlist->save();

        return redirect(route('teacher.index'))->with('message','Teacher created successfullyy !!!');
    }

    public function delete(Teacher $teacherlist)  {
        $teacherlist->delete();
        return redirect(route('teacher.index'))->with('message','Teacher deleted successfullyy !!!');
    }

    public function signleteacher(Teacher $teacherlist)  {
       return view('teacher.single',['teacherlist'=>$teacherlist]);
    }
    
    public function edit(Teacher $teacherlist)  {
        return view('teacher.edit',['teacherlist'=>$teacherlist]);
    }

    public function update(Request $request,Teacher $teacherlist)  {
         $request->validate([
            'name'=>'required',
            'image'=>'nullable',
            'address'=>'nullable',
            'mobile'=>'required',
            'email'=>'nullable',
        ]);

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imagename);
        $imageurl = 'images/' . $imagename;
        $teacherlist->image = $imageurl;
       }
        
        $teacherlist->name = $request->name;
        $teacherlist->address = $request->address;
        $teacherlist->mobile = $request->mobile;
        $teacherlist->email = $request->email;

        $teacherlist->save();

        return redirect(route('teacher.index'))->with('message','Teacher update successfullyy !!!');
    }

    // public function search(Request $request)  {
    //     $searchtext = $request->search;
    //     $teacherlist = Teacher::where('name','LIKE',"%$searchtext%")->get();
    //     return redirect(route('teacher.index',['teacherlist'=>$teacherlist,'searchtext'=>$searchtext]));
    // }

     public function search(Request $request)  {
        $searchtext = $request->search;
        $teacherlist = Teacher::where('name','LIKE',"%$searchtext%")->get();
        return view('teacher.index',['teacherlist'=>$teacherlist,'searchtext'=>$searchtext]);
    }
}
