<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $courselist = Course::latest()->get();
        return view('course.index',['courselist'=>$courselist]);
    }

    public function create() {
        return view('course.create');
    }

    public function store(Request $request)  {
        $request->validate([
            'name'=>'required',
            'image'=>'nullable',
            'syllabus'=>'nullable',
            'duration'=>'required',
            'all_seat'=>'required',
            'about'=>'nullable|max:255',
        ]);

        $courselist = new Course;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imagename = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imagename) ;
            $imageurl = 'images/' . $imagename;
            $courselist->image = $imageurl;    
        }

        $courselist->name = $request->name;
        $courselist->syllabus = $request->syllabus;
        $courselist->duration = $request->duration;
        $courselist->total_seat = $request->all_seat;
        $courselist->all_seat = $request->all_seat;
        $courselist->about = $request->about;

        $courselist->save();

        return redirect(route('course.index'))->with('message','Course Created successfully...');
    }

    public function single(Course $courselist)  {
        return view('course.single',['courselist'=>$courselist]);
    }

    public function delete(Course $courselist)  {
        $courselist->delete();
        return redirect(route('course.index'))->with('message','Course deleted successfully...');
    }

    public function edit(Course $courselist) {
        return view('course.edit',['courselist'=>$courselist]);
    }

    public function update(Request $request,Course $courselist) {
       $request->validate([
            'name'=>'required',
            'image'=>'nullable',
            'syllabus'=>'nullable',
            'duration'=>'required',
            'all_seat'=>'required',
            'about'=>'nullable|max:255',
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imagename = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$imagename) ;
            $imageurl = 'images/' . $imagename;
            $courselist->image = $imageurl;    
        }

        $courselist->name = $request->name;
        $courselist->syllabus = $request->syllabus;
        $courselist->duration = $request->duration;
        $courselist->total_seat = $request->all_seat;
        $courselist->all_seat = $request->all_seat;
        $courselist->about = $request->about;

        $courselist->save();

        return redirect(route('course.index'))->with('message','Course Updated successfully...');
    }

    public function search(Request $request)  {
        $searchtext = $request->search;
        $courselist = Course::where('name','LIKE',"%$searchtext%")->get();
        return view('course.index',['courselist'=>$courselist,'searchtext'=>$searchtext]);
    }
}
