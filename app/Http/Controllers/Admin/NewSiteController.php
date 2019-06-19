<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewSite;
use App\CategoryNew;
use App\categoryNewSite;
use Intervention\Image\ImageManagerStatic as Image;
class NewSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=NewSite::orderBy('id', 'desc')->get();
        return view('Admin.news.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=CategoryNew::where('status','1')->get();

        return view('Admin.news.create',compact('categories'));
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
        $this->validate($request,[
            'ar_name'=>'required',
            'description_ar'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:250'
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            'mete_description_ar.required' => 'وصف القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        // 'title_ar', 'title_en', 'description_en', 'description_ar', 'slogen_ar','slogen_en',
        // 'meta_description_en', 'meta_description_ar', 'tags', 'image', 'status', 
       
        $news=new NewSite;
        $news->title_ar=$request->ar_name;
        $news->title_en=$request->en_name;
        $news->description_ar=$request->description_ar;
        $news->description_en=$request->description_en;
        $news->meta_description_ar=$request->meta_description_ar;
        $news->meta_description_en=$request->meta_description_en;
        $news->tags=$request->tags;
        $news->slogen_ar=$this->make_slug($request->ar_name);
        $news->slogen_en=$this->make_slug($request->en_name);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='news_'.time().'.'.$imageExtension;
            if (!file_exists('public/news/larg/')) {
                mkdir('public/news/larg/', 0777, true);
            }
          
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('news/larg/' .$imageName));
            $news->image='news/larg/'.$imageName;
            
        }
        $news->status=$request->status;
        $news->save();
        if($news->save()){
 
            $categories=$request->input('categories');
            $news->categories()->sync($categories);
           
        }
        return  redirect('admin/News')->with('success','تم اضافة الخبر بنجاح');


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
        $categories=CategoryNew::where('status','1')->get();
        $news=NewSite::find($id);
        return view('Admin.news.edit',compact('categories','news'));
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
        $this->validate($request,[
            'ar_name'=>'required',
            'description_ar'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:250'
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            'mete_description_ar.required' => 'وصف القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        // 'title_ar', 'title_en', 'description_en', 'description_ar', 'slogen_ar','slogen_en',
        // 'meta_description_en', 'meta_description_ar', 'tags', 'image', 'status', 
       
        $news=NewSite::find($id);
        $news->title_ar=$request->ar_name;
        $news->title_en=$request->en_name;
        $news->description_ar=$request->description_ar;
        $news->description_en=$request->description_en;
        $news->meta_description_ar=$request->meta_description_ar;
        $news->meta_description_en=$request->meta_description_en;
        $news->tags=$request->tags;
        $news->slogen_ar=$this->make_slug($request->ar_name);
        $news->slogen_en=$this->make_slug($request->en_name);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='news_'.time().'.'.$imageExtension;
            if (!file_exists('public/news/larg/')) {
                mkdir('public/news/larg/', 0777, true);
            }
          
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('news/larg/' .$imageName));
            $news->image='news/larg/'.$imageName;
            
        }
        $news->status=$request->status;
        $news->save();
        if($news->save()){
            $categories=$request->input('categories');
             $news->categories()->sync($categories);
        }
        return  redirect('admin/News')->with('success','تم تعديل الخبر بنجاح');


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
        $news=NewSite::find($id)->delete();
        return  redirect('admin/News')->with('success','تم حذف الخبر  بنجاح');

        
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
