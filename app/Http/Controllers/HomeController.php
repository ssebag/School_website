<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mark;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function showMark($id){
        $student=Student::where('user_id',$id)->first();
        $allMarks=Mark::where('student_id',$student->id)->get();
        return view ('user.showMark',compact('allMarks'));
    }
}
