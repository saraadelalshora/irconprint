<?php

namespace App\Http\Controllers\Admin\training;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sub_Category;
use App\Category;
use App\Training;
use App\Image;
use App\SubTwoCategory;
use Intervention\Image\ImageManagerStatic as Img;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=Training::orderBy('id', 'desc')->get();
        return view('Admin.training.training.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories =Category::where([['status','1'],['type','training']])->get();
        return view('Admin.training.training.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // 'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en', 'image', 'video', 
        // 'slogen_ar', 'slogen_en', 'status', 'category_id', 'subcategory_id', 'subtwocategory_id', 
// dd($request->all());

$this->validate($request,[
    'name_ar'=>'required',
    'description_ar'=>'required',
    'category_id'=>'required',
    'subcategory'=>'required',
    'img'=>'mimes:jpeg,jpg,png,gif|max:1000'
],[
    'name_ar.required' => 'اسم التدريب باللغة العربية مطلوب ',
    'description_ar.required' => 'وصف التدريب باللغة العربية مطلوب ',
    'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
    'subcategory.required' => 'وصف القسم الفرعي   مطلوب ',
    'img.mimes' => 'هذا النوع من الصور غير مسموح',
    'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
    ]

);
    //last id 
    $last_id=Training::latest()->get()->first();
    
    if($last_id){
        $code_slug=explode('-',$last_id->slogen_ar);
        $slug_id=++$code_slug[0];

    }else{
      $slug_id=100001;
    }
    $training=new Training;
    $training->name_ar=$request->name_ar;
    $training->name_en=$request->name_en;
    $training->description_ar=$request->description_ar;
    $training->description_en=$request->description_en;
    $training->tag_ar=$request->tag_ar;
    $training->tag_en=$request->tag_en;
    $training->slogen_ar=$slug_id."-".$this->make_slug($request->input('name_ar'));
    $training->slogen_en=$slug_id."-".$this->make_slug($request->input('name_en'));
    $training->status=$request->status;
    $training->category_id=$request->category_id;
    $training->subcategory_id=$request->subcategory;
    $training->subtwocategory_id=$request->subsubcategory;
     if ($request->hasFile('pro_image')) {
            $images1= $request->file('pro_image');
          
                    $imageExtension = $images1->getClientOriginalExtension();
                    $imageName ='Training_' .time() . '.' . $imageExtension;
                    if (!file_exists('public/training/larg/')) {
                        mkdir('public/training/larg/', 0777, true);

                    }
                    if (!file_exists('public/training/small/')) {
                        mkdir('public/training/small/', 0777, true);
                    }
                    
       
                    $image_resize = Img::make($images1->getRealPath());
                    $image_resize->resize(634, 811);
                    $image_resize->save(public_path('training/larg/' . $imageName));

                    $image_resize1 = Img::make($images1->getRealPath());
                    $image_resize1->resize(560, 460);
                    $image_resize1->save(public_path('training/small/' . $imageName));

                    $training->image = 'training/larg/' . $imageName;

                }
                if ($request->hasFile('video')) {
                    $images1 = $request->file('video');
                    
                            $imageExtension = $images1->getClientOriginalExtension();
                            $imageName ='Training_' . time() . '.' . $imageExtension;
                            if (!file_exists('public/training/video/larg/')) {
                                mkdir('public/training/video/larg/', 0777, true);
        
                            }
                            
                            $image_resize1 =public_path('training/video/larg/');
                            $images1->move($image_resize1,$imageName);
        
                            $training->video = 'training/video/larg/' . $imageName;
            
                 }
    $training->save();
   
 
    return  redirect('admin/training')->with('success','تم اضافة التدريب بنجاح');
 
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
        
        $categories =Category::where([['status','1'],['type','training']])->get();
        $training=Training::find($id);
        // $productspecification=Product_Specification::where('product_id',$id)->get();

        return view('Admin.training.training.edit',compact('categories','training'));
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
        // dd($request->all());
        $this->validate($request,[
            'name_ar'=>'required',
            'description_ar'=>'required',
            'category_id'=>'required',
            'subcategory'=>'required',
           
            'img'=>'mimes:jpeg,jpg,png,gif|max:1000'
        ],[
            'name_ar.required' => 'اسم التدريب باللغة العربية مطلوب ',
            'description_ar.required' => 'وصف التدريب باللغة العربية مطلوب ',
            'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
            'subcategory.required' => 'وصف القسم الفرعي   مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]
        
        );
     $training=Training::find($id);
        if($training){
            $code_slug=explode('-',$training->slogen_ar);
            $slug_id=$code_slug[0];
    
        }else{
          $slug_id=100001;
        }
 
        $training->name_ar=$request->name_ar;
        $training->name_en=$request->name_en;
        $training->description_ar=$request->description_ar;
        $training->description_en=$request->description_en;
        $training->tag_ar=$request->tag_ar;
        $training->tag_en=$request->tag_en;
        $training->slogen_ar=$slug_id."-".$this->make_slug($request->input('name_ar'));
        $training->slogen_en=$slug_id."-".$this->make_slug($request->input('name_en'));
        $training->status=$request->status;
        $training->category_id=$request->category_id;
        $training->subcategory_id=$request->subcategory;
        $training->subtwocategory_id=$request->subsubcategory;
         if ($request->hasFile('pro_image')) {
                $images1= $request->file('pro_image');
              
                        $imageExtension = $images1->getClientOriginalExtension();
                        $imageName ='Training_' .time() . '.' . $imageExtension;
                        if (!file_exists('public/training/larg/')) {
                            mkdir('public/training/larg/', 0777, true);
    
                        }
                        if (!file_exists('public/training/small/')) {
                            mkdir('public/training/small/', 0777, true);
                        }
                        
           
                        $image_resize = Img::make($images1->getRealPath());
                        $image_resize->resize(634, 811);
                        $image_resize->save(public_path('training/larg/' . $imageName));
    
                        $image_resize1 = Img::make($images1->getRealPath());
                        $image_resize1->resize(560, 460);
                        $image_resize1->save(public_path('training/small/' . $imageName));
    
                        $training->image = 'training/larg/' . $imageName;
    
                    }
                    if ($request->hasFile('video')) {
                        $images1 = $request->file('video');
                        
                                $imageExtension = $images1->getClientOriginalExtension();
                                $imageName ='Training_' . time() . '.' . $imageExtension;
                                if (!file_exists('public/training/video/larg/')) {
                                    mkdir('public/training/video/larg/', 0777, true);
            
                                }
                                
                                $image_resize1 =public_path('training/video/larg/');
                                $images1->move($image_resize1,$imageName);
            
                                $training->video = 'training/video/larg/' . $imageName;
                
                     }
        $training->save();
        return  redirect('admin/training')->with('success','تم تعديل التدريب بنجاح');
     
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
        $training=Training::find($id)->delete();

        return  redirect('admin/training')->with('success','تم حذف التدريب بنجاح');

    }

    public function deleteimage(Request $request){
      
       if(isset($request->id)){
        $todo = Image::find($request->id);
        $todo->delete();
        return 'success';
        }
    }
    public function getSubcategory(Request $request)
    {
        $subcategories =Sub_Category::where([["category_id",$request->category_id],['type','training']])
        ->pluck("name_ar","id");
        // dd($subcategories);
        return response()->json($subcategories);
    }
    public function getFilter(Request $request)
    {
        $subcategory=SubTwoCategory::find([[$request->subcategory_id],['type','training']]);
        $filterss=$subcategory->pluck("name_ar","id");
       
        return response()->json($filterss);
    }
    // getSpecification
    // public function getSpecification(Request $request)
    // {

    //     $specification=Specification::where("filter_id",$request->filter_id)->pluck("name_ar","id");
    //     return response()->json($specification);
    // }
    // public function getSpecificationdetealis(Request $request)
    // {
    //     $specification=Specification::where("name_ar",$request->specification_id)->get()->first();

    //     $specificationdetails=Specification_details::where("specification_id",$specification->id)->pluck("name_ar","id");
    //     return response()->json($specificationdetails);
    // }

    public function make_slug($string = null, $separator = "-") {
        if (is_null($string)) {
            return "";
        }
        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);

        // Lower case everything 
        // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
        $string = mb_strtolower($string, "UTF-8");

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and arabic charactrs as well
        $string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return str_limit($string, 100, '');
    }
}
