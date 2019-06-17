<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Specification;
use App\Filter;
use App\Specification_details;

class SpacificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // ss
        $all=Specification::all();
        return view('Admin.spacifications.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $filter=Filter::where('status','1')->get();
        return view('Admin.spacifications.create',compact('filter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'spec_name_ar'=>'required',
            // 'group_spec'=>'required',
            'spec_number'=>'required',
        ],[
            'spec_name_ar.required' => 'اسم  باللغة العربية مطلوب ',
            // 'group_spec.required' => 'وصف الجروب  مطلوب ',
            'spec_number.required' => 'الترتيب  مطلوب ',
           
            ]
        );
        $spacification=new Specification;
        $spacification->name_ar=$request->spec_name_ar;
        $spacification->name_en=$request->spec_name_en;
        $spacification->tag_ar=$request->spec_tage_ar;
        $spacification->tag_en=$request->spec_tage_en;
        $spacification->order=$request->spec_number;
        // $spacification->filter_id=$request->group_spec;
        $spacification->status=$request->status;
        // $spacification->type=$request->spec_type;
        //type->0 for select 1 for type text \

        $spacification->save();
        if($spacification->save()){
            // if($request->spec_type==0){
                $arr = explode(',', $request->input('spec_tage_ar'));
                $enn = explode(',', $request->input('spec_tage_en'));
                if (is_array($arr)) {
                    $deatils = [];
                    foreach ($arr as $key => $feature) {
                        $deatils= Specification_details::create([
                            'specification_id' => $spacification->id,
                            'name_ar' => $arr [$key],
                            'name_en' => $enn [$key],
                        ]);
                    // }
                 
                }
              }
              return  redirect('admin/Spacification')->with('success','تم اضافة جروب الموصفات بنجاح ');
        }
        else{
            return back()->with('erorr');
        }
       

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
        $filter=Filter::where('status','1')->get();
        $spacification=Specification::find($id);
        $spacification->specificationDetails;

        return view('Admin.spacifications.edit',compact('filter','spacification'));
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
            'spec_name_ar'=>'required',
            // 'group_spec'=>'required',
            'spec_number'=>'required',
        ],[
            'spec_name_ar.required' => 'اسم  باللغة العربية مطلوب ',
            // 'group_spec.required' => 'وصف الجروب  مطلوب ',
            'spec_number.required' => 'الترتيب  مطلوب ',
           
            ]

        );
        $spacification=Specification::find($id);
        $spacification->name_ar=$request->spec_name_ar;
        $spacification->name_en=$request->spec_name_en;
        $spacification->tag_ar=$request->spec_tage_ar;
        $spacification->tag_en=$request->spec_tage_en;
        $spacification->order=$request->spec_number;
        // $spacification->filter_id=$request->group_spec;
        $spacification->status=$request->status;
        // $spacification->type=$request->spec_type;
        //type->0 for select 1 for type text \

        $spacification->save();
        if($spacification->save()){
            // if($request->spec_type==0){
                $arr = explode(',', $request->input('spec_tage_ar'));
                $enn = explode(',', $request->input('spec_tage_en'));
                if (is_array($arr)) {
                    if($spacification->specificationDetails){
                    $spacification->specificationDetails()->delete();
                        
                    }
                    $deatils = [];
                    foreach ($arr as $key => $feature) {
                        $deatils= new Specification_details;
                        $deatils->specification_id = $spacification->id;
                        $deatils->name_ar= $arr [$key];
                        if(isset($enn[$key])){
                            $deatils->name_en= $enn [$key];
                        }
                        $deatils->save();
                    }
                 
                }
            //   }
              return  redirect('admin/Spacification')->with('success','تم تعديل جروب الموصفات بنجاح ');
        }
        else{
            return back()->with('erorr');
        }
       

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
        $spacification= Specification::find($id)->delete();
        return  redirect('admin/Spacification')->with('success','تم حذف جروب الموصفات بنجاح ');

    }
}
