<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=Category::all();
        return view('Admin.categories.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.categories.create');
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
            'ar_description'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            'ar_description.required' => 'وصف القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        //'tag_ar', 'tag_en', 'image', 'slogen_ar', 'slogen_en', 'status',
        $category=new Category;
        $category->name_ar=$request->ar_name;
        $category->name_en=$request->en_name;
        $category->description_ar=$request->ar_description;
        $category->description_en=$request->en_description;
        $category->tag_ar=$request->ar_tag;
        $category->tag_en=$request->en_tag;
        $category->slogen_ar=$this->make_slug($request->ar_name);
        $category->slogen_en=$this->make_slug($request->en_name);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='Category_'.time().'.'.$imageExtension;
            if (!file_exists('public/category/larg/')) {
                mkdir('public/category/larg/', 0777, true);
            }
            if (!file_exists('public/category/small/')) {
                mkdir('public/category/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(210, 270);
            $image_resize->save(public_path('category/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(250, 250);
            $image_resize1->save(public_path('category/small/' .$imageName));
            $category->image='category/larg/'.$imageName;
            
        }
        $category->status=$request->status;
        $category->save();
        return  redirect('admin/Category')->with('success','تم اضافة القسم الرئيسي بنجاح');

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
        $category=Category::find($id);
        return view('Admin.categories.edit',compact('category'));
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
        $this->validate($request,[
            'ar_name'=>'required',
            'ar_description'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            'ar_description.required' => 'وصف القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        //'tag_ar', 'tag_en', 'image', 'slogen_ar', 'slogen_en', 'status',
        $category=Category::find($id);
        $category->name_ar=$request->ar_name;
        $category->name_en=$request->en_name;
        $category->description_ar=$request->ar_description;
        $category->description_en=$request->en_description;
        $category->tag_ar=$request->ar_tag;
        $category->tag_en=$request->en_tag;
        $category->slogen_ar=$this->make_slug($request->ar_name);
        $category->slogen_en=$this->make_slug($request->en_name);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='Category_'.time().'.'.$imageExtension;
            if (!file_exists('public/category/larg/')) {
                mkdir('public/category/larg/', 0777, true);
            }
            if (!file_exists('public/category/small/')) {
                mkdir('public/category/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(210, 270);
            $image_resize->save(public_path('category/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(250, 250);
            $image_resize1->save(public_path('category/small/' .$imageName));
            $category->image='category/larg/'.$imageName;
            
        }
        $category->status=$request->status;
        $category->save();
        return  redirect('admin/Category')->with('success','تم تعديل القسم الرئيسي بنجاح');
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
        $category=Category::find($id);
        if($category->image != null){
            if(file_exists(asset("public/".$category->image))){
                unlink("public/".$category->image);
                unlink( "public/".str_replace("small","larg",$category->image));
            }
          
        }
        $category->delete();
        return  redirect('admin/Category')->with('success','تم الحذف المصنع بنجاح');

    
    }
}
