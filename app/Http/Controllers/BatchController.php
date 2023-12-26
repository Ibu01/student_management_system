<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()  {
        $batchlist = Batch::latest()->get();
        return view('batch.index',['batchlist'=>$batchlist]);
    }

    public function create() {
        $courses = Course::latest()->get();
        $teachers = Teacher::latest()->get();
        return view('batch.create',['courses'=>$courses,'teachers'=>$teachers]);
    }

    public function store(Request $request) {
        $request->validate([
            'batch_name'=>'required',
            'course_id'=>'required',
            'start_date'=>'required',
            'teacher_id'=>'nullable',
        ]);

        $batchlist = new Batch;

        $batchlist->batch_name = $request->batch_name;
        $batchlist->course_id = $request->course_id;
        $batchlist->start_date = $request->start_date;
        $batchlist->teacher_id = $request->teacher_id;

        $batchlist->save();

        return redirect(route('batch.index'))->with('message','Batch created !!');
    }

    public function single(Batch $batchlist)  {
        return view('batch.single',['batchlist'=>$batchlist]);
    }

    public function delete(Batch $batchlist)  {
        $batchlist->delete();
        return redirect(route('batch.index'))->with('message','Batch Deleted !!');
    }

    public function edit(Batch $batchlist)  {
        $courses = Course::latest()->get();
        $teachers = Teacher::latest()->get();
        return view('batch.edit',['batchlist'=>$batchlist ,'courses'=>$courses,'teachers'=>$teachers]);
    }

    public function update(Request $request,Batch $batchlist) {

         $request->validate([
            'batch_name'=>'required',
            'course_id'=>'required',
            'start_date'=>'required',
            'teacher_id'=>'nullable',
        ]);

        $batchlist->batch_name = $request->batch_name;
        $batchlist->course_id = $request->course_id;
        $batchlist->start_date = $request->start_date;
        $batchlist->teacher_id = $request->teacher_id;
        $batchlist->save();

        return redirect(route('batch.index'))->with('message','Batch Updated !!');
    }

      public function search(Request $request)  {
        $searchtext = $request->search;
        $batchlist = Batch::where('batch_name','LIKE',"%$searchtext%")
                            ->get();
        return view('batch.index',['batchlist'=>$batchlist,'searchtext'=>$searchtext]);
    }
}
