<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        if ($request->method() == 'POST') {
            if (!$request->has('id')) {
                $post = Post::create([                                             //Post::create($request->all());
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                    'category_id' => $request->get('category_id'),
                ]);
                $post->tags()->sync($request->get('tags'));
            } else {

                $post = Post::find($request->get('id'));
                $post->update([                                            //$post->update($request->all());
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                    'category_id' => $request->get('category_id'),
                ]);
                $post->tags()->sync($request->get('tags'));
            }

            return redirect('/posts');                                   //header('Location: /posts');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['post'] = Post::find($id);

        }
        $data['tags'] = Tag::all();
        $data['categories'] = Category::all();
        return view('posts.form', $data);
    }

    public function delete()
    {
        $post = Post::find(request()->route()->parameter('id'));
        $post->tags()->detach();
        $post->delete();

        return redirect('/posts');                              //header('Location: /posts');
    }
}
