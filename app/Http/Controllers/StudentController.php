<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
       $student = new Student();
       $student->fname = $request->fname;
       $student->lname = $request->lname;
       $student->course = $request->course;
       $student->section = $request->section;
       $student->save();
       return back()->with('status','saved!');
    }

    public function ajaxstore(Request $request)
    {
       $student = new Student();
       $student->fname = $request->input('fname');
       $student->lname = $request->input('lname');
       $student->course = $request->input('course');
       $student->section = $request->input('section');
       $student->save();
       return back()->with('status','saved!');
    }
}
