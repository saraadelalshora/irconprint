<?php

namespace App\Http\Controllers\Admin;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=Slider::orderBy('id', 'desc')->get();
        return view('Admin.sliders.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.sliders.create');
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
        // dd($request->all());
        // "_token" => "UXVw0l9R1LMhEuzL03EUhlhvyXtbTpE3Nip5eskt"
        // "ar_name" => "dd"
        // "short_description_ar" => null
        // "description_ar" => null
        // "en_name" => null
        // "short_description_en" => null
        // "description_en" => null
        // "status" => "1"
        // "img" => UploadedFile {#126 ▶}
        // `img`, `link`, `title_ar`, `title_en`, `short_desc_ar`, `short_desc_en`, `description_ar`, `description_en`, `status`,
        $this->validate($request,[
            'ar_name'=>'required',
            'img.required' => 'الصورة مطلوب ',
            'img'=>'required|mimes:jpeg,jpg,png,gif|max:5000'
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        $Slider=new Slider;
        $Slider->title_ar=$request->ar_name;
        $Slider->title_en=$request->en_name;
        $Slider->description_ar=$request->description_ar;
        $Slider->description_en=$request->description_en;
        $Slider->short_desc_ar=$request->short_description_ar;
        $Slider->short_desc_en=$request->short_description_en;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='news_'.time().'.'.$imageExtension;
            if (!file_exists('public/slider/larg/')) {
                mkdir('public/slider/larg/', 0777, true);
            }
          
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(870, 412);
            $image_resize->save(public_path('slider/larg/' .$imageName));
            $Slider->img='slider/larg/'.$imageName;
            
        }
        $Slider->status=$request->status;
        $Slider->save();
        return  redirect('admin/Slider')->with('success','تم اضافة الصورة بنجاح');


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
        $slider=Slider::find($id);
        return view('Admin.sliders.edit',compact('slider'));
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
            'img'=>'mimes:jpeg,jpg,png,gif|max:5000'
        ],[
            'ar_name.required' => 'اسم القسم باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        $Slider=Slider::find($id);
        $Slider->title_ar=$request->ar_name;
        $Slider->title_en=$request->en_name;
        $Slider->description_ar=$request->description_ar;
        $Slider->description_en=$request->description_en;
        $Slider->short_desc_ar=$request->short_description_ar;
        $Slider->short_desc_en=$request->short_description_en;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='news_'.time().'.'.$imageExtension;
            if (!file_exists('public/slider/larg/')) {
                mkdir('public/slider/larg/', 0777, true);
            }
          
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(870, 412);
            $image_resize->save(public_path('slider/larg/' .$imageName));
            $Slider->img='slider/larg/'.$imageName;
            
        }
        $Slider->status=$request->status;
        $Slider->save();
        return  redirect('admin/Slider')->with('success','تم تعديل الصورة بنجاح');

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
        $slider=Slider::find($id)->delete();
        return  redirect('admin/Slider')->with('success','تم حذف الصورة بنجاح');
    }
}
