<?php

namespace App\Http\Controllers\Admin\eshop;
use App\Sub_Category;
use App\Category;
use App\ShopProducts;
use App\Manufactor;
use App\ShopImage;
use App\SubTwoCategory;
use Intervention\Image\ImageManagerStatic as Img;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=ShopProducts::orderBy('id', 'desc')->get();
        return view('Admin.eshop.product.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $manufact=Manufactor::where('status','1')->get();
        $categories =Category::where([['status','1'],['type','eshop']])->get();
        return view('Admin.eshop.product.create',compact('manufact','categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// 'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en', 'image', 'price', 
// 'code', 'slogen_ar', 'slogen_en', 'status', 'availbale', 'category_id', 'subcategory_id','manufactor_id',
// 'subtwocategory_id' 
// dd($request->all());

$this->validate($request,[
    'name_ar'=>'required',
    'description_ar'=>'required',
    'category_id'=>'required',
    // 'subcategory'=>'required',
    'img'=>'mimes:jpeg,jpg,png,gif|max:1000'
],[
    'name_ar.required' => 'اسم المنتج باللغة العربية مطلوب ',
    'description_ar.required' => 'وصف المنتج باللغة العربية مطلوب ',
    'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
    // 'subcategory.required' => 'وصف القسم الفرعي   مطلوب ',
    'img.mimes' => 'هذا النوع من الصور غير مسموح',
    'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
    ]

);
    //last id 
    $last_id=ShopProducts::latest()->get()->first();
    
    if($last_id){
        $code_slug=explode('-',$last_id->slogen_ar);
        $slug_id=++$code_slug[0];

    }else{
      $slug_id=100001;
    }
    $product=new ShopProducts;
    $product->name_ar=$request->name_ar;
    $product->name_en=$request->name_en;
    $product->description_ar=$request->description_ar;
    $product->description_en=$request->description_en;
    $product->tag_ar=$request->tag_ar;
    $product->tag_en=$request->tag_en;
    $product->slogen_ar=$slug_id."-".$this->make_slug($request->input('name_ar'));
    $product->slogen_en=$slug_id."-".$this->make_slug($request->input('name_en'));
    $product->status=$request->status;
    $product->availbale=$request->special;
    $product->category_id=$request->category_id;
    $product->manufactor_id=$request->manufact_id;
    $product->code=$request->code;
    $product->save();
    if($product->save()){
        if ($request->hasFile('pro_image')) {
            $files[] = $request->file('pro_image');
            foreach ($files as $images) {
                $i = 1;
                foreach ($images as $images1) {
                    //dd($images);
                    $imageExtension = $images1->getClientOriginalExtension();
                    $imageName ='product_' . $i . time() . '.' . $imageExtension;
                    if (!file_exists('public/eshop/product/larg/')) {
                        mkdir('public/eshop/product/larg/', 0777, true);

                    }
                    if (!file_exists('public/eshop/product/small/')) {
                        mkdir('public/eshop/product/small/', 0777, true);
                    }
                    
       
                    $image_resize = Img::make($images1->getRealPath());
                    $image_resize->resize(634, 811);
                    $image_resize->save(public_path('eshop/product/larg/' . $imageName));

                    $image_resize1 = Img::make($images1->getRealPath());
                    $image_resize1->resize(560, 460);
                    $image_resize1->save(public_path('eshop/product/small/' . $imageName));

                    $addpagimg = new ShopImage();
                    $addpagimg->product_id =$product->id;
                    $addpagimg->img = 'eshop/product/larg/' . $imageName;
                    $addpagimg->save();
                
                    $i++;
                }
            }
           
        }
       
    }
 
    return  redirect('admin/eshop')->with('success','تم اضافة المنتج بنجاح');
 
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

        $manufact=Manufactor::where('status','1')->get();
        $categories =Category::where([['status','1'],['type','eshop']])->get();
        $product=ShopProducts::find($id);
        // $productspecification=Product_Specification::where('product_id',$id)->get();

        return view('Admin.eshop.product.edit',compact('manufact','categories','product'));
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
            // 'subcategory'=>'required',
           
            'img'=>'mimes:jpeg,jpg,png,gif|max:1000'
        ],[
            'name_ar.required' => 'اسم المنتج باللغة العربية مطلوب ',
            'description_ar.required' => 'وصف المنتج باللغة العربية مطلوب ',
            'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
            // 'subcategory.required' => 'وصف القسم الفرعي   مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]
        
        );
     $product=ShopProducts::find($id);
        if($product){
            $code_slug=explode('-',$product->slogen_ar);
            $slug_id=$code_slug[0];
    
        }else{
          $slug_id=100001;
        }
 
        $product->name_ar=$request->name_ar;
    $product->name_en=$request->name_en;
    $product->description_ar=$request->description_ar;
    $product->description_en=$request->description_en;
    $product->tag_ar=$request->tag_ar;
    $product->tag_en=$request->tag_en;
    $product->slogen_ar=$slug_id."-".$this->make_slug($request->input('name_ar'));
    $product->slogen_en=$slug_id."-".$this->make_slug($request->input('name_en'));
    $product->status=$request->status;
    $product->availbale=$request->special;
    $product->category_id=$request->category_id;
    $product->manufactor_id=$request->manufact_id;
    $product->code=$request->code;
    $product->save();
    if($product->save()){
        if ($request->hasFile('pro_image')) {
            $files[] = $request->file('pro_image');
            foreach ($files as $images) {
                $i = 1;
                foreach ($images as $images1) {
                    //dd($images);
                    $imageExtension = $images1->getClientOriginalExtension();
                    $imageName ='product_' . $i . time() . '.' . $imageExtension;
                    if (!file_exists('public/eshop/product/larg/')) {
                        mkdir('public/eshop/product/larg/', 0777, true);

                    }
                    if (!file_exists('public/eshop/product/small/')) {
                        mkdir('public/eshop/product/small/', 0777, true);
                    }
                    
       
                    $image_resize = Img::make($images1->getRealPath());
                    $image_resize->resize(634, 811);
                    $image_resize->save(public_path('eshop/product/larg/' . $imageName));

                    $image_resize1 = Img::make($images1->getRealPath());
                    $image_resize1->resize(560, 460);
                    $image_resize1->save(public_path('eshop/product/small/' . $imageName));

                    $addpagimg = new ShopImage();
                    $addpagimg->product_id =$product->id;
                    $addpagimg->img = 'eshop/product/larg/' . $imageName;
                    $addpagimg->save();
                
                    $i++;
                }
            }
           
        }
       
    }
        return  redirect('admin/eshop')->with('success','تم تعديل المنتج بنجاح');
     
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
        $product=ShopProducts::find($id)->delete();

        return  redirect('admin/eshop')->with('success','تم حذف المنتج بنجاح');

    }

    public function deleteimage(Request $request){
      
       if(isset($request->id)){
        $todo = ShopImage::find($request->id);
        $todo->delete();
        return 'success';
        }
    }

  
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
        $string = preg_replace("/^[a-z0-9]([0-9a-z_\-\s])[ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]+$/i", "", $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return str_limit($string, 100, '');
    }
    public function filter(Request $request){
        // searchword
// price
// status
// quantity

        $all=ShopProducts::where([
            ['name_ar', 'LIKE', "%$request->searchword%"],
          ])->orWhere('name_en', 'LIKE', "%$$request->searchword%")->get();
        //   dd($data);
        return response()->json($data);
       
    }
}