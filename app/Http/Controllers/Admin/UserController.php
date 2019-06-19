<?php


namespace App\Http\Controllers\Admin;
use App\User;
use App\Country;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserRole;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ids =UserRole::all()->pluck('user_id');
        $all_user= User::whereIn('id', $ids)->get();
        // dd($all_user);

       return view('Admin.users.index',compact('all_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.users.create');
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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],[
            'fname.required' => 'اسم الاول مطلوب ',
            'lname.required' => ' الاسم الاخير مطلوب ',
            'email.required' => 'البريد الالكتروني  مطلوب ',
            'email.unique' => '  البريد الالكتروني يجب ان يكون غير مسجل من قبل ',
            'password.required'=>'يجب ان تدخل كلمة سر',
            ]

        );

        // 'fname', 'lname', 'phone', 'address', 'jop',
        // 'email', 'password', 'country_id',
        $user=new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
       if($user->save()){
         $userrol=new UserRole;
         $userrol->user_id=$user->id;
         $userrol->role_id=\App\Role::where('name','Admin')->first()->id;
         $userrol->save();
        }
        return  redirect()->route('User.index')
        ->with('success','تم اضافة العميل');
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
        $customer=User::find($id);

        return view('Admin.users.show',compact('customer'));
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
        $customer=User::find($id);

        return view('Admin.users.edit',compact('customer'));

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
            'address' => 'nullable|string|max:255',
            'jop' => 'nullable',
            'email' => 'required|string|email|max:255',
            // 'password' => 'required|string|min:6|confirmed',
        ],[
            'fname.required' => 'اسم الاول مطلوب ',
            'lname.required' => ' الاسم الاخير مطلوب ',
            'email.required' => 'البريد الالكتروني  مطلوب ',
            'email.unique' => '  البريد الالكتروني يجب ان يكون غير مسجل من قبل ',
            ]

        );
        //
       $user=User::find($id);
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            if($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
        return  redirect()->route('User.index')
        ->with('success','تم تعديل المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=User::find($id)->delete();
        return  redirect()->route('User.index')
        ->with('success','تم حذف العميل بنجاح ');
    }
    public function unadmin(Request $request){
      // `user_id`, `role_id` userunadmin

      $userrol=User::find($request->id);
       // $userrol->roles->first()->delete();
       $userrol->roles()->detach(\App\Role::where('name','Admin')->first()->id);
      return  redirect()->route('Customer.index')
      ->with('success','تم حذف الادمن بنجاح ');
    }
}
