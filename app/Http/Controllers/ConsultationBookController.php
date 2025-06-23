<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationBook;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ConsultationBookController extends Controller
{
    //

    public function index(){
        $consultationBook = ConsultationBook::all();
        return view('consultation_booking.index', compact('consultationBook'));
    }

    public function consultationStore(Request $request){

        $request->validate([
        'fullName' => 'required|string',
        'email' => 'required',
        'phone' => 'required',
        'book_date' => 'required',
    ]);
// print_r($request->all());die;
  $booking =  ConsultationBook::create([
        'full_name' => $request->fullName,
        'email' => $request->email,
        'phone' => $request->phone,
        'book_date' => $request->book_date,
    ]);

    return response()->json([
    'success' => true,
    'message' => 'Consultation Booking Successfully!',
    'data' => $booking
], 200);

    }
}
