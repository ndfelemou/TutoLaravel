<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FormPostRequest;
use App\Http\Requests\BlogFilterRequest;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\Paginator;

class BlogController extends Controller
{
    public function create()
    {
        $post = new Post();
        return view('blog.create', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }


    public function store(FormPostRequest $request)
    {
        $post = Post::create($request->validated());
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article à bien été sauvegardé !");
    }

    public function edit(Post $post)
    {
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article à bien été modifié !");
    }


    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::with('tags', 'category')->paginate(6),
        ]);
    }


    public function show(string $slug, Post $post): RedirectResponse | View
    {
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return view('blog.show', ['post' => $post]);
    }
}
