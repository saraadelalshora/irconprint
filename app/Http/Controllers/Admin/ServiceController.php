<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Intervention\Image\ImageManagerStatic as Image;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=Service::latest()->get();
        return view('Admin.services.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.services.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $service=new Service;
        $service->title_ar=$request->ar_name;
        if($request->description_ar != null){
            $service->description_ar=$request->description_ar;
        }
        $service->title_en=$request->en_name;
        if($request->description_en != null){
            $service->description_en=$request->description_en;
        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='page_'.time().'.'.$imageExtension;
            if (!file_exists('public/service/larg/')) {
                mkdir('public/service/larg/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(625, 417);
            $image_resize->save(public_path('service/larg/' .$imageName));
            $service->img='service/larg/'.$imageName;

        }
        $service->slogen_ar=$this->make_slug($request->input('ar_name'));
        $service->slogen_en=$this->make_slug($request->input('en_name'));
        $service->save();
        return  redirect('admin/Service')->with('success','تم اضافة الخدمة   بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $service=Service::find($id);
        return view('Admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $service=Service::find($id);
        $service->title_ar=$request->ar_name;
        if($request->description_ar != null){
            $service->description_ar=$request->description_ar;
        }
        $service->title_en=$request->en_name;
        if($request->description_en != null){
            $service->description_en=$request->description_en;
        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='page_'.time().'.'.$imageExtension;
            if (!file_exists('public/service/larg/')) {
                mkdir('public/service/larg/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(625, 417);
            $image_resize->save(public_path('service/larg/' .$imageName));
            $service->img='service/larg/'.$imageName;

        }
        $service->slogen_ar=$this->make_slug($request->input('ar_name'));
        $service->slogen_en=$this->make_slug($request->input('en_name'));
        $service->save();
        return  redirect('admin/Service')->with('success','تم تعديل الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function make_slug($string = null, $separator = "-") {
        if (is_null($string)) {
            return "";
        }
        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);

        // Lower case everything
        // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
        $string = mb_strtolower($string, "UTF-8");

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and arabic charactrs as well
        $string = preg_replace("/^[a-z0-9]([0-9a-z_\-\s])[ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]+$/i", "", $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return str_limit($string, 100, '');
    }
}
