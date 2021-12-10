<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pages.home')->with('posts', Posts::query()->paginate(4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'post' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $slug = strtolower(str_replace(" ", "-", $request->input('title')));

        $newImageName = time(). "-" . $slug. '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        Posts::query()->create([
            'title' => $request->input('title'),
            'post' => $request->input('post'),
            'slug' => $slug,
            'image_path' => $newImageName
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        return \view('pages.post')->with('post', Posts::query()->where('id', $id)->firstOrFail());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return \view('pages.edit')->with('post', Posts::query()->where('id', $id)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'post' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $slug = strtolower(str_replace(" ", "-", $request->input('title')));

        $newImageName = time(). "-" . $slug. '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        Posts::query()->where('id', $id)->update([
            'title' => $request->input('title'),
            'post' => $request->input('post'),
            'slug' => $slug,
            'image_path' => $newImageName
        ]);

        return redirect('/posts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $post = Posts::query()->where('id', $id)->firstOrFail();
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted successfully');
    }
}
