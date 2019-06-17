<?php

namespace App\Http\Controllers\Admin;
use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_City=City::all();
        return view('Admin.Cities.index',compact('all_City'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $city=City::find($id);
        $countries=Country::all();
        return view('Admin.Cities.edit',compact('city','countries'));
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
        $city=City::find($id);
        $city->name_ar=$request->ar_name;
        $city->name_en=$request->en_name;
        $city->country_id=$request->country;
        if($city->save()){
            return  redirect('admin/Cities')->with('success',"تم التعديل بنجاح");
        }
        else{
            return  redirect('admin/Cities')->with('error',"حدث خطأ");
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
        if($city=City::find($id)->delete())
        {
            return  redirect('admin/Cities')->with('success',"تم الحذف بنجاح");
        }
        else{
            return  redirect('admin/Cities')->with('error',"لم يتم الحذف حدث خطأ ما  ");

        }
    }
}
