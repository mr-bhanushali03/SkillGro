<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function Categories()
    {
        return Category::all();
    }

    public function courses()
    {
        $data = [
            'Title' => 'Courses',
            'Categories' => $this->Categories(),
            'courses' => Course::where('user_id', auth()->user()->id)->paginate(8),
        ];
        return view('dashboard.courses', $data);
    }

    function addCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:250',
            'level' => 'required|string|max:250',
            'actualPrice' => 'required|numeric',
            'sellingPrice' => 'required|numeric',
            'category' => 'required|string|max:250',
            'description' => 'required|string',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'curriculumTitle' => 'required|string|max:250',
            'curriculumDescription' => 'required|string',
            'user_id' => 'required|numeric',
        ]);

        // Validate tutorial titles
        $tutorialTitles = collect($request->all())->filter(fn($value, $key) => preg_match('/^tutorialsTitle\d+$/', $key))->toArray();
        $tutorailTitlesValidates = collect()->keys()->mapWithKeys(fn($key) => [$key => 'required|string|max:250'])->toArray();
        $tutorialTitleValidate = Validator::make($tutorialTitles, $tutorailTitlesValidates);

        // Validate tutorial files
        $tutorailCollection = collect($request->all())->filter(fn($value, $key) => preg_match('/^tutorials\d+$/', $key));
        foreach ($tutorailCollection as $key => $files) {
            $tutorials = Validator::make(
                [$key => $files],
                [$key . '.*' => 'required|file|mimes:pdf,doc,docx|max:2048'], // Adjust file validation rules as needed
            );
        }

        $data = [];
        foreach ($tutorialTitles as $key => $title) {
            // Extract the numeric part from the key
            preg_match('/\d+$/', $key, $titleKey);
            $titleNumeric = $titleKey[0];

            $tutorialData = [];
            foreach ($tutorailCollection as $collectionKey => $file) {
                // Extract the numeric part from the collection key
                preg_match('/\d+$/', $collectionKey, $fileKey);
                $fileNumeric = $fileKey[0];

                // Check if the numeric part of the collection key matches the current key
                if ($titleNumeric == $fileNumeric) {
                    // Move the file to the public storage folder
                    foreach ($file as $index => $uploadedFile) {
                        $path = $uploadedFile->storeAs('public/tutorial_files', $uploadedFile->getClientOriginalName());
                        $tutorialData[$collectionKey] = $path;
                    }
                }
            }

            // Assign the tutorial title and its corresponding files to the data array
            $data['tutorials'][$key] = ['title' => $title, 'files' => $tutorialData];
            $jsonData = json_encode($data);
        }

        // Merge tutorial data with other request data
        $data = [
            'title' => $request->title,
            'level' => $request->level,
            'actualPrice' => $request->actualPrice,
            'sellingPrice' => $request->sellingPrice,
            'category' => $request->category,
            'description' => $request->description,
            'banner' => $request->file('banner')->storeAs('public/tutorial_banners', $request->file('banner')->getClientOriginalName()),
            'curriculumTitle' => $request->curriculumTitle,
            'curriculumDescription' => $request->curriculumDescription,
            'user_id' => $request->user_id,
            'tutorials' => $jsonData,
        ];

        // Now $data contains all merged data, including tutorial titles, files, and other request data
        Course::create($data);
        return redirect()->route('course')->withSuccess('You have successfully added a new Course!');
    }

    function delete($id)
    {
        Course::where('id', $id)->delete();
        return redirect()->route('course')->withSuccess('You have successfully deleted a Course!');
    }

    function deleteAll()
    {
        Course::where('user_id', auth()->user()->id)->delete();
        return redirect()->route('course')->withSuccess('You have successfully deleted all Courses!');
    }

    function courseDetail($title)
    {
        $title = decrypt($title);
        $data = [
            'Title' => 'Course Detail',
            'Course' => Course::where('title', $title)->first(),
        ];
        return view('dashboard.courseDetail', $data);
    }

    function enrollCourse()
    {
        $studentCourse = StudentCourse::where('student_id', auth()->user()->id)
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->join('users as student', 'student_courses.student_id', '=', 'student.id')
            ->join('users as instructor', 'student_courses.instructor_id', '=', 'instructor.id')
            ->select('student_courses.*', 'courses.*', 'student.*', 'instructor.*')
            ->get();

        $data = [
            'Title' => 'Enroll Course',
            'courses' => $studentCourse,
        ];
        
        return view('dashboard.enrollCourse', $data);
    }
}
