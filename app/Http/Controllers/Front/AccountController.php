<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use App\User;
use Auth;
use App\Product;
class AccountController extends Controller
{
    //
  
    public function show_profile(){
         $Countries = Country::all();
         $city=City::find(Auth::user()->city_id);
        return view('FrontEnd.profile',compact('Countries','city'));
    }
    public function update_profile(Request $request,$id){
        // dd($request->all());
        $this->validate($request,[
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'string|max:255',
            'address' => 'string|max:255',
            'country_id' => 'required',
            'city' => 'required',
            'email' => 'required|string|email|max:255',
        ],[
            'fname.required' => 'اسم الاول مطلوب ',
            'lname.required' => ' الاسم الاخير مطلوب ',
            'email.required' => 'البريد الالكتروني  مطلوب ',
            'email.unique' => '  البريد الالكتروني يجب ان يكون غير مسجل من قبل ',
            'country_id.required'=>'الدولة مطلوبة',
            'city.required'=>'المحافظة مطلوبة',
           
            ]

        );
        // 
       $user=User::find($id);
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->address= $request->address;
            $user->zipcode = $request->zipcode;
            $user->phone = $request->phone;
            $user->country_id = $request->country_id;
            $user->city_id = $request->city;
            $user->email = $request->email;
            if($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            if($user->save()){
                return  redirect()->back()
                ->with('success','تم تعديل البيانات  بنجاح');
            }
            else{
                return  redirect()->back()
                ->with('error','حدث خطا ما');
            }
      
    }

}
