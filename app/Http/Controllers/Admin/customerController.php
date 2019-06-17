<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Country;
use App\City;
use App\Order;
 use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        $ids = UserRole::all()->pluck('user_id');
        $all= User::whereNotIn('id', $ids)->get();
        return view('Admin.customer.index',compact('all'));
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries=Country::all();
        return view('Admin.customer.create',compact('countries'));
        
        // $cities=City::all();
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
//         "fname" => "ssa"
//   "lname" => "adel"
//   "email" => "saraalshora"
//   "phone" => "1211309733"
//   "address" => "مسجد النصر شارع 9 المقطم"
//   "zipcode" => "11571"
//   "country_id" => "1"
//   "city_id" => "1"
//   "password" => "123123"
//   "password_confirmation" => "123123"
//   "note" => null
        // dd($request->all());
        $this->validate($request,[
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address' => 'string|max:255',
            'country_id' => 'required',
            'city_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],[
            'fname.required' => 'اسم الاول مطلوب ',
            'lname.required' => ' الاسم الاخير مطلوب ',
            'email.required' => 'البريد الالكتروني  مطلوب ',
            'email.unique' => '  البريد الالكتروني يجب ان يكون غير مسجل من قبل ',
            'country_id.required'=>'الدولة مطلوبة',
            'city_id.required'=>'المحافظة مطلوبة',
            'password.required'=>'يجب ان تدخل كلمة سر',
            ]

        );
        // 'fname', 'lname', 'phone', 'address', 'zipcode',
        // 'notes', 'email', 'password', 'city_id', 'country_id',
        $user=new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->country_id = $request->country_id;
        $user->city_id = $request->city_id;
        $user->notes = $request->note;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
    return  redirect()->route('Customer.index')
    ->with('success','تم تعديل العميل بنجاح');
     
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
        $countries=Country::all();
        $customer=User::find($id);
        $city=City::find($customer->city_id);
        return view('Admin.customer.show',compact('countries','customer','city'));
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
        $countries=Country::all();
        $customer=User::find($id);
        $city=City::find($customer->city_id);
        return view('Admin.customer.edit',compact('countries','customer','city'));
        
        
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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'string|max:255',
            'address' => 'string|max:255',
            'country_id' => 'required',
            'city_id' => 'required',
            'email' => 'required|string|email|max:255',
            // 'password' => 'required|string|min:6|confirmed',
        ],[
            'fname.required' => 'اسم الاول مطلوب ',
            'lname.required' => ' الاسم الاخير مطلوب ',
            'email.required' => 'البريد الالكتروني  مطلوب ',
            'email.unique' => '  البريد الالكتروني يجب ان يكون غير مسجل من قبل ',
            // 'address.required'=>'عنوانك مطلوب',
            'country_id.required'=>'الدولة مطلوبة',
            'city_id.required'=>'المحافظة مطلوبة',
            // 'password.required'=>'يجب ان تدخل كلمة سر',
            ]

        );
        // 
       $user=User::find($id);
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->zipcode = $request->zipcode;
            $user->country_id = $request->country_id;
            $user->city_id = $request->city_id;
            $user->notes = $request->note;
            $user->email = $request->email;
            if($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
        return  redirect()->route('Customer.index')
        ->with('success','تم تعديل العميل بنجاح');
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
        $customer=User::find($id)->delete();
        return  redirect()->route('Customer.index')
        ->with('success','تم حذف العميل بنجاح ');
    }
    public function getcities(Request $request)
    {
        // dd($request->all());
        $cities =City::where('country_id',$request->country_id)
        ->pluck('name_ar','id');
        // dd($cities);
        return response()->json($cities);
    }

    public function admin(Request $request){
        // `user_id`, `role_id`
        $request->id;
        $userrol=new UserRole;
        $userrol->user_id=$request->id;
        $userrol->role_id=\App\Role::where('name','Admin')->first()->id;
        $userrol->save();
        return  redirect()->route('user.index')
        ->with('success','تم اضافة الادمن بنجاح ');
      }
}
