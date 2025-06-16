<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        try {
            $imagePath = null;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('blogs', 'public'); // store in blogs directory
            }

            // Save the blog to the database
            Blog::create([
                'image' => $imagePath,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'status' => 'Draft',
                'published_date' => now(),
            ]);

            return redirect()->route('blog.index')->with('success', 'Blog created successfully!');

        } catch (\Exception $e) {
            return redirect()->route('blog.index')->with('error', 'Failed to create blog. Please try again.');
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        try {
            $blog->update($request->except('image')); // update everything except image

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($blog->image) {
                    Storage::disk('public')->delete($blog->image);
                }

                $imagePath = $request->file('image')->store('blogs', 'public');
                $blog->image = $imagePath;
                $blog->save();
            }

            return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');

        } catch (\Exception $e) {
            return redirect()->route('blog.index')->with('error', 'Failed to update blog. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            // Delete the image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->delete();

            return redirect()->route('blog.index')->with('success', 'Blog deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('blog.index')->with('error', 'Failed to delete blog. Please try again.');
        }
    }

    public function toggleStatus(Blog $blog)
    {
        $blog->status = $blog->status === 'Published' ? 'Draft' : 'Published';
        $blog->save();

        return response()->json(['status' => $blog->status]);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        // Ensure image URL is returned correctly
        $blog->image = $blog->image ? asset('public/storage/' . $blog->image) : asset('public/images/default.png');

        return response()->json($blog);
    }
    public function blogs()
{
    // Show only published blogs
    $blogs = Blog::where('status', 'Published')->orderBy('published_date', 'desc')->get();

    return view('blog', compact('blogs'));
}

public function blogDetail($id)
{
    $blog = Blog::findOrFail($id);
    return view('blogdetails', compact('blog'));
}

}
