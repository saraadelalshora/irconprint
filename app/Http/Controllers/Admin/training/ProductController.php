<?php

namespace App\Http\Controllers\Admin;
use App\Sub_Category;
use App\Category;
use App\Product;
use App\Manufactor;
use App\Image;
use App\Specification;
use App\Specification_details;
use App\Product_Specification;
use App\Category_Filter;
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
        $all=Product::all();
        return view('Admin.products.index',compact('all'));
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
        $categories =Category::where('status','1')->get();
        $subcategory=Sub_Category::where('status','1')->get();
        $specification=Specification::where('status','1')->get();
        // dd($specification);
        return view('Admin.products.create',compact('manufact','categories','subcategory','specification'));
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
        // 'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en', 'image', 'price', 
        // 'discount_price', 'discount_from', 'discount_to', 'quantity', 'slogen_ar', 'slogen_en', 'status',
        //  'subcategory_id','manufactor_id','texes',
        // dd($request->all());
//   "name_ar" => "اتصالات كاش"
//   "description_ar" => "hgh"
//   "name_en" => "etislat cashe"
//   "description_en" => "gh"
//   "category_id" => "4"
//   "subcategory" => "2"
//   "filter_id" => "1"
//   "specification_id" => "3"
//   "specification_details_id" => array:2 [▶]
//   "manufact_id" => "1"
//   "price" => "123"
//   "quentity" => "2"
//   "taxes" => "1"
//   "status" => "1"
//   "tag_ar" => "jk,lk"
//   "tag_en" => "ddf,dfd"
//   "pro_image" => array:4 [▶]

