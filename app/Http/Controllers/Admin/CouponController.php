<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use App\Product;
Use App\Category;
use App\Product_coupon;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $all=Coupon::latest()->get();
       return view('Admin.coupon.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorie=Category::where('status','1')->get();
        $products=Product::where('status','1')->get();
        return view('Admin.coupon.create',compact('categorie','products'));
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
        // "code" => "kl"
        // "coupon_type" => "1"
        // "description" => "lkl"
        // "value" => "kllk"
        // "enddate" => "2019-05-20"
        // "maxvalue" => "12"
        // "coupon_product" => "9"
        // "out_coupon_product" => "9"
        // "coupon_category" => "4"
        // "out_coupon_category" => "5"
        // "limit_per_user" => "2"
        // "usinglimit" => "2"
        // it should be dynamic and unique 

        $coupon=new Coupon;
        $coupon->code=$this->generateRandomString(6);;
        //1=> for money type 0=> for persentage value 
        $coupon->coupon_type=$request->coupon_type;
        $coupon->description=$request->description;
        $coupon->value=$request->value;
        $coupon->startdate=$request->startdate;
        $coupon->enddate=$request->enddate;
        $coupon->maxvalue=$request->maxvalue;
        $coupon->limit_per_user=$request->limit_per_user;
        $coupon->usinglimit=$request->usinglimit;
        $coupon->status=$request->status;
        if($coupon->save()){
         if($request->coupon_product){
            foreach($request->coupon_product as $product_id){
             $product=new Product_coupon;
             $product->product_id=$product_id;
             $product->coupon_id= $coupon->id;
             $product->save();
            }
          }
          if($request->out_coupon_product){
             foreach($request->out_coupon_product as $outproduct_id){
              $product=new Product_coupon;
              $product->out_product_id=$outproduct_id;
              $product->coupon_id= $coupon->id;
              $product->save();
              }
           }
           if($request->coupon_category){
            foreach($request->coupon_category as $coupon_category){
             $product=new Product_coupon;
             $product->Category_id=$coupon_category;
             $product->coupon_id= $coupon->id;
             $product->save();
             }
          }
          if($request->out_coupon_category){
            foreach($request->out_coupon_category as $out_coupon_category){
             $product=new Product_coupon;
             $product->out_Category_id=$out_coupon_category;
             $product->coupon_id= $coupon->id;
             $product->save();
             }
          }


        }
        return  redirect()->route('Coupon.index')
        ->with('success','تم اضافة الكوبون بنجاح');
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
        $categorie=Category::where('status','1')->get();
        $products=Product::where('status','1')->get();
        $coupon=Coupon::find($id);
        $coupon_product=Product_coupon::where('coupon_id',$id)->get();
        return view('Admin.coupon.edit',compact('categorie','products','coupon','coupon_product'));
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
        
        $coupon=Coupon::find($id);
        // $coupon->code=$this->generateRandomString(6);;
        //1=> for money type 0=> for persentage value 
        $coupon->coupon_type=$request->coupon_type;
        $coupon->description=$request->description;
        $coupon->value=$request->value;
        $coupon->startdate=$request->startdate;
        $coupon->enddate=$request->enddate;
        $coupon->maxvalue=$request->maxvalue;
        $coupon->limit_per_user=$request->limit_per_user;
        $coupon->usinglimit=$request->usinglimit;
        $coupon->status=$request->status;
        if($coupon->save()){
         if($request->coupon_product){
            foreach($request->coupon_product as $product_id){
             $product=new Product_coupon;
             $product->product_id=$product_id;
             $product->coupon_id= $coupon->id;
             $product->save();
            }
          }
          if($request->out_coupon_product){
             foreach($request->out_coupon_product as $outproduct_id){
              $product=new Product_coupon;
              $product->out_product_id=$outproduct_id;
              $product->coupon_id= $coupon->id;
              $product->save();
              }
           }
           if($request->coupon_category){
            foreach($request->coupon_category as $coupon_category){
             $product=new Product_coupon;
             $product->Category_id=$coupon_category;
             $product->coupon_id= $coupon->id;
             $product->save();
             }
          }
          if($request->out_coupon_category){
            foreach($request->out_coupon_category as $out_coupon_category){
             $product=new Product_coupon;
             $product->out_Category_id=$out_coupon_category;
             $product->coupon_id= $coupon->id;
             $product->save();
             }
          }


        }
        return  redirect()->route('Coupon.index')
        ->with('success','تم تعديل الكوبون بنجاح');
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
    }

    //auto generate to coupon code
    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
