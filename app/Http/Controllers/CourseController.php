<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index(Request $request)
    {   
        $search = $request->get('q');
        $courses = Course::query()
        ->where('name', 'like', '%' . $search . '%')
        ->paginate(3);

        $courses->appends([
            'q' => $search,
        ]);

        return view('course.index', [
            'courses' => $courses,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(StoreRequest $request)
    {   
        
        // $course = new Course();
        // $course->fill($request->except('_token'));
        // $course->save();

        Course::create($request->except('_token'));

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(UpdateRequest $request, Course $course)
    {
        $course->update($request->except(['_token', '_method']));

        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index');
    }
}
