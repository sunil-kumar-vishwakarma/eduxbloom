<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class PaymentController extends Controller
{
    //
    public function received(){

        $students = Student::all(); // Fetch all students from the database
      
        return view('students.index', compact('students')); // Return the view with data
   
    }

    public function failed(){

        $students = Student::all(); // Fetch all students from the database
      
        return view('students.index', compact('students')); // Return the view with data
   
    }

    public function setup(){

        $students = Student::all(); // Fetch all students from the database
      
        return view('students.index', compact('students')); // Return the view with data
   
    }
}
