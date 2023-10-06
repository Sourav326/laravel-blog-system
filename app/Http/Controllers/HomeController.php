<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Display the landing page view with latest 6 blogs which have active status.
     */
    public function index(){
        try{
            $blogs = Blog::where('status','active')->latest()->take(6)->get();
            return view('welcome')->with('blogs',$blogs);
        } catch (Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
