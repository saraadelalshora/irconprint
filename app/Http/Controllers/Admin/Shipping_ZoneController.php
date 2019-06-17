<?php

namespace App\Http\Controllers\Admin;
use App\Shipping_zone;
use App\City;
use App\CityZone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Shipping_ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shipping=Shipping_zone::all();
     
        return view('Admin.shippingzone.index',compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $all_city=City::all();
        return view('Admin.shippingzone.create',compact('all_city'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   'name_ar', 'name_en','status', 'type', 'price'
        $this->validate($request,[
            'ar_name'=>'required',
            'price'=>'nullable',
            'en_name'=>'nullable'
        ],[
                'name.required' => 'هذا الحقل مطلوب',

            ]

        );

        $shipping=new Shipping_zone;
        $shipping->name_ar=$request->ar_name;
        $shipping->name_en=$request->en_name;
        $shipping->status=$request->status;
        $shipping->type=$request->type;
        $shipping->price=$request->price;
        $shipping->save();
        if($shipping->save()){
        if($request->input('city')){
            $cities = $request->input('city');
          
            $shipping->cities()->sync($cities);
            // foreach($cities as $city){
            //     $cityzone=new CityZone;
            //      $cityzone->city_id=$city;
            //      $cityzone->zone_id=$shipping->id;
            //      $cityzone->save();          
            //     }
        }
       
        }
        return  redirect('admin/Shipping')->with('success','تم اضافة الشحن بنجاح');

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
        $all_city=City::all();
        $shipping=Shipping_zone::find($id);
       
        return view('Admin.shippingzone.edit',compact('shipping','cityzone','all_city'));
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
                //   'name_ar', 'name_en','status', 'type', 'price'
                $shipping=Shipping_zone::find($id);
                $shipping->name_ar=$request->ar_name;
                $shipping->name_en=$request->en_name;
                $shipping->status=$request->status;
                $shipping->type=$request->type;
                $shipping->price=$request->price;
                $shipping->save();
                if($shipping->save()){
                    if($request->input('city')){
                        $cities = $request->input('city');
                      
                        // foreach($cities as $city){
                        //     $cityzone=new CityZone;
                        //      $cityzone->city_id=$city;
                        //      $cityzone->zone_id=$shipping->id;
                        //      $cityzone->save();          
                        //     }
                  $shipping->cities()->sync($cities);

                    
                }
               
                }
                return  redirect('admin/Shipping')->with('success','تم تعديل الشحن بنجاح');
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
        Shipping_zone::find($id)->delete();
        $cityzone=CityZone::where('zone_id',$id)->get();
        if( $cityzone != null){
            foreach ($cityzone as $key) {
                $key->delete();  
            }    
        }
        return  redirect('admin/Shipping')->with('success','تم حذف منطقة الشحن بنجاح');
    }

}
