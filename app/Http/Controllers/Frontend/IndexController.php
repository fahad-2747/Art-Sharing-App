<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $category = Category::latest()->get();
        $arts=DB::table('art')->orderBy('id','desc')->get();
        return view('frontend.index',compact('category','arts'));
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function gallery(){
        $category = Category::latest()->get();
        return view('frontend.gallery',compact('category'));
    }

    public function art($id){
        $arts=DB::table('art')->where('cat_id',$id)->get();
        return view('frontend.art',compact('arts'));
    }

    public function artView($id){
        $art=DB::table('art')->where('id',$id)->first();
        return view('frontend.art_view',compact('art'));
    }
}
