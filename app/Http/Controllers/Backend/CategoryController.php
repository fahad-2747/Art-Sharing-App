<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function categoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }

    public function categoryStore(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Input Category Name',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        Category::insert([
            'name' => $request->name,
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }

    public function categoryUpdate(Request $request){
        $category_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')){

            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Category::findOrFail($category_id)->update([
                'name' => $request->name,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.category')->with($notification);

        }
        else{

            Category::findOrFail($category_id)->update([
                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.category')->with($notification);

        }
    }

    public function categoryDelete($id){

        $category = Category::findOrFail($id);
        $img = $category->image;
        unlink($img);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
