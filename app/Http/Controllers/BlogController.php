<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $blog = blog::orderBy('created_at','DESC')->paginate(2);
                return view('Blog.blog_show')->with([
                    'blog' => $blog
                ]);

         // return view('blog_show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Blog.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    $request->validate([
            'title' =>'required',
            'category'=>'required',
            'description'=>'required',
             'img'=>'required',
              ]);

     
             // $this->saveImages($request->image, $file);
             $image = $request->file('img');
        $imageName = str_random(12).'_'.$image->getClientOriginalName();
        $image->move('uploads', $imageName);

            $blog = new blog([
                'user_id' =>Auth::id(),
                'title' => $request['title'],
                'category' => $request['category'],
                'description' => $request['description'],
                'status' => '1',
                'img' => $imageName,

                 ]);
           
             $blog->save();

             return $this->index()->with(
            [
                'message_success' => " Blog Added successfully"
            ]
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $Blog)
    {
        
        return view('Blog.edit')->with([
            'blog' => $Blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $Blog)
    {
         $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
             if($request->file('img')){
                $old_img = $request['old_img'];
                 $this->deleteImages($old_img);
              $image = $request->file('img');
        $imageName = str_random(12).'_'.$image->getClientOriginalName();
        $image->move('uploads', $imageName);
        }
        else{

                $imageName = $request['old_img'];
                
        }
        $Blog->update([
                'title' => $request['title'],
                'category' => $request['category'],
                'description' => $request['description'],
                'status' => '1',
                'img' => $imageName,
        ]);

         return $this->index()->with('message_success', 'Blog update Successsfully');
     
    


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $Blog)
    {
        //
        $oldName = $Blog->title;
         $old_img = $Blog->img;
         $this->deleteImages($old_img);
        $Blog->delete();
        return $this->index()->with('message_success', 'Blog Delete Successsfully');
       }
   


public function deleteImages($old_img){
        if(file_exists(public_path() . "/uploads/" . $old_img))
            unlink(public_path() . "/uploads/" . $old_img);
      return back();
    }

}
