<?php

namespace App\Http\Controllers\Admin;
use App\CategoryNew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryNewController extends Controller
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
        $all_category_news=CategoryNew::all();
        return view('Admin.categoriesnews.index',compact('all_category_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.categoriesnews.create');

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
  
        $this->validate($request,[
            'ar_name'=>'required',
         
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            ]

        );
        //'name_ar', 'name_en', 'status', 'slogen_ar', 'slogen_en',
        $category=new CategoryNew;
        $category->name_ar=$request->ar_name;
        $category->name_en=$request->en_name;
        $category->slogen_ar=$this->make_slug($request->input('ar_name'));
        $category->slogen_en=$this->make_slug($request->input('en_name'));
        $category->status=$request->status;
        $category->save();
        return  redirect('admin/CategoriesNews')->with('success','تم اضافة القسم الاخباري  بنجاح');

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
        $category=CategoryNew::find($id);
        // dd($category);
        return view('Admin.categoriesnews.edit',compact('category'));

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
         
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            ]

        );
        //'name_ar', 'name_en', 'status', 'slogen_ar', 'slogen_en',
        $category=CategoryNew::find($id);
        $category->name_ar=$request->ar_name;
        $category->name_en=$request->en_name;
        $category->slogen_ar=$this->make_slug($request->ar_name);
        $category->slogen_en=$this->make_slug($request->en_name);
        $category->status=$request->status;
        $category->save();
        return  redirect('admin/CategoriesNews')->with('success','تم تعديل القسم الاخباري  بنجاح');

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
        $categorynews=CategoryNew::find($id)->delete();
        return  redirect('admin/CategoriesNews')->with('success','تم حذف القسم الاخباري  بنجاح');
    }
}
