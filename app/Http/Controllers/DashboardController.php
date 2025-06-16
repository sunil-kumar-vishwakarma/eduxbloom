<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\School;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the necessary data
        $total_students = Student::count();

        // Count the total number of enrollments (new or total, adjust if needed)
        $new_enrollments = Enrollment::count(); // Modify this if you need to filter new enrollments specifically

        // Count the total number of registered schools
        $registered_schools = School::count();

        // Count the number of active courses
        $active_courses = Course::count();

        // Pass the data to the view
        return view('admin.dashboard', [
            'total_students' => $total_students,
            'new_enrollments' => $new_enrollments,
            'registered_schools' => $registered_schools,
            'active_courses' => $active_courses,
        ]);
    }
}
