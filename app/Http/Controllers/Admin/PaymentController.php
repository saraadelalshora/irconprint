<?php

namespace App\Http\Controllers\Admin;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_payment=Payment::all();
        return view('Admin.payments.index',compact('all_payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.payments.create');
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
        $payment=new Payment;
        $payment->name_ar=$request->ar_name;
        $payment->name_en=$request->en_name;
        $payment->status=$request->status;
        $payment->save();
        return  redirect('admin/Payment')->with('success','تم اضافة طريقة الدفع بنجاح');
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
        $payment=Payment::find($id);
        return view('Admin.payments.edit',compact('payment'));
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
        $payment=Payment::find($id);
        $payment->name_ar=$request->ar_name;
        $payment->name_en=$request->en_name;
        $payment->status=$request->status;
        $payment->save();
        return  redirect('admin/Payment')->with('success','تم تعديل طريقة الدفع بنجاح');
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
        Payment::find($id)->delete();
        return  redirect('admin/Payment')->with('success','تم حذف طريقة الدفع بنجاح');
    }
}
