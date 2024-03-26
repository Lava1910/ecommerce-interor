<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoriesController extends Controller
{
    public function catsList(Request $request)
    {
        $data = [
            'pageTitle'=>'Category Management'
        ];
        return view('back.pages.admin.cats-list',$data);
    }

    public function addCategory(Request $request)
    {
        $data = [
            'pageTitle'=>'Add Category',
             $projectCategories = ProjectCategory::all()
        ];
        return view('back.pages.admin.add-category',$data,compact('projectCategories'));
    }

    public function storeCategory(Request $request)
    {
        //validate
        $request->validate([
            'category_name'=>'required|unique:categories,category_name',
            'category_image'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
            'category_image_detail'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
        ],[
            'category_name.required'=>':Attribute is required',
            'category_name.unique'=>'This :Attribute is already exists',
            'category_image.required'=>':Attribute is required',
            'category_image.image'=>':Attribute must be an image',
            'category_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'category_image_detail.required'=>':Attribute is required',
            'category_image_detail.image'=>':Attribute must be an image',
            'category_image_detail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
        ]);

        $category = new Category();
        if( $request->hasFile('category_image')){
            $path = 'images/categories';
            $file = $request->file('category_image');
            $filename = time().'_'.$file->getClientOriginalName();

            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $category->category_image = $filename;
        }

        if( $request->hasFile('category_image_detail')){
            $path = 'images/categories';
            $file = $request->file('category_image_detail');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $category->category_image_detail = $filename;
        }

        //category info
        $category->category_name = $request->category_name;
        $category->description_main = $request->description_main;
        $category->topic1 = $request->topic1;
        $category->topic2 = $request->topic2;
        $category->description_topic1 = $request->description_topic1;
        $category->description_topic2 = $request->description_topic2;
        $category->project_category_id = $request->project_category_id;
        $category->category_slug = null;
        $save = $category->save();
        if($save){
            return redirect()->route('admin.manage-categories.add-category')->with('success',
                '<b>'.ucfirst($request->category_name).'</b> category has been successfully added');
        } else {
            return redirect()->route('admin.manage-categories.add-category')->with('fail',
                'Something went wrong. Try again');
        }
    }

    public function editCategory(Request $request)
    {
        $category_id = $request->id;
        $category = Category::findOrFail($category_id);
        $projectCategories = ProjectCategory::all();
        $data = [
            'pageTitle'=>'Edit Category',
            'category'=>$category
        ];
        return view('back.pages.admin.edit-category',$data,compact('projectCategories'));
    }

    public function updateCategory(Request $request)
    {
        $category_id = $request->category_id;
        $category = Category::findOrFail($category_id);

        //validate
        $request->validate([
            'category_name'=>'required|unique:categories,category_name,'.$category_id,
            'category_image'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            'category_image_detail'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
        ],[
            'category_name.required'=>':Attribute is required',
            'category_name.unique'=>'This :Attribute is already exists',
            'category_image.image'=>':Attribute must be an image',
            'category_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'category_image_detail.image'=>':Attribute must be an image',
            'category_image_detail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
        ]);
        if( $request->hasFile('category_image')){
            $path = 'images/categories';
            $file = $request->file('category_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_category_image = $category->category_image;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_category_image))) {
                    File::delete(public_path($path . $old_category_image));
                }
            }
            $category->category_image = $filename;
        }

        if( $request->hasFile('category_image_detail')){
            $path = 'images/categories';
            $file = $request->file('category_image_detail');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_category_image_detail = $category->category_image_detail;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_category_image_detail))) {
                    File::delete(public_path($path . $old_category_image_detail));
                }
            }
            $category->category_image_detail = $filename;
        }

        //update category info
        $category->category_name = $request->category_name;
        $category->description_main = $request->description_main;
        $category->topic1 = $request->topic1;
        $category->topic2 = $request->topic2;
        $category->description_topic1 = $request->description_topic1;
        $category->description_topic2 = $request->description_topic2;
        $category->category_slug = null;
        $save = $category->save();
        if($save){
            return redirect()->route('admin.manage-categories.edit-category',['id'=>$category_id])->with('success',
                '<b>'.ucfirst($request->category_name).'</b> category has been updated');
        } else {
            return redirect()->route('admin.manage-categories.edit-category',['id'=>$category_id])->with('fail',
                'Something went wrong.');
        }

    }


}
