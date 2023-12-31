<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ]
        );

        $postData = $request->all();
        $postData['user_id'] = Auth::id();

        Post::create($postData);

        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        
        Post::destroy($request->input('id'));

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}
