<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{

    public function edit_privacy()
    {
        $PageList = Page::where('type','privacy')->first();
        return view('pages.edit_privacy', compact('PageList'));
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        try {
            $type = $request->type;
             $Page = Page::where('type',$type)->first();
             
             if(!empty($Page)){
                $Page->title = $request->title;
                $Page->description = $request->description;
                $Page->save();
             }else{

            Page::create([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
            ]);

            }
             
            //  print_r($request->all());die;
            return redirect()->route('pages.edit_privacy')->with('success', 'Page Update successfully!');

        } catch (\Exception $e) {
            return redirect()->route('pages.edit_privacy')->with('error', 'Failed to create Page. Please try again.');
        }
    }

    public function edit_term()
    {
        $PageList = Page::where('type','term')->first();
        return view('pages.edit_term', compact('PageList'));
    }

    public function storeTerm(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        try {
            $type = $request->type;
             $Page = Page::where('type',$type)->first();
             
             if(!empty($Page)){
                $Page->title = $request->title;
                $Page->description = $request->description;
                $Page->save();
             }else{

            Page::create([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
            ]);

            }
             
            //  print_r($request->all());die;
            return redirect()->route('pages.edit_term')->with('success', 'Page Update successfully!');

        } catch (\Exception $e) {
            return redirect()->route('pages.edit_term')->with('error', 'Failed to create Page. Please try again.');
        }
    }
}
