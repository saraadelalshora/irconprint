<?php

namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Cart;
use Auth;
use App;
use Carbon\Carbon;
use App\Product;
class CartController extends Controller
{
    //
    public function CartShow() {
        $i = 1;
        $cart = Cart::getContent();
        $cartsum = Cart::getTotal();

        if (Session::get('lang') == null) {
            Session::put('lang', 'ar');
        }
        if (Session::get('lang') == 'ar') {
            App::setLocale('ar');
            Carbon::setLocale('ar');
        } else {

            App::setLocale('en');
            Carbon::setLocale('en');
        }
        // dd($cart->count());
        return view('Frontend.cart', compact('i', 'cart', 'cartsum'));
        
    }

    public function AddToCart($id, Request $request) {
        $prodectcart = Product::
                where('id', $id)
                ->first();

        $cart = Cart::getContent();
        
        

        if ($prodectcart && $prodectcart->discount_price > 0) {
            $price = $prodectcart->discount_price;
        } else {
            $price = $prodectcart->price;
        }

        $saleCondition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'SALE 5%',
            'type' => 'tax',
            'value' => '+5%',
        ));
        

        $addcart = Cart::add(array(
                    array(
                        'id' => $prodectcart->id,
                        'name' => $prodectcart->name_ar,
                        'price' => $price,
                        'quantity' => $request->input('quantity'),
                        'attributes' => array(
                            'name_en' => $prodectcart->name_en,
                            'image' => $prodectcart->images->first()->img,
                            'slogen_ar' => $prodectcart->slogen_ar,
                            'slogen_en' => $prodectcart->slogen_en,
                            'sub_cat_ar' => $prodectcart->subcategory->name_ar,
                            'sub_cat_en' => $prodectcart->subcategory->name_en,
                        ),
                        'conditions' => $saleCondition
                    )
        ));
        
        Session::flash('success', trans('home.Yourrequesthasbeensuccessfullysent'));
        return Redirect::back();

        if (Session::get('lang') == null) {
            Session::put('lang', 'ar');
        }
        if (Session::get('lang') == 'ar') {
            App::setLocale('ar');
            Carbon::setLocale('ar');
        } else {

            App::setLocale('en');
            Carbon::setLocale('en');
        }
    }
    
    
    public function AddSpeedtoCart($id) {
        $prodectcart = Product::where('id', $id)
                ->first();
                if ($prodectcart && $prodectcart->discount_price > 0) {
                    $price = $prodectcart->discount_price;
                } else {
                    $price = $prodectcart->price;
                }
        $saleCondition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'taxes 5%',
            'type' => 'tax',
            'value' => '+5%',
        ));

        $addcart = Cart::add(array(
                    array(
                      'id' => $prodectcart->id,
                        'name' => $prodectcart->name_ar,
                        'price' => $price,
                        'quantity' => 1,
                        'attributes' => array(
                            'name_en' => $prodectcart->name_en,
                            'image' => $prodectcart->images->first()->img,
                            'slogen_ar' => $prodectcart->slogen_ar,
                            'slogen_en' => $prodectcart->slogen_en,
                            'sub_cat_ar' => $prodectcart->subcategory->name_ar,
                            'sub_cat_en' => $prodectcart->subcategory->name_en,
                        ),
                        'conditions' => $saleCondition
                    )
        ));
        Session::flash('success', trans('home.Productsuccessfullyadded'));
        return Redirect::back();
        if (Session::get('lang') == null) {
            Session::put('lang', 'ar');
        }
        if (Session::get('lang') == 'ar') {
            App::setLocale('ar');
            Carbon::setLocale('ar');
        } else {

            App::setLocale('en');
            Carbon::setLocale('en');
        }
    }

    public function editquntity($id, Request $request) {
        // dd($id,$request->all());
        try {
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->input('qty')
                ),
            ));

            Session::flash('success', trans('home.Yourrequesthasbeensuccessfullysent'));
            return Redirect::back();
        } catch (\Exception $ex) {
            Session::flash('error', trans('home.Therequestwasnotsent'));
            return Redirect::back();
        }

      
    }

    public function DeleteCart($id) {
        try {
            Cart::remove($id);
            $cartcount=Cart::getContent();
            
            if($cartcount->isEmpty()){
                Session::flash('success', trans('home.Successfullydeleted'));
                return Redirect::back();
            }else{
                Session::flash('success', trans('home.Successfullydeleted'));
                return redirect()->to('/');
            }
          
        } catch (\Exception $ex) {
            Session::flash('error', trans('home.Notdeleted'));
            return Redirect::back();
        }
    }
}
