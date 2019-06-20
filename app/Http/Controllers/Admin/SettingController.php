<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Setting;
Use App\SocialMedia;
use Intervention\Image\ImageManagerStatic as Image;
class SettingController extends Controller
{
    //
    public function index(){
        $setting=Setting::all()->first();
        return view('Admin.settings.setting',compact('setting'));
    }
    public function store(Request $request){
    $setting=new Setting;
    $setting->description_ar=$request->description_ar;
    $setting->description_en=$request->description_en;
    $setting->meta_description_ar=$request->meta_description_ar;
    $setting->meta_tags=$request->meta_tags;
    $setting->meta_title=$request->meta_title;
    $setting->phone=$request->phone;
    $setting->address=$request->address;
    $setting->whatsapp=$request->whatsapp;
    $setting->email=$request->email;
    $setting->head_code=$request->head_code;
    $setting->maintans_status=$request->check;
    $setting->notes=$request->notes;
    if ($request->hasFile('log_img_en')) {
        $file = $request->file('log_img_en');
        $imageExtension = $file->getClientOriginalExtension();
        $imageName ='log_img_en_'.time().'.'.$imageExtension;
        if (!file_exists('public/setting/')) {
            mkdir('public/setting/', 0777, true);
        }
        $image_resize = Image::make($file->getRealPath());
        $image_resize->save(public_path('setting/' .$imageName));
        $setting->log_img_en='setting/'.$imageName;
    }
    if ($request->hasFile('logo_img')) {
        $file = $request->file('logo_img');
        $imageExtension = $file->getClientOriginalExtension();
        $imageName ='store_img_'.time().'.'.$imageExtension;
        if (!file_exists('public/setting/')) {
            mkdir('public/setting/', 0777, true);
        }
        $image_resize = Image::make($file->getRealPath());
        $image_resize->save(public_path('setting/' .$imageName));
        $setting->logo_img='setting/'.$imageName;
        
    }
    if ($request->hasFile('icon_img')) {
        $file = $request->file('icon_img');
        $imageExtension = $file->getClientOriginalExtension();
        $imageName ='store_img_'.time().'.'.$imageExtension;
        if (!file_exists('public/setting/')) {
            mkdir('public/setting/', 0777, true);
        }
        $image_resize = Image::make($file->getRealPath());
        dd($image_resize);
        $image_resize->save(public_path('setting/' .$imageName));
        $setting->icon_img='setting/'.$imageName;
        
    }
    $setting->save();
    if($setting->save()){
        return  redirect('admin/setting')->with('success','تم تعديل اعدادات بنجاح');
    }
    else{
        return  redirect('admin/setting')->with('error');

    }
    }
    public function update(Request $request,$id){
        // 'description_ar', 'description_en', 'meta_description_ar', 'meta_description_en', 'meta_tags', 'meta_title', 'notes',
        // 'phone', 'address', 'whatsapp', 'email', 'log_img_en', 'logo_img', 'icon_img', 'head_code', 'maintans_status',
    $setting=Setting::find($id);
    $setting->description_ar=$request->description_ar;
    $setting->description_en=$request->description_en;
    $setting->meta_description_ar=$request->meta_description_ar;
    $setting->meta_tags=$request->meta_tags;
    $setting->meta_title=$request->meta_title;
    $setting->phone=$request->phone;
    $setting->address=$request->address;
    $setting->whatsapp=$request->whatsapp;
    $setting->email=$request->email;
    $setting->head_code=$request->head_code;
    $setting->maintans_status=$request->check;
    $setting->notes=$request->notes;
    if ($request->hasFile('log_img_en')) {
        $file = $request->file('log_img_en');
        $imageExtension = $file->getClientOriginalExtension();
        $imageName ='log_img_en_'.time().'.'.$imageExtension;
        if (!file_exists('public/setting/')) {
            mkdir('public/setting/', 0777, true);
        }
        $image_resize = Image::make($file->getRealPath());
        $image_resize->save(public_path('setting/' .$imageName));
        $setting->log_img_en='setting/'.$imageName;
    }
    if ($request->hasFile('logo_img')) {
        $file = $request->file('logo_img');
        $imageExtension = $file->getClientOriginalExtension();
        $imageName ='store_img_'.time().'.'.$imageExtension;
        if (!file_exists('public/setting/')) {
            mkdir('public/setting/', 0777, true);
        }
        $image_resize = Image::make($file->getRealPath());
        $image_resize->save(public_path('setting/' .$imageName));
        $setting->logo_img='setting/'.$imageName;
        
    }
    if ($request->hasFile('icon_img')) {
        $file = $request->file('icon_img');
        $imageExtension = $file->getClientOriginalExtension();
        $imageName ='store_img_'.time().'.'.$imageExtension;
        if (!file_exists('public/setting/')) {
            mkdir('public/setting/', 0777, true);
        }
        $image_resize = Image::make($file->getRealPath());
        dd($image_resize);
        $image_resize->save(public_path('setting/' .$imageName));
        $setting->icon_img='setting/'.$imageName;
        
    }
    $setting->save();
    if($setting->save()){
        return  redirect('admin/setting')->with('success','تم تعديل اعدادات بنجاح');
    }
    else{
        return  redirect('admin/setting')->with('error');

    }

    }

    public function getsocail(){
        $social=SocialMedia::all()->first();
        return view('Admin.settings.social',compact('social'));
    }
    public function addsocial(Request $request){

        $social=new SocialMedia;
        $social->fb=$request->fb;
        $social->tw=$request->tw;
        $social->instegram=$request->instegram;
        $social->linkedin=$request->linkedin;
        $social->youtube=$request->youtube;
        $social->pinterest=$request->pinterest;
        $social->rss=$request->rss;
        $social->save();
        if($social->save()){
            return  redirect('admin/social')->with('success','تم تعديل السوشيال بنجاح');
        }
    }
    public function social(Request $request,$id){

         $social=SocialMedia::find($id);
         $social->fb=$request->fb;
         $social->tw=$request->tw;
         $social->instegram=$request->instegram;
         $social->linkedin=$request->linkedin;
         $social->youtube=$request->youtube;
         $social->pinterest=$request->pinterest;
         $social->rss=$request->rss;
         $social->save();
         if($social->save()){
             return  redirect('admin/social')->with('success','تم تعديل السوشيال بنجاح');
         }
   }
 
}
