<?php

namespace App\Http\Controllers;

use App\Models\MarkSheet;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarkSheetController extends Controller
{
    public function index(Request $request)
    {
        $terms = [1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four'];
        $data = MarkSheet::paginate(10);
        return view('mark_sheet.index', compact('data', 'terms'));
    }
    public function create(Request $request)
    {
        $terms = [1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four'];
        $students = Student::all();
        return view('mark_sheet.create', compact('terms', 'students'));
    }
    public function edit(Request $request, $id)
    {
        $students = Student::all();
        $data = MarkSheet::findOrFail($id);
        $terms = [1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four'];
        return view('mark_sheet.edit', compact('data', 'students', 'terms', 'id'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|numeric|exists:students,id',
            'maths' => 'required|numeric|max:100',
            'science' => 'required|numeric|max:100',
            'history' => 'required|numeric|max:100',
            'term' => 'required|numeric|max:4',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->all())->withInput();
        }
        if (MarkSheet::where('student_id', $request->student_id)->where('term', $request->term)->get()->count() == 1)
            return back()->with('error', 'Mark already filed for this term.')->withInput();
        $id = MarkSheet::insertGetId([
            'student_id' => $request->student_id,
            'maths' => $request->maths,
            'science' => $request->science,
            'history' => $request->history,
            'term' => $request->term,
            'total' => $request->maths + $request->science + $request->history,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        if (is_null($id))
            return back()->with('error', 'Failed to add mark sheet.')->withInput();
        else
            return back()->with('success', 'Mark sheet added successfully.');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|numeric|exists:students,id',
            'maths' => 'required|numeric|max:100',
            'science' => 'required|numeric|max:100',
            'history' => 'required|numeric|max:100',
            'term' => 'required|numeric|max:4'
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->all());
        }
        MarkSheet::where('id', $id)->update([
            'student_id' => $request->student_id,
            'maths' => $request->maths,
            'science' => $request->science,
            'history' => $request->history,
            'term' => $request->term,
            'total' => $request->maths + $request->science + $request->history,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        return back()->with('success', 'MarkSheet updated successfully.');
    }
    public function delete($id)
    {
        MarkSheet::where('id', $id)->delete();
        return back()->with('success', 'MarkSheet deleted successfully.');
    }
}
