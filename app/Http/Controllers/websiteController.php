<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
class websiteController extends Controller
{
    //

     public function index()
    {
        //

        $blog = blog::orderBy('created_at','DESC')->paginate(2);
                return view('website')->with([
                    'blog' => $blog
                ]);

         // return view('blog_show');
    }

         public function search(){

       $searchTerm = $_GET['searchTerm'];
            
             $blog = blog::where('category', 'LIKE', '%'.$searchTerm.'%')
                           ->paginate(6);
                            return view('website')->with([
                    'blog' => $blog
                ]);

                    
         }

}
