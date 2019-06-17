<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    //overload redirect to
    public function redirectTo()
     {
     return app()->getLocale() . '/';
     }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
      $Countries = Country::all();
       return view('auth.register', compact('Countries'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data,[
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'string|max:255',
            'address' => 'string|max:255',
            'country_id' => 'required',
            'city' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'fname.required' => 'اسم الاول مطلوب ',
            'lname.required' => ' الاسم الاخير مطلوب ',
            'email.required' => 'البريد الالكتروني  مطلوب ',
            'email.unique' => '  البريد الالكتروني يجب ان يكون غير مسجل من قبل ',
            // 'address.required'=>'عنوانك مطلوب',
            'country_id.required'=>'الدولة مطلوبة',
            'city.required'=>'المحافظة مطلوبة',
            'password.required'=>'يجب ان تدخل كلمة سر',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'zipcode' => $data['zipcode'],
            'country_id' => $data['country_id'],
            'city_id' => $data['city'],
            // 'notes' => $data['note'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
