<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavouriteProgram;

class FavouriteProgramController extends Controller
{
    //

    public function index()
    {
        return FavouriteProgram::with('user')->get(); // All programs with users
    }

 public function store(Request $request)
{
    $request->validate([
        'program_id' => 'required|exists:programs,id', // optional: check if the program exists
    ]);

    $user = auth()->user();

    if (!$user) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    // Optional: prevent duplicate entries
    $alreadyExists = FavouriteProgram::where('user_id', $user->id)
                                     ->where('program_id', $request->program_id)
                                     ->exists();

    if ($alreadyExists) {
        return response()->json([
            'message' => 'Program already in favourites.'
        ], 200);
    }

    FavouriteProgram::create([
        'user_id' => $user->id,
        'program_id' => $request->program_id,
    ]);

    return response()->json([
        'message' => 'Program added to favourites.'
    ], 200);
}


    public function show($id)
    {
        return FavouriteProgram::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'program_name' => 'required|string|max:255',
        ]);

        $program = FavouriteProgram::findOrFail($id);
        $program->update(['program_name' => $request->program_name]);

        return response()->json(['message' => 'Program updated successfully']);
    }

    public function destroy($id)
    {
        $program = FavouriteProgram::findOrFail($id);
        $program->delete();

        return response()->json(['message' => 'Program deleted successfully']);
    }
}
