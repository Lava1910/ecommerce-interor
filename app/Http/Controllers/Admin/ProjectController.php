<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Project;

class ProjectController extends Controller
{
    public function projectsList (Request $request)
    {
        $data = [
            'pageTitle'=>'Project Management'
        ];
        return view('back.pages.admin.projects-list',$data);
    }

    public function addProject(Request $request)
    {
        $data = [
            'pageTitle'=>'Add Project'
        ];
        $project_categories = ProjectCategory::all();
        return view('back.pages.admin.add-project',$data,compact('project_categories'));
    }

    public function storeProject(Request $request)
    {
        //validate
        $request->validate([
            'project_name'=>'required|min:5|unique:projects,project_name',
            'project_description'=>'required',
            'project_banner'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
            'project_image'=>'required|image|mimes:png,jpg,jpeg,svg,webp'
        ],[
            'project_name.required'=>':Attribute is required',
            'project_description.required'=>':Attribute is required',
            'project_name.min'=>':Attribute must contains at least 5 characters',
            'project_name.unique'=>'This :Attribute is already exists',
            'project_image.required'=>':Attribute is required',
            'project_image.image'=>':Attribute must be an image',
            'project_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'project_banner.required'=>':Attribute is required',
            'project_banner.image'=>':Attribute must be an image',
            'project_banner.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format'
        ]);
        $project = new Project();
        if( $request->hasFile('project_banner')){
            $path = 'images/projects';
            $file = $request->file('project_banner');
            $filename = time().'_'.$file->getClientOriginalName();

            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $project->project_banner = $filename;
        }

        if( $request->hasFile('project_image')){
            $path = 'images/projects';
            $file = $request->file('project_image');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $project->project_image = $filename;
        }


        //project info
        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        $project->project_category_id = $request->project_category_id;
        $project->project_slug = null;
        $save = $project->save();
        if($save){
            return redirect()->route('admin.manage-projects.add-project')->with('success',
                '<b>'.ucfirst($request->project_name).'</b> project has been successfully added');
        } else {
            return redirect()->route('admin.manage-projects.add-project')->with('fail',
                'Something went wrong. Try again');
        }
    }

    public function editProject(Request $request)
    {
        $project_id = $request->id;
        $project = Project::findOrFail($project_id);
        $project_categories = ProjectCategory::all();
        $data = [
            'pageTitle'=>'Edit Category',
            'project'=>$project
        ];
        return view('back.pages.admin.edit-project',$data,compact('project_categories'));
    }

    public function updateProject(Request $request)
    {
        $project_id = $request->project_id;
        $project = Project::findOrFail($project_id);

        //validate
        $request->validate([
            'project_name'=>'required|min:5|unique:project_categories,project_category_name,'.$project_id,
            'project_description'=>'required',
            'project_banner'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            'project_image'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp'
        ],[
            'project_name.required'=>':Attribute is required',
            'project_description.required'=>':Attribute is required',
            'project_name.min'=>':Attribute must contains at least 5 characters',
            'project_name.unique'=>'This :Attribute is already exists',
            'project_banner.image'=>':Attribute must be an image',
            'project_banner.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'project_image.image'=>':Attribute must be an image',
            'project_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format'
        ]);
        if( $request->hasFile('project_banner')){
            $path = 'images/projects';
            $file = $request->file('project_banner');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_project_banner = $project->project_banner;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_project_banner))) {
                    File::delete(public_path($path . $old_project_banner));
                }
            }
            $project->project_thumbnail = $filename;
        }

        if( $request->hasFile('project_image')){
            $path = 'images/projects';
            $file = $request->file('project_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_project_image = $project->project_image;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_project_image))) {
                    File::delete(public_path($path . $old_project_image));
                }
            }
            $project->project_image1 = $filename;
        }

        //update category info
        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        $project->project_category_id = $request->project_category_id;
        $project->project_slug = null;
        $save = $project->save();
        if($save){
            return redirect()->route('admin.manage-projects.edit-project',['id'=>$project_id])->with('success',
                '<b>'.ucfirst($request->project_name).'</b> project has been updated');
        } else {
            return redirect()->route('admin.manage-projects.edit-project',['id'=>$project_id])->with('fail',
                'Something went wrong.');
        }

    }
}
