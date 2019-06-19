<?php

namespace App\Http\Controllers\Admin\video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sub_Category;
use App\Category;
use App\Video;
use App\Image;
use App\SubTwoCategory;

class VideoController extends Controller
{
    public function index()
    {
        //
        $all=Video::orderBy('id', 'desc')->get();
        return view('Admin.video.video.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::where([['status','1'],['type','video']])->get();
        return view('Admin.video.video.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //     'name_ar', 'name_en', 'tag_ar', 'tag_en', 'image', 'slogen_ar', 'slogen_en', 'status', 
    //     'category_id', 'subcategory_id',
    //    'subtwocategory_id' 
// dd($request->all());

$this->validate($request,[
    'name_ar'=>'required',
    'category_id'=>'required',
    'subcategory'=>'required',
    'img'=>'mimes:jpeg,jpg,png,gif|max:1000'
],[
    'name_ar.required' => 'اسم الفيديو باللغة العربية مطلوب ',
    'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
    'subcategory.required' => 'وصف القسم الفرعي   مطلوب ',
    'img.mimes' => 'هذا النوع من الصور غير مسموح',
    'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
    ]

);
    //last id 
    $last_id=Video::latest()->get()->first();
    
    if($last_id){
        $code_slug=explode('-',$last_id->slogen_ar);
        $slug_id=++$code_slug[0];

    }else{
      $slug_id=100001;
    }
    $video=new Video;
    $video->name_ar=$request->name_ar;
    $video->name_en=$request->name_en;
    $video->tag_ar=$request->tag_ar;
    $video->tag_en=$request->tag_en;
    $video->slogen_ar=$slug_id."-".$this->make_slug($request->input('name_ar'));
    $video->slogen_en=$slug_id."-".$this->make_slug($request->input('name_en'));
    $video->status=$request->status;
    $video->category_id=$request->category_id;
    $video->subcategory_id=$request->subcategory;
    $video->subtwocategory_id=$request->subsubcategory;

        if ($request->hasFile('pro_image')) {
            $images1 = $request->file('pro_image');
            
                    $imageExtension = $images1->getClientOriginalExtension();
                    $imageName ='product_' . time() . '.' . $imageExtension;
                    if (!file_exists('public/video/larg/')) {
                        mkdir('public/video/larg/', 0777, true);

                    }
                    
                    $image_resize1 =public_path('video/larg/');
                    $images1->move($image_resize1,$imageName);

                    $video->image = 'video/larg/' . $imageName;
    
         }
     $video->save();
 
    return  redirect('admin/Video')->with('success','تم اضافة الفيديو بنجاح');
 
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

        $categories =Category::where([['status','1'],['type','video']])->get();
        $video=Video::find($id);
    
        return view('Admin.video.video.edit',compact('categories','video'));
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
        $this->validate($request,[
            'name_ar'=>'required',
            'category_id'=>'required',
            'subcategory'=>'required',

        ],[
            'name_ar.required' => 'اسم الفيديو باللغة العربية مطلوب ',
            'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
            'subcategory.required' => 'اسم القسم الفرعي   مطلوب ',
            
            ]
        
        );
     $video=Video::find($id);
        if($video){
            $code_slug=explode('-',$video->slogen_ar);
            $slug_id=$code_slug[0];
    
        }else{
          $slug_id=100001;
        }
 
        $video->name_ar=$request->name_ar;
        $video->name_en=$request->name_en;
        $video->tag_ar=$request->tag_ar;
        $video->tag_en=$request->tag_en;
        $video->slogen_ar=$slug_id."-".$this->make_slug($request->input('name_ar'));
        $video->slogen_en=$slug_id."-".$this->make_slug($request->input('name_en'));
        $video->status=$request->status;
        $video->category_id=$request->category_id;
        $video->subcategory_id=$request->subcategory;
        $video->subtwocategory_id=$request->subsubcategory;
    
            if ($request->hasFile('pro_image')) {
                $images1 = $request->file('pro_image');
                
                        $imageExtension = $images1->getClientOriginalExtension();
                        $imageName ='product_' . time() . '.' . $imageExtension;
                        if (!file_exists('public/video/larg/')) {
                            mkdir('public/video/larg/', 0777, true);
    
                        }
                        
                        $image_resize1 =public_path('video/larg/');
                        $images1->move($image_resize1,$imageName);
    
                        $video->image = 'video/larg/' . $imageName;
        
             }
         $video->save();
         
        return  redirect('admin/Video')->with('success','تم تعديل الفيديو بنجاح');
     
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
        $video=Video::find($id)->delete();

        return  redirect('admin/Video')->with('success','تم حذف الفيديو بنجاح');

    }

    public function getSubcategory(Request $request)
    {
        $subcategories =Sub_Category::where([["category_id",$request->category_id],['type','video']])
        ->pluck("name_ar","id");
        return response()->json($subcategories);
    }
    public function getFilter(Request $request)
    {
        $subcategory=SubTwoCategory::find([[$request->subcategory_id],['type','video']]);
        $filterss=$subcategory->pluck("name_ar","id");
       
        return response()->json($filterss);
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
