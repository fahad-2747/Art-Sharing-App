<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ArtController extends Controller
{
    public function artView(){
        $art = DB::table('art')->join('categories','art.cat_id','categories.id')
            ->select('art.*','categories.name')->get();
        $categories = Category::all();
        return view('backend.art.art_view',compact('art','categories'));
    }

    public function artStore(Request $request){
        $request->validate([
            'art_name' => 'required',
            'cat_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'art_image' => 'required'
        ]);

        $image = $request->file('art_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/art/'.$name_gen);
        $save_url = 'upload/art/'.$name_gen;

        Art::insert([
            'art_name' => $request->art_name,
            'cat_id' => $request->cat_id,
            'description' => $request->description,
            'art_image' => $save_url,
            'price' => $request->price,
            'rating' => $request->rating,
        ]);

        $notification = array(
            'message' => 'Art Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function artEdit($id){
        $art = Art::findOrFail($id);
        return view('backend.art.art_edit',compact('art'));
    }

    public function artUpdate(Request $request){
        $art_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('art_image')){

            unlink($old_img);
            $image = $request->file('art_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/art/'.$name_gen);
            $save_url = 'upload/art/'.$name_gen;

            Art::findOrFail($art_id)->update([
                'art_name' => $request->art_name,
                'description' => $request->description,
                'art_image' => $save_url,
                'price' => $request->price,
                'rating' => $request->rating,
            ]);

            $notification = array(
                'message' => 'Art Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.art')->with($notification);

        }
        else{

            Art::findOrFail($art_id)->update([
                'art_name' => $request->art_name,
                'description' => $request->description,
                'price' => $request->price,
                'rating' => $request->rating,
            ]);

            $notification = array(
                'message' => 'Art Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.art')->with($notification);

        }
    }

    public function artDelete($id){

        $art_id = Art::findOrFail($id);
        $img = $art_id->art_image;
        unlink($img);

        Art::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Art Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
