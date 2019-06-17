<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Setting;
use App\Contact;
use Mail;
class PageController extends Controller
{
    //
    public function about($slug){
        $land=Page::where('slogen_ar',$slug)->orwhere('slogen_en',$slug)->get();
        // dd($page);
        return view('Frontend.page',compact('land'));
    }
 
    
    public function show(Request $request)
    {
        // dd($request->page);
        $page=Page::all();
        $locale=app()->getLocale();
        $land=Page::where('slogen_ar',$request->page)->orwhere('slogen_en',$request->page)->get();
        // dd($pages);
        return view('Frontend.page', compact('land','page','locale'));
    }

    public function contactUS(){
        return view('Frontend.contact');
    }

    public function contactUSPost(Request $request)
    {

        $fname =$request->input('fname');
        $lname =$request->input('lname');
        $email =$request->input('email');
        $title =$request->input('title');
        $massege =$request->input('massege');               
        
            try {
                    $data = array('fname'=>$fname,
                                  'lname'=>$lname,
                                  'email'=>$email,
                                  'title'=>$title,
                                  'massege'=>$massege,
                                );
                                 
                    Contact::create($data);       
                    Mail::send(['text'=>'email.email'],$data, function ($message) use($email,$title,$fname) {
                    $message->from($email);
                    $message->to('saraadelalshora@yahoo.com');
                    $message->subject($title);
                    });
                    
                    return back()->with('settings','message','Your email has been sent successfully<br>Thank You for contacting us');
            } catch (Exception $e) {
                    return back()
                                        ->with('error','Something went wrong')
                                        ->withInput();
            }
       
    }
}
