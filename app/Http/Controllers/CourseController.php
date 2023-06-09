<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(): View|Application|Factory
    {
        return view('courses.index');
    }

    public function create(){
        return view('courses.create');
    }
    public function edit(){
        return view('courses.edit');
    }
    public function show($id){
        $course = Course::with('curriculums')->where('id', $id)->first();
        return view('courses.show', compact('course'));
    }
}
