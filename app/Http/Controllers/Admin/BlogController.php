<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Validator;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(30);
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {


    //     try{

    //     $validator = Validator::make($request->all(), [
    //        'title' => 'required|max:255',
    //         'content' => 'required',
    //         'author' => 'required|max:100',
    //         'date' => 'required|date|before_or_equal:' . date('Y-m-d'),
    //         'image' => 'required|image',
    //     ]);
   
    //     if($validator->fails()){
    //         return redirect()->back()->withInput()->with('error_message',$validator->errors());
    //     }            

    //     $blog=new Blog();
    //     $blog->title = $request->title;
    //     $blog->slug = \Str::slug($request->title);
    //     $blog->content= $request->content;
    //     $blog->author= $request->author;
    //     $blog->published_at= $request->date;
    //      if ($request->hasFile('image')) {
    //           $image =  $request->file('image')->getClientOriginalName();
    //                   $request->file('image')->storeAs(
    //                       'blogs',
    //                       $image,
    //                       'public' );
            
    //         $blog->image = $image;
    //         $blog->save();
    //     }


    //     return redirect()->route('blogs.index')->with('success_message','Blog Created');

    //     }catch(\Exception $e){
    //         return redirect()->back()->withInput()->with('error_message',$e->getMessage());
    //     }
    

    // }
    // =======================
    public function store(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:100',
            'date' => 'required|date|before_or_equal:' . date('Y-m-d'),
            'image' => 'required|image',
            'type' => 'required|in:blog,bylaws,seat', // Validate type
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error_message', $validator->errors());
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = \Str::slug($request->title);
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->published_at = $request->date;
        $blog->type = $request->type; // Save the type
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('blogs', $image, 'public');
            $blog->image = $image;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success_message', 'Blog Created');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error_message', $e->getMessage());
    }
}

    // ====================== 


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog,$id)
    {
        $blog = $blog->where('id',$id)->first();
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
//     public function update(Request $request, Blog $blog,$id)
//     {
    
//    try{





//         try{

//         $validator = Validator::make($request->all(), [
//            'title' => 'required|max:255',
//             'content' => 'required',
//             'author' => 'required|max:100',
//             'date' => 'required|date|before_or_equal:' . date('Y-m-d'),
//             'image' => 'nullable|image',
//         ]);
   
//         if($validator->fails()){
//             return redirect()->back()->withInput()->with('error_message',$validator->errors());
//         }            

//         $blog=Blog::find($id);
//         $blog->title = $request->title;
//         $blog->slug = \Str::slug($request->title);
//         $blog->content= $request->content;
//         $blog->author= $request->author;
//         $blog->published_at= $request->date;
//          if ($request->hasFile('image')) {
//               $image =  $request->file('image')->getClientOriginalName();
//                       $request->file('image')->storeAs(
//                           'blogs',
//                           $image,
//                           'public' );
            
//             $blog->image = $image;
//             $blog->save();
//         }


//         return redirect()->route('blogs.index')->with('success_message','Blog Updated');

//         }catch(\Exception $e){
//             return redirect()->back()->withInput()->with('error_message',$e->getMessage());
//         }
    

    


//    }catch(\Exception $e){
            
//             return redirect()->back()->withInput()->with('error_message',$e->getMessage());
//         }

//     }
// =================================
public function update(Request $request, Blog $blog, $id)
{
    try {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:100',
            'date' => 'required|date|before_or_equal:' . date('Y-m-d'),
            'image' => 'nullable|image',
            'type' => 'required|in:blog,bylaws,seat', // Validate type
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error_message', $validator->errors());
        }

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = \Str::slug($request->title);
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->published_at = $request->date;
        $blog->type = $request->type; // Save the type
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('blogs', $image, 'public');
            $blog->image = $image;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success_message', 'Blog Updated');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error_message', $e->getMessage());
    }
}

// ===========================

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function delete(Blog $blog,$id)
    {
        try{
        $blog = $blog->where('id',$id)->delete();

        return redirect()->route('blogs.index')->with('success_message','Blog Deleted');

        }catch(\Exception $e){
            return redirect()->back()->withInput()->with('error_message',$e->getMessage());
        }
    }
}
