<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessVideoUpload;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov|max:102400', // Maximum file size of 100MB
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        // Dispatch the job to process the video upload
        ProcessVideoUpload::dispatch($videoPath);

        return response()->json(['path' => $videoPath], 200);
    }

    public function index()
    {
        $courses = Course::paginate(9);

        return view('courses', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('courseDetails', compact('course'));
    }

    public function myCourses()
    {
        $courses = auth()->user()->courses;

        return view('myCourses', compact('courses'));
    }

    public function showCourse($id)
    {
        $course = Course::findOrFail($id);
        $comments = $course->comments()->with('user')->get();
        $videos = $course->videos;

        return view('showCourse', \compact('course', 'videos', 'comments'));
    }
}