$this->validate($request,[
    'name_ar'=>'required',
    'description_ar'=>'required',
    'category_id'=>'required',
    'subcategory'=>'required',
    'quentity'=>'required',
    'img'=>'mimes:jpeg,jpg,png,gif|max:1000'
],[
    'name_ar.required' => 'اسم المنتج باللغة العربية مطلوب ',
    'description_ar.required' => 'وصف المنتج باللغة العربية مطلوب ',
    'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
    'subcategory.required' => 'وصف القسم الفرعي   مطلوب ',
    'quentity.required' => 'وصف الكمية   مطلوب ',
    'img.mimes' => 'هذا النوع من الصور غير مسموح',
    'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
    ]

);
// special
    $product=new Product;
    $product->name_ar=$request->name_ar;
    $product->name_en=$request->name_en;
    $product->description_ar=$request->description_ar;
    $product->description_en=$request->description_en;
    $product->tag_ar=$request->tag_ar;
    $product->tag_en=$request->tag_en;
    $product->price=$request->price;
    $product->discount_price=$request->discount_price;
    $product->discount_from=$request->datefrom;
    $product->discount_to=$request->dateto;
    $product->quantity=$request->quentity;
    $product->slogen_ar=$this->make_slug($request->input('name_ar'));
    $product->slogen_en=$this->make_slug($request->input('name_en'));
    $product->status=$request->status;
    $product->special=$request->special;
    $product->subcategory_id=$request->subcategory;
    $product->filter_id=$request->filter_id;
    $product->manufactor_id=$request->manufact_id;
    $product->texes=$request->taxes;
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
                    if (!file_exists('public/product/larg/')) {
                        mkdir('public/product/larg/', 0777, true);

                    }
                    if (!file_exists('public/product/small/')) {
                        mkdir('public/product/small/', 0777, true);
                    }
                    
       
                    $image_resize = Img::make($images1->getRealPath());
                    $image_resize->resize(634, 811);
                    $image_resize->save(public_path('product/larg/' . $imageName));

                    $image_resize1 = Img::make($images1->getRealPath());
                    $image_resize1->resize(560, 460);
                    $image_resize1->save(public_path('product/small/' . $imageName));

                    $addpagimg = new Image();
                    $addpagimg->product_id =$product->id;
                    $addpagimg->img = 'product/larg/' . $imageName;
                    $addpagimg->save();
                
                    $i++;
                }
            }
           
        }
        if($request->input('specification_details_id')){
            //
            $arr=$request->input('specification_details_id');
            $specifica=implode($arr, ',');  
                $deatils=Product_Specification::create([
                    // product_id// specification_id// specification_deltails_id
                    'product_id' => $product->id,
                    'specification' => $request->specification_id,
                    'specification_deltails' => $specifica,

                ]);                
          
                
        }
    }
 
    return  redirect('admin/Product')->with('success','تم اضافة المنتج بنجاح');
 
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
        $categories =Category::where('status','1')->get();
        $subcategory=Sub_Category::where('status','1')->get();
        $product=Product::find($id);
        $productspecification=Product_Specification::where('product_id',$id)->get();

        return view('Admin.products.edit',compact('manufact','categories','subcategory','product','productspecification'));
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
            'quentity'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:1000'
        ],[
            'name_ar.required' => 'اسم المنتج باللغة العربية مطلوب ',
            'description_ar.required' => 'وصف المنتج باللغة العربية مطلوب ',
            'category_id.required' => 'اسم القسم الرئيسي مطلوب ',
            'subcategory.required' => 'وصف القسم الفرعي   مطلوب ',
            'quentity.required' => 'وصف الكمية   مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]
        
        );
        $product=Product::find($id);
        $product->name_ar=$request->name_ar;
        $product->name_en=$request->name_en;
        $product->description_ar=$request->description_ar;
        $product->description_en=$request->description_en;
        $product->tag_ar=$request->tag_ar;
        $product->tag_en=$request->tag_en;
        $product->price=$request->price;
        $product->quantity=$request->quentity;

        $product->discount_price=$request->discount_price ;
        $product->discount_from=$request->datefrom;
        $product->discount_to=$request->dateto;
        $product->slogen_ar=$this->make_slug($request->input('name_ar'));
        $product->slogen_en=$this->make_slug($request->input('name_en'));
        $product->status=$request->status;
        $product->special=$request->special;
        $product->subcategory_id=$request->subcategory;
        $product->filter_id=$request->filter_id;
        $product->manufactor_id=$request->manufact_id;
        $product->texes=$request->taxes;
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
                        if (!file_exists('public/product/larg/')) {
                            mkdir('public/product/larg/', 0777, true);
    
                        }
                        if (!file_exists('public/product/small/')) {
                            mkdir('public/product/small/', 0777, true);
                        }                                   
                        $image_resize = Img::make($images1->getRealPath());
                        $image_resize->resize(634, 811);
                        $image_resize->save(public_path('product/larg/' . $imageName));
    
                        $image_resize1 = Img::make($images1->getRealPath());
                        $image_resize1->resize(560, 460);
                        $image_resize1->save(public_path('product/small/' . $imageName));
    
                        $addpagimg = new Image();
                        $addpagimg->product_id =$product->id;
                        $addpagimg->img = 'product/larg/' . $imageName;
                        $addpagimg->save();
                    
                        $i++;
                    }
                }
               
            }
            if($request->input('specification_details_id')){
                //
                $delete=Product_Specification::where('product_id',$product->id)->delete();
                $arr=$request->input('specification_details_id');
                $specifica=implode($arr, ',');  
                $deatils=Product_Specification::create([
                    // product_id// specification_id// specification_deltails_id
                    'product_id' => $product->id,
                    'specification' => $request->specification_id,
                    'specification_deltails' => $specifica,

                ]);      
            }
        }
     
        return  redirect('admin/Product')->with('success','تم تعديل المنتج بنجاح');
     
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
        $product=Product::find($id)->delete();

        return  redirect('admin/Product')->with('success','تم حذف المنتج بنجاح');

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
        $subcategories =Sub_Category::where("category_id",$request->category_id)
        ->pluck("name_ar","id");
        return response()->json($subcategories);
    }
    public function getFilter(Request $request)
    {
        $subcategory=Sub_Category::find($request->subcategory_id);
        $filterss=$subcategory->filters->pluck("name_ar","id");
       
        return response()->json($filterss);
    }
    // getSpecification
    public function getSpecification(Request $request)
    {

        $specification=Specification::where("filter_id",$request->filter_id)->pluck("name_ar","id");
        return response()->json($specification);
    }
    public function getSpecificationdetealis(Request $request)
    {
        $specification=Specification::where("name_ar",$request->specification_id)->get()->first();

        $specificationdetails=Specification_details::where("specification_id",$specification->id)->pluck("name_ar","id");
        return response()->json($specificationdetails);
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

        $all=Product::where([
            ['name_ar', 'LIKE', "%$request->searchword%"],
          ])->orWhere('name_en', 'LIKE', "%$$request->searchword%")->get();
        //   dd($data);
        return response()->json($data);
       
    }
}
