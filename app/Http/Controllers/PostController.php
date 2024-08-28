<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * List all posts
     */
    public function index()
    {
        $posts = Post::with('user', 'tags')->orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form to create a new post
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created post
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index')->with('success', '記事は正常に作成されました。');
    }

    /**
     * Show the specified post
     */
    public function show(Post $post)
    {
        $previousPost = Post::where('id', '<', $post->id)->latest()->first();
        $nextPost = Post::where('id', '>', $post->id)->oldest()->first();

        return view('posts.show', compact('post', 'previousPost', 'nextPost'));
    }

    /**
     * Show the form to edit the specified post
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified post
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $post->update([
           'title' => $request->title,
           'content' => $request->content, 
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', '記事は正常に更新されました。');
    }

    /**
     * Delete the specified post
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('success', '記事は正常に削除されました。');
    }
}
