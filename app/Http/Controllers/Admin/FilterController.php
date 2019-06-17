<?php

namespace App\Http\Controllers\Admin;
use App\Filter;
use App\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_filter=Filter::all();
        return view('Admin.filters.index',compact('all_filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subcategories=Sub_Category::where('status','1')->get();
        return view('Admin.filters.create',compact('subcategories'));
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
            'en_name'=>'nullable'
        ],[
                'name.required' => 'هذا الحقل مطلوب',

            ]

        );
        $filter=new Filter;
        $filter->name_ar=$request->ar_name;
        $filter->name_en=$request->en_name;
        $filter->status=$request->status;
        $filter->save();
        if($filter->save()){
            $subcategory=$request->input('subcategory');
            $filter->subcategories()->sync($subcategory);
        }
        return  redirect('admin/Filter')->with('success','تم اضافة الفلتر بنجاح');
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
        $filter=Filter::find($id);
        $subcategories=Sub_Category::where('status','1')->get();
        return view('Admin.filters.edit',compact('filter','subcategories'));

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
            'en_name'=>'nullable'
        ],[
                'name.required' => 'هذا الحقل مطلوب',

            ]

        );
        $filter=Filter::find($id);
        $filter->name_ar=$request->ar_name;
        $filter->name_en=$request->en_name;
        $filter->status=$request->status;
        $filter->save();
        if($filter->save()){
            $subcategory=$request->input('subcategory');
            $filter->subcategories()->sync($subcategory);
        }
        return  redirect('admin/Filter')->with('success','تم تعديل الفلتر بنجاح');
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
        $filter=Filter::find($id)->delete();
        return  redirect('admin/Filter')->with('success','تم حذف الفلتر بنجاح');
    }
}
