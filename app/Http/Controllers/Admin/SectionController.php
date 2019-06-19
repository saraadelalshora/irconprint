<?php

namespace App\Http\Controllers\Admin;

use App\Section;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
class SectionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $all=Section::orderBy('id', 'desc')->get();
        return view('Admin.abouts.sections.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.abouts.sections.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $about=Page::where('type','0')->get()->first();
        $page=new Section;
        $page->name_ar=$request->ar_name;
        if($request->description_ar != null){
            $page->description_ar=$request->description_ar;
        }
        $page->name_en=$request->en_name;
        if($request->description_en != null){
            $page->description_en=$request->description_en;
        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='page_'.time().'.'.$imageExtension;
            if (!file_exists('public/page/section/larg/')) {
                mkdir('public/page/section/larg/', 0777, true);
            }          
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(555, 263);
            $image_resize->save(public_path('page/section/larg/' .$imageName));
            $page->image='page/section/larg/'.$imageName;
            
        }
        $page->slogen_ar=$this->make_slug($request->input('ar_name'));
        $page->slogen_en=$this->make_slug($request->input('en_name'));
        $page->order=$request->order;
        $page->page_id=$about->id;
        $page->save();
        return  redirect('admin/Section')->with('success','تم اضافة الصفحة   بنجاح');
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
        $page=Section::find($id);
        return view('Admin.abouts.sections.edit',compact('page'));
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
           // dd($request->all());
            $about=Page::where('type','0')->get()->first();
            $page=Section::find($id);
            $page->name_ar=$request->ar_name;
            if($request->description_ar != null){
                $page->description_ar=$request->description_ar;
            }
            $page->name_en=$request->en_name;
            if($request->description_en != null){
                $page->description_en=$request->description_en;
            }
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $imageExtension = $file->getClientOriginalExtension();
                $imageName ='page_'.time().'.'.$imageExtension;
                if (!file_exists('public/page/section/larg/')) {
                    mkdir('public/page/section/larg/', 0777, true);
                }          
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(555, 263);
                $image_resize->save(public_path('page/section/larg/' .$imageName));
                $page->image='page/section/larg/'.$imageName;
                
            }
            $page->slogen_ar=$this->make_slug($request->input('ar_name'));
            $page->slogen_en=$this->make_slug($request->input('en_name'));
            $page->order=$request->order;
            $page->page_id=$about->id;
            $page->save();
            return  redirect('admin/Section')->with('success','تم تعديل الصفحة بنجاح');
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
        Section::find($id)->delete();
        return  redirect('admin/Section')->with('success','تم حذف الصفحة   بنجاح');
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
        // /[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u
        $string = preg_replace("/^[a-z0-9]([0-9a-z_\-\s])[ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]+$/i", "", $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return str_limit($string, 100, '');
    }
}