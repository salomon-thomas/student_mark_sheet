<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $data = Teacher::paginate(10);
        return view('teacher.index', compact('data'));
    }
    public function create(Request $request)
    {
        return view('teacher.create');
    }
    public function edit(Request $request, $id)
    {
        $data = Teacher::findOrFail($id);
        return view('teacher.edit', compact('data', 'id'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->all())->withInput();
        }
        $id = Teacher::insertGetId(['name' => $request->name, 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()]);
        if (is_null($id))
            return back()->with('error', 'Failed to add teacher.')->withInput();
        else
            return back()->with('success', 'Teacher added successfully.');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->all())->withInput();
        }
        Teacher::where('id', $id)->update(['name' => $request->name, 'updated_at' => Carbon::now()->toDateTimeString()]);
        return back()->with('success', 'Teacher updated successfully.');
    }
    public function delete($id)
    {
        $teacher = Teacher::findOrfail($id);
        if ($teacher->students->count() > 0)
            return back()->with('error', 'There are students assigned to this teacher so not allowed to delete.');
        else {
            Teacher::where('id', $id)->delete();
            return back()->with('success', 'Teacher updated successfully.');
        }
    }
}
