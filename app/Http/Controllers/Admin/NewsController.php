<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\News;

class NewsController extends Controller
{
    public function newsList (Request $request)
    {
        $data = [
            'pageTitle'=>'News Management'
        ];
        return view('back.pages.admin.news-list',$data);
    }

    public function addNews(Request $request)
    {
        $data = [
            'pageTitle'=>'Add News'
        ];
        return view('back.pages.admin.add-news',$data);
    }

    public function storeNews(Request $request)
    {
        //validate
        $request->validate([
            'news_title'=>'required|min:5|unique:news,news_title',
            'news_short'=>'required',
            'news_description'=>'required',
            'news_thumbnail'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
            'news_image'=>'required|image|mimes:png,jpg,jpeg,svg,webp'
        ],[
            'news_title.required'=>':Attribute is required',
            'news_short.required'=>':Attribute is required',
            'news_description.required'=>':Attribute is required',
            'news_title.min'=>':Attribute must contains at least 5 characters',
            'news_title.unique'=>'This :Attribute is already exists',
            'news_image.required'=>':Attribute is required',
            'news_image.image'=>':Attribute must be an image',
            'news_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'news_thumbnail.required'=>':Attribute is required',
            'news_thumbnail.image'=>':Attribute must be an image',
            'news_thumbnail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format'
        ]);
        $news = new News();
        if( $request->hasFile('news_thumbnail')){
            $path = 'images/news';
            $file = $request->file('news_thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();

            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $news->news_thumbnail = $filename;
        }

        if( $request->hasFile('news_image')){
            $path = 'images/news';
            $file = $request->file('news_image');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $news->news_image = $filename;
        }

        //news info
        $news->news_title = $request->news_title;
        $news->news_short = $request->news_short;
        $news->news_description = $request->news_description;
        $news->published = true;
        $news->news_slug = null;
        $save = $news->save();
        if($save){
            return redirect()->route('admin.manage-news.add-news')->with('success',
                'News has been successfully added');
        } else {
            return redirect()->route('admin.manage-news.add-news')->with('fail',
                'Something went wrong. Try again');
        }
    }

    public function editNews(Request $request)
    {
        $news_id = $request->id;
        $news = News::findOrFail($news_id);
        $data = [
            'pageTitle'=>'Edit Category',
            'news'=>$news
        ];
        return view('back.pages.admin.edit-news',$data);
    }

    public function updateNews(Request $request)
    {
        $news_id = $request->news_id;
        $news = News::findOrFail($news_id);

        //validate
        $request->validate([
            'news_title'=>'required|min:5|unique:news,news_title,'.$news_id,
            'news_thumbnail'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            ''=>'nullable|image|mimes:png,jpg,jpeg,svg,webp'
        ],[
            'news_title.required'=>':Attribute is required',
            'news_title.min'=>':Attribute must contains at least 5 characters',
            'news_title.unique'=>'This :Attribute is already exists',
            'news_thumbnail.image'=>':Attribute must be an image',
            'news_thumbnail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'news_image.image'=>':Attribute must be an image',
            'news_image.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format'
        ]);
        if( $request->hasFile('news_thumbnail')){
            $path = 'images/news';
            $file = $request->file('news_thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_news_thumbnail = $news->news_thumbnail;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old news thumbnail
                if (File::exists(public_path($path . $old_news_thumbnail))) {
                    File::delete(public_path($path . $old_news_thumbnail));
                }
            }
            $news->news_thumbnail = $filename;
        }

        if( $request->hasFile('news_image')){
            $path = 'images/news';
            $file = $request->file('news_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_news_image = $news->news_image;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_news_image))) {
                    File::delete(public_path($path . $old_news_image));
                }
            }
            $news->news_image = $filename;
        }

        //update category info
        $news->news_title = $request->news_title;
        $news->news_short = $request->news_short;
        $news->news_description = $request->news_description;
        $news->published = true;
        $news->news_slug = null;
        $save = $news->save();
        if($save){
            return redirect()->route('admin.manage-news.edit-news',['id'=>$news_id])->with('success',
                'News has been updated');
        } else {
            return redirect()->route('admin.manage-news.edit-news',['id'=>$news_id])->with('fail',
                'Something went wrong.');
        }

    }
}

