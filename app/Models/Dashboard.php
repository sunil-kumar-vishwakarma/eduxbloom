<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\School;
use App\Models\Course;

class Dashboard extends Model
{
    public static function getDashboardData()
    {
        // Count the total number of students
        $total_students = Student::count();

        // Count the total number of new enrollments
        $new_enrollments = Enrollment::count(); // Assuming this counts all enrollments, modify if needed for "new" enrollments

        // Count the total number of registered schools
        $registered_schools = School::count();

        // Count the number of active courses
        $active_courses = Course::count();

        return [
            'total_students' => $total_students,
            'new_enrollments' => $new_enrollments,
            'registered_schools' => $registered_schools,
            'active_courses' => $active_courses,
        ];
    }
}
