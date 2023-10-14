<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return View('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title'=>['required', 'min:3'],
                'image'=>['required']

            ]);
            Blog::create([
                'title'=>$request->title,
                'category_id'=>$request->category_id,
                'author_name'=>$request->author_name,
                'description'=>$request->description,
                'image'=>$this->uploadImage(request()->file('image')),
                'status'=>$request->status,
            ]);
            return redirect()->route('blogs.index');
        }
        catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show',[
            'blog'=>$blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',[
            'blog'=>$blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        try{
            $requestData=[
                'title'=>$request->title,
                'category_id'=>$request->category_id,
                'author_name'=>$request->author_name,
                'description'=>$request->description,
                'status'=>$request->status,
            ];
            if($request->hasFile('image')){
                $requestData['image']=$this->uploadImage(request()->file('image'));
            }
            $blog->update($requestData);
            return redirect()->route('blogs.index');
        }catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index');
    }

    public function BlogInactive($id){
        Blog::findOrfail($id)->update(['status'=>0]);
        return redirect()->route('blogs.index');
    }
    public function BlogActive($id){
        Blog::findOrfail($id)->update(['status'=>1]);
        return redirect()->route('blogs.index');
        
    }
    public function uploadImage($flie){
        $filename = time().'.'.$flie->getClientOriginalExtension();
        Image::make($flie)->resize(300,300)->save(storage_path().'/app/public/blog/'.$filename); 
        return $filename;
    }
}
