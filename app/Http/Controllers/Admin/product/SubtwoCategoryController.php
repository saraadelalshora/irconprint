<?php

namespace App\Http\Controllers\Admin\product;

use App\Sub_Category;
use App\SubTwoCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class SubtwoCategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=SubTwoCategory::where('type','product')->orderBy('id', 'desc')->get();
        return view('Admin.products.subtwocategories.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $filters=Filter::where('status','1')->get();
        
        $categories =Sub_Category::where([['status','1'],['type','product']])->get();
        // dd($categories);
        return view('Admin.products.subtwocategories.create',compact('categories'));

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
            'name_ar'=>'required',
            'description_ar'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'name_ar.required' => 'اسم القسم باللغة العربية مطلوب ',
            'description_ar.required' => 'وصف القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );

        $subcategory=new SubTwoCategory;
        $subcategory->name_ar=$request->name_ar;
        $subcategory->name_en=$request->name_en;
        $subcategory->description_ar=$request->description_ar;
        $subcategory->description_en=$request->description_en;
        $subcategory->subcategory_id=$request->category;
        $subcategory->tag_ar=$request->tag_ar;
        $subcategory->tag_en=$request->tag_en;
        $subcategory->slogen_ar=$this->make_slug($request->name_ar);
        $subcategory->slogen_en=$this->make_slug($request->name_en);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='Category_'.time().'.'.$imageExtension;
            if (!file_exists('public/product/subtwocategories/larg/')) {
                mkdir('public/product/subtwocategories/larg/', 0777, true);
            }
            if (!file_exists('public/product/subtwocategories/small/')) {
                mkdir('public/product/subtwocategories/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 500);
            $image_resize->save(public_path('product/subtwocategories/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(250, 250);
            $image_resize1->save(public_path('product/subtwocategories/small/' .$imageName));
            $subcategory->image='product/subtwocategories/larg/'.$imageName;
            
        }
        $subcategory->status=$request->status;
        $subcategory->type='product';
        $subcategory->save();
        // if($subcategory->save()){
        //     $filter=$request->input('filter');
        //     $subcategory->filters()->sync($filter);
        // }
        return  redirect('admin/product/SubtwoCategory')->with('success','تم اضافة القسم الفرعي بنجاح');
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
        // $filters=Filter::where('status','1')->get();
        $categories =Sub_Category::where([['status','1'],['type','product']])->get();
        $subcategory=SubTwoCategory::find($id);
        return view('Admin.products.subtwocategories.edit',compact('subcategory','categories'));

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
            'name_ar'=>'required',
            'description_ar'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'name_ar.required' => 'اسم القسم باللغة العربية مطلوب ',
            'description_ar.required' => 'وصف القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );

        $subcategory=SubTwoCategory::find($id);
        $subcategory->name_ar=$request->name_ar;
        $subcategory->name_en=$request->name_en;
        $subcategory->description_ar=$request->description_ar;
        $subcategory->description_en=$request->description_en;
        $subcategory->subcategory_id=$request->category;
        $subcategory->tag_ar=$request->tag_ar;
        $subcategory->tag_en=$request->tag_en;
        $subcategory->slogen_ar=$this->make_slug($request->name_ar);
        $subcategory->slogen_en=$this->make_slug($request->name_en);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='Category_'.time().'.'.$imageExtension;
            if (!file_exists('public/product/subtwocategories/larg/')) {
                mkdir('public/product/subtwocategories/larg/', 0777, true);
            }
            if (!file_exists('public/product/subtwocategories/small/')) {
                mkdir('public/product/subtwocategories/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 500);
            $image_resize->save(public_path('product/subtwocategories/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(250, 250);
            $image_resize1->save(public_path('product/subtwocategories/small/' .$imageName));
            $subcategory->image='product/subtwocategories/larg/'.$imageName;
            
        }
        $subcategory->status=$request->status;
        $subcategory->type='product';

        $subcategory->save();
        // if($subcategory->save()){
        //     $filter=$request->input('filter');
        //     $subcategory->filters()->sync($filter);
        // }
        return  redirect('admin/product/SubtwoCategory')->with('success','تم تعديل القسم الفرعي بنجاح');
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
        $subcategory=SubTwoCategory::find($id)->delete();
        return  redirect('admin/product/SubtwoCategory')->with('success','تم حذف القسم الفرعي بنجاح');
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
