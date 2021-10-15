<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', ['tags' => $tags]);
    }

    public function form()
    {
        $request = request();

        $data = [];

        if ($request->method() == 'POST') {
            if (!$request->has('id')) {
                Tag::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            } else {

                $tag = Tag::find($request->get('id'));
                $tag->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                ]);
            }

            return redirect('/tags');                          //header('Location: /tags');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['tag'] = Tag::find($id);
        }

        return view('tags.form', $data);
    }

    public function delete()
    {
        $tag = Tag::find(request()->route()->parameter('id'));
        $tag->posts()->detach();
        $tag->delete();

        return redirect('/tags');                                 //header('Location: /tags');
    }
}
