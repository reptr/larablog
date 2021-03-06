<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Index Blogs.
     *
     * @return void
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Create Blogs.
     *
     * @return void
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('blogs.create', compact('categories'));
    }

    /**
     * Store Blogs.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        /* cara ke satu */
        // $blog = new Blog();
        // $blog->title = $request->title;
        // $blog->body = $request->body;
        // $blog->save();

        /* cara ke dua, $fillable harus di set di Model */
        $input = $request->all();
        $blog = Blog::create($input);
        // sync dengan categories
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }

        return redirect(route('blogs'));
    }

    /**
     * Show Blogs.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Edit.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $categories = Category::latest()->get();
        $blog = Blog::findOrFail($id);

        // filter blog categories ($bc)
        $bc = [];
        foreach ($blog->category as $c) {
            $bc[] = $c->id;
        }

        $filtered = Arr::except($categories, $bc);

        return view('blogs.edit', compact('blog', 'categories', 'filtered'));
    }

    /**
     * Update Blogs.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        /* $fillable harus di set di Model */
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);

        // sync dengan categories
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }

        return redirect(route('blogs'));
    }

    /**
     * Deelete Blogs.
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect(route('blogs'));
    }

    /**
     * Trash Blogs.
     *
     * @return void
     */
    public function trash()
    {
        /*onlyTrashed() = hnaya yg ada di trash */
        $trashedBlog = Blog::onlyTrashed()->get();

        return view('blogs.trashed', compact('trashedBlog'));
    }

    /**
     * Restore Blogs.
     *
     * @param int $id
     * @return void
     */
    public function restore($id)
    {
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);

        return redirect(route('blogs'));
    }

    public function permanentDelete($id)
    {
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);

        return back();
    }
}
