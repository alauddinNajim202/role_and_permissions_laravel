<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all articles
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        // Pass the articles to the view for display
        return view('backend.article.index', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());  // Uncommented to display all request data in the console
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Uncommented image validation
        ]);

        // Get image file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Generate unique filename
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // Move the file to the specified location
            $image->move(public_path('uploads/articles'), $filename);
            $imagePath = 'uploads/articles/' . $filename;
        } else {
            $imagePath = null; // Handle the case if no image is uploaded
        }

        // Create a new article
        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->title = $request->input('title');
        $article->content = $request->input('description');
        $article->author = $request->input('author');
        $article->image = $imagePath;
        $article->save();

        // Redirect to the article index page
        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // find article
        $article = Article::find($id);
        // Pass the article to the view for editing
        return view('backend.article.edit', compact('article'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // dd($request->all());  // Uncommented to display all request data in the console
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',

        ]);

        // Get image file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Generate unique filename
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // Move the file to the specified location
            $image->move(public_path('uploads/articles'), $filename);
            $imagePath = 'uploads/articles/' . $filename;
        } else {
            $imagePath = null; // Handle the case if no image is uploaded
        }
        // Update the article
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->content = $request->input('description');
        $article->author = $request->input('author');
        $article->image = $imagePath;
        $article->save();

        // Redirect to the article index page
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the article
        $article = Article::find($id);
        $article->delete();

        // Redirect to the article index page
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');

    }
}
