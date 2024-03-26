<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ProjectCategory;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProjectCategoryController extends Controller
{
    public function projectCategoriesList(Request $request)
    {
        $data = [
            'pageTitle'=>'Project Category Management'
        ];
        return view('back.pages.admin.project-categories-list',$data);
    }

    public function addProjectCategory(Request $request)
    {
        $data = [
            'pageTitle'=>'Add Project Category'
        ];
        return view('back.pages.admin.add-project-category',$data);
    }

    public function storeProjectCategory(Request $request)
    {
        //validate
        $request->validate([
            'project_category_name'=>'required|min:5|unique:project_categories,project_category_name',
            'project_category_image'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
            'project_category_thumbnail'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
        ],[
            'project_category_name.required'=>':Attribute is required',
            'project_category_name.min'=>':Attribute must contains at least 5 characters',
            'project_category_name.unique'=>'This :Attribute is already exists',
            'project_category_image.required'=>':Attribute is required',
            'project_category_image.image'=>':Attribute must be an image',
            'project_category_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'project_category_thumbnail.required'=>':Attribute is required',
            'project_category_thumbnail.image'=>':Attribute must be an image',
            'project_category_thumbnail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format'
        ]);
        $project_category = new ProjectCategory();
        if( $request->hasFile('project_category_thumbnail')){
            $path = 'images/project-categories';
            $file = $request->file('project_category_thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();

            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $project_category->project_category_thumbnail = $filename;
        }

        if( $request->hasFile('project_category_image')){
            $path = 'images/project-categories';
            $file = $request->file('project_category_image');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $project_category->project_category_image = $filename;
        }

        //project-category info
        $project_category->project_category_name = $request->project_category_name;
        $project_category->project_category_description = $request->project_category_description;
        $project_category->slug = null;
        $save = $project_category->save();
        if($save){
            return redirect()->route('admin.manage-project-categories.add-project-category')->with('success',
                '<b>'.ucfirst($request->project_category_name).'</b> project category has been successfully added');
        } else {
            return redirect()->route('admin.manage-project-categories.add-project-category')->with('fail',
                'Something went wrong. Try again');
        }
    }

    public function editProjectCategory(Request $request)
    {
        $project_category_id = $request->id;
        $project_category = ProjectCategory::findOrFail($project_category_id);
        $data = [
            'pageTitle'=>'Edit Category',
            'project_category'=>$project_category
        ];
        return view('back.pages.admin.edit-project-category',$data);
    }

    public function updateProjectCategory(Request $request)
    {
        $project_category_id = $request->project_category_id;
        $project_category = ProjectCategory::findOrFail($project_category_id);

        //validate
        $request->validate([
            'project_category_name'=>'required|min:5|unique:project_categories,project_category_name,'.$project_category_id,
            'project_category_image'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            'project_category_image_detail'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
        ],[
            'project_category_name.required'=>':Attribute is required',
            'project_category_name.min'=>':Attribute must contains at least 5 characters',
            'project_category_name.unique'=>'This :Attribute is already exists',
            'project_category_image.image'=>':Attribute must be an image',
            'project_category_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'project_category_image_detail.image'=>':Attribute must be an image',
            'project_category_image_detail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
        ]);
        if( $request->hasFile('project_category_image')){
            $path = 'images/project-categories';
            $file = $request->file('project_category_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_project_category_image = $project_category->project_category_image;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_project_category_image))) {
                    File::delete(public_path($path . $old_project_category_image));
                }
            }
            $project_category->project_category_image = $filename;
        }

        if( $request->hasFile('project_category_thumbnail')){
            $path = 'images/project-categories';
            $file = $request->file('project_category_thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_project_category_thumbnail = $project_category->project_category_thumbnail;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_project_category_thumbnail))) {
                    File::delete(public_path($path . $old_project_category_thumbnail));
                }
            }
            $project_category->project_category_thumbnail = $filename;
        }

        //update category info
        $project_category->project_category_name = $request->project_category_name;
        $project_category->project_category_description = $request->project_category_description;
        $project_category->slug = null;
        $save = $project_category->save();
        if($save){
            return redirect()->route('admin.manage-project-categories.edit-project-category',['id'=>$project_category_id])->with('success',
                '<b>'.ucfirst($request->project_category_name).'</b> project category has been updated');
        } else {
            return redirect()->route('admin.manage-project-categories.edit-project-category',['id'=>$project_category_id])->with('fail',
                'Something went wrong.');
        }

    }
}
