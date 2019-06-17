<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
class PageController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=Page::all();
        return view('Admin.pages.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.pages.create');

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
        // dd($request->all());
    //     if($request->description_ar != null){
    //     $detail=$request->description_ar;
    //     $dom = new \domdocument();
    //     // loadHTML(mb_convert_encoding($profile, 'HTML-ENTITIES', 'UTF-8'))
    //     $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    //     $images = $dom->getelementsbytagname('img');
 
    //     //loop over img elements, decode their base64 src and save them to public folder,
    //     //and then replace base64 src with stored image URL.
    //     foreach($images as $k => $img){
    //         $data = $img->getattribute('src');
          
    //         list($type, $data) = explode(';', $data);
    //         list(, $data)      = explode(',', $data);
 
    //         $data = base64_decode($data);
    //         $image_name= time().$k.'ar.png';
    //         $path=public_path('page/' .$image_name);
 
    //         file_put_contents($path, $data);
 
    //         $img->removeattribute('src');
    //         $img->setattribute('src', asset('page/' .$image_name));
    //     }
 
    //     $detail = $dom->savehtml();
    //     // dd($detail);
    // }
    //     if($request->description_en != null){
    //     $detail2=$request->description_en;
    //     $dom = new \domdocument();
    //     $dom->loadHtml(mb_convert_encoding($detail2, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    //     $images = $dom->getelementsbytagname('img');
 
    //     //loop over img elements, decode their base64 src and save them to public folder,
    //     //and then replace base64 src with stored image URL.
    //     foreach($images as $k => $img){
    //         $data = $img->getattribute('src');
         
    //         list($type, $data) = explode(';', $data);
    //         list(, $data)      = explode(',', $data);
 
    //         $data = base64_decode($data);
    //         $image_name= time().$k.'en.png';
    //         $path=public_path('page/' .$image_name);
 
    //         file_put_contents($path, $data);
 
    //         $img->removeattribute('src');
    //         $img->setattribute('src', asset('page/' .$image_name));
    //     }
 
    //     $detail2 = $dom->savehtml();
    // }
        $page=new Page;
        $page->title_ar=$request->ar_name;
        if($request->description_ar != null){
            $page->description_ar=$request->description_ar;
        }
        $page->title_en=$request->en_name;
        if($request->description_en != null){
            $page->description_en=$request->description_en;
        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='page_'.time().'.'.$imageExtension;
            if (!file_exists('public/page/larg/')) {
                mkdir('public/page/larg/', 0777, true);
            }          
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(555, 263);
            $image_resize->save(public_path('page/larg/' .$imageName));
            $page->img='page/larg/'.$imageName;
            
        }
        $page->slogen_ar=$this->make_slug($request->input('ar_name'));
        $page->slogen_en=$this->make_slug($request->input('en_name'));
        $page->save();
        return  redirect('admin/Page')->with('success','تم اضافة الصفحة   بنجاح');
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
        $page=Page::find($id);
        return view('Admin.pages.edit',compact('page'));
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
         
            $page=Page::find($id);
            $page->title_ar=$request->ar_name;
            if($request->description_ar != null){
                $page->description_ar=$request->description_ar;
            }
            $page->title_en=$request->en_name;
            if($request->description_en != null){
                $page->description_en=$request->description_en;
            }
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $imageExtension = $file->getClientOriginalExtension();
                $imageName ='page_'.time().'.'.$imageExtension;
                if (!file_exists('public/page/larg/')) {
                    mkdir('public/page/larg/', 0777, true);
                }          
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(555, 263);
                $image_resize->save(public_path('page/larg/' .$imageName));
                $page->img='page/larg/'.$imageName;
                
            }
            $page->slogen_ar=$this->make_slug($request->input('ar_name'));
            $page->slogen_en=$this->make_slug($request->input('en_name'));
            $page->save();
            return  redirect('admin/Page')->with('success','تم تعديل الصفحة بنجاح');
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
        // Page::find($id)->delete();
        // return  redirect('admin/Page')->with('success','تم حذف الصفحة   بنجاح');
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
        $string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return str_limit($string, 100, '');
    }
}
