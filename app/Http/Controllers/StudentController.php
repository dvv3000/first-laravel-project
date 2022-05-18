<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{   
    
    public function index()
    {
        $students = Student::query()->get();

        return view('student.index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {

        // dd($request->except('_token'));
        // $student = new Student();
        // $student->fill($request->except('_token'));
        // $student->save();
        Student::create($request->except('_token'));

        return redirect()->route('student.index');
    }

    public function destroy(Student $student)
    {
        // dd($student);
        $student->delete();

        return redirect()->route('student.index');
    }

    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, Student $student) {
        $student->update($request->except('_token', '_method'));

        return redirect()->route('student.index');
    }
}
