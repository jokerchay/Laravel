<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use App\Category;
use File;
use App\Image;
class PostController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $categories=Category::all();
       return view('posts.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()



    {   
        $posts=Post::orderby('id','DESC')->get();
        return view('posts.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required|string|max:150|min:4',
        'description'=>'required|string',
        'category'=>'required',
        
       


       ]);
       

       $title=$request->title;
       $description=$request->description;
       $category_id=$request->category;
       $posts=new Post;
       $posts->title=$title;
       $posts->description=$description;
       $posts->user_id=Auth::user()->id;
       $posts->category_id=$category_id;

      $posts->save();
      $last_id=$posts->id;
       if ($request->hasFile('image')) {
         $files=$request->file('image');
          
          foreach($files as $file){
            $name =time() . '.' . $file->getClientOriginalName();
            $path = public_path('/storage/upload/');
            $file->move($path, $name);
            $images=new Image;
            $images->name=$name;
            $images->post_id=$last_id;
            $images->save();
             
       }


   
    }
      return redirect()->back()->with('success','Image successfully!');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Post::find($id);
      return view('posts.view',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $posts=Post::find($id);
        $categories=Category::all();
        return view('posts.edit',compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'title'=>'required|string|max:150|min:4',
        'description'=>'required|string',
        'category'=>'required',
    


       ]);
          $title=$request->title;
            $description=$request->description;
            $category_id=$request->category;
  
         $posts=Post::findOrFail($id);
          $posts->title=$title;
           $posts->description=$description;
           $posts->user_id=Auth::user()->id;
           $posts->category_id=$category_id;
           $posts->save();
       if ($request->hasFile('image')) {
        
         $files=$request->file('image');
          
          foreach($files as $file){
            $name =time() . '.' . $file->getClientOriginalName();
            $path = public_path('/storage/upload/');
            $file->move($path, $name);
            $images=new Image;
            $images->name=$name;
            $images->post_id=$id;
            $images->save();
             
       }


   
    }

          
       
          

         
             return redirect()->back();
       
        
         
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {

  
    

      $images=Image::where('post_id',$id)->get();

     
     foreach($images as $image) {
          $name =$image->name;
         
          $path = public_path('/storage/upload/');
          File::delete($path.''.$name);
       

 }


       if (Post::where('id',$id)->delete()) {

           
            return redirect()->back()->with('success','delete successfully');

        }
        else{
           return redirect()->back(); 
        }

       

       
    
     
    }
    
}
