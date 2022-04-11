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
        $student = new Student();
        $student->first_name = $request->get('firstName');
        $student->last_name = $request->get('lastName');
        $student->birthday = $request->get('birthday');
        $student->gender = $request->get('gender');

        $student->save();

        return redirect()->route('student.index');
    }
}
