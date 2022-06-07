<?php

namespace App\Http\Controllers;

use App\Models\MarkSheet;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $data = Student::paginate(10);
        return view('student.index', compact('data'));
    }
    public function create(Request $request)
    {
        $genders = ['male', 'female', 'other'];
        $teachers = Teacher::all();
        return view('student.create', compact('genders', 'teachers'));
    }
    public function edit(Request $request, $id)
    {
        $data = Student::findOrFail($id);
        $genders = ['male', 'female', 'other'];
        $teachers = Teacher::all();
        return view('student.edit', compact('data', 'teachers', 'id', 'genders'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|numeric|max:100',
            'gender' => 'required|in:male,female,other',
            'teacher_id' => 'required|numeric|exists:teachers,id',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->all())->withInput();
        }
        $id = Student::insertGetId([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'teacher_id' => $request->teacher_id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        if (is_null($id))
            return back()->with('error', 'Failed to add student.')->withInput();
        else
            return back()->with('success', 'Student added successfully.');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|numeric|max:100',
            'gender' => 'required|in:male,female,other',
            'teacher_id' => 'required|numeric|exists:teachers,id',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->all())->withInput();
        }
        Student::where('id', $id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'teacher_id' => $request->teacher_id,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        return back()->with('success', 'Student updated successfully.');
    }
    public function delete($id)
    {
        Student::where('id', $id)->delete();
        MarkSheet::where('student_id', $id)->delete();
        return back()->with('success', 'Student deleted successfully.');
    }
}
