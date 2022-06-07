<?php

namespace App\Http\Controllers;

use App\Models\MarkSheet;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

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
        $students=Student::get()->count();
        $teachers=Teacher::get()->count();
        $mark_sheets=MarkSheet::get()->count();
        return view('home.index',compact('students','teachers','mark_sheets'));
    }
}
