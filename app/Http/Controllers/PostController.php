<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\User;
use Auth;
class PostController extends Controller
{
    public function index(Blog $blog)
    {
        return view('blogs/index')->with(['blogs'=>$blog->get()]);
    }
    
    public function show(Blog $blog)
    {
       return view('blogs/show')->with(['blog'=>$blog]);
    }
    
    public function create()
    {
       return view('blogs/create');
    }
    public function store(BlogRequest $request,User $user,Blog $blog)
    {
    $blog->user_id=$user=Auth::user()->id;
    $input = $request['blog'];
    $blog->fill($input)->save();
    return redirect('/mypage');
    }
    public function edit(Blog $blog)
    {
    return view('blogs/edit')->with(['blog' => $blog]);
    }
    public function update(BlogRequest $request, Blog $blog)
    {
    $input_blog = $request['blog'];
    $blog->fill($input_blog)->save();
    return redirect('/mypage');
    }
    public function delete(Blog $blog)
    {
    $blog->delete();
    return redirect('/mypage');
    }
    
}
