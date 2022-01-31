<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderByDesc('id')->paginate(10);
        $posts = Auth::user()->posts()->orderByDesc('id')->paginate(10);
         return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
      return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=> ['required', 'unique:posts','max:200'],
            'sub_title'=> ['nullable'],
            'cover'=>['nullable', 'image', 'max:100'],
            'body'=>['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
         
            ]);

            if($request->file('cover')){
                $cover_path = Storage::put('post_images', $request->file('cover'));
                //$cover_path= $request->file('cover')->store('post_images');
                $validated['cover'] = $cover_path;

            }

            $validated['slug'] = Str::slug($validated['title']);

            $validated['user_id'] = Auth::id();

            $post = Post::create($validated);

            if($request->has('tags')){
                $request->validate([
                'tags' => ['nullable', 'exists:tags,id']
            ]);
            $post->tags()->attach($request->tags);
            }

            return redirect()->route('admin.posts.index');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        if(Auth::id() === $post->user_id) {
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        } else{
            abort(403);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(Auth::id() === $post->user_id) {
        $validated=$request->validate([
            'title'=> ['required', Rule::unique('posts')->ignore($post->id),'max:200'],
            'sub_title'=> ['nullable'],
            'cover'=>['nullable','image', 'max:100'],
            'body'=>['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
            
            ]);
            
            $validated['slug'] = Str::slug($validated(['title']));

            if($request->file('cover')){    
                Storage::delete($post->cover);

                $cover_path= $request->file('cover')->store('post_images');
                $validated['cover'] = $cover_path;

            }
            if($request->has('tags')){
                $request->validate(['tags' => ['nullable','exists:tags,id']
            ]);
            $post->tags()->sync($request->tags);
        };
        $post->update($validated);
            return redirect()->route('admin.posts.index');
            
    } else {
        abort(403);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Auth::id() === $post->user_id) {
            Storage::delete($post->cover);
     $post->delete();
     return redirect()->route('admin.posts.index')->with('message','Post eliminato con successo');
        }else{
            abort(403);
        }
    }
}
