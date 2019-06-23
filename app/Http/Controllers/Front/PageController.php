<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Section;
use App\Project;
use App\Setting;
use App\Contact;
use App\NewSite;
use App\CategoryNew;
use App\categoryNewSite;
use App\Service;
use Mail;
class PageController extends Controller
{
    //
    public function about(){
        $land=Page::where('type','0')->get();
        // dd($page);
        return view('Frontend.page',compact('land'));
    }
 
    public function president(){
        $land=Page::where('type','1')->get();
        // dd($page);
        return view('Frontend.page',compact('land'));
    } 

    public function section(Request $request)
    {
        // dd($request->section);
       
        $section=Section::where('slogen_ar',$request->section)->orwhere('slogen_en',$request->section)->orderBy('order')->get();
        // dd($pages);
        return view('Frontend.section', compact('section'));
    }
    public function projects()
    {
        // dd($request->section);
       
        $projects=Project::orderBy('id', 'desc')->get();
        // dd($pages);
        return view('Frontend.project_list', compact('projects'));
    }
// singleproject
public function projectdetailis(Request $request) 
{
 
    $projects=Project:: where('slogen_en',$request->project)->orWhere('slogen_ar',$request->project)->get()->first();

    return view('Frontend.singleproject', compact('projects'));
}
    public function news(Request $request)
    {
        // dd($request->page);
        $newscategories=CategoryNew::where('status','1')->get();
        $news=NewSite::where('status','1')->orderBy('id', 'desc')->paginate(6);
        // dd($pages);
        return view('Frontend.newslist', compact('news','newscategories'));
    }
// newsdetails

public function newsdetailis(Request $request) 
{
    // dd($request->newslist);
    $newscategories=CategoryNew::where('status','1')->get();

    $news=NewSite::where('slogen_en',$request->newslist)->orWhere('slogen_ar',$request->newslist)->get()->first();
    // dd($news);
    return view('Frontend.singlenews', compact('newscategories','news'));
}
public function newscategory(Request $request)
{
    // dd($request->newslist);
    $newscategories=CategoryNew::where('status','1')->get();
    $cat=categoryNewSite::where('category_id',$request->newscat)->pluck('newsite_id');
    $news=NewSite::whereIn('id',$cat)->paginate(6);
    return view('Frontend.newslist', compact('newscategories','news'));
}
    public function show(Request $request)
    {
        //show page 
        $land=Page::where('slogen_ar',$request->page)->orwhere('slogen_en',$request->page)->get();
        // dd($pages);
        return view('Frontend.page', compact('land'));
    }

    public function services(Request $request)
    {
        $services=Service::where('status','1')->orderBy('id', 'desc')->get();
        $i=1;
        // dd($pages);
        return view('Frontend.services', compact('services','i'));
    }
// newsdetails

public function servicesdetailis(Request $request) 
{
 
    $serviceslist=Service::where('status','1')->orderBy('id', 'desc')->get();
    $servicedetails=Service::where('slogen_en',$request->service)->orWhere('slogen_ar',$request->service)->get()->first();
    return view('Frontend.singleservice', compact('serviceslist','servicedetails'));
}



    public function contactUS(){
        return view('Frontend.contact');
    }

    public function contactUSPost(Request $request)
    {

        $fname =$request->input('fname');
        $lname =$request->input('lname');
        $email =$request->input('email');
        // $title =$request->input('title');
        $massege =$request->input('massege');               
        
            try {
                    $data = array('fname'=>$fname,
                                  'lname'=>$lname,
                                  'email'=>$email,
                                //   'title'=>$title,
                                  'massege'=>$massege,
                                );
                                 
                    Contact::create($data);       
                    Mail::send(['text'=>'email.email'],$data, function ($message) use($email,$fname) {
                    $message->from($email);
                    $message->to('saraadelalshora@yahoo.com');
                    $message->subject($fname);
                    });
                    
                    return back()->with('settings','message','Your email has been sent successfully<br>Thank You for contacting us');
            } catch (Exception $e) {
                    return back()
                                        ->with('error','Something went wrong')
                                        ->withInput();
            }
       
    }
}
