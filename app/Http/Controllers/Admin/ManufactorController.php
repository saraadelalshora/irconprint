<?php

namespace App\Http\Controllers\Admin;
use App\Manufactor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
class ManufactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_manufactor=Manufactor::orderBy('id', 'desc')->get();
        return view('Admin.manufactores.index',compact('all_manufactor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.manufactores.create');
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
            'img'=>'mimes:jpeg,jpg,png,gif|required|max:10000'
        ],[
            'name.required' => 'هذا الحقل مطلوب',
            'img.required' => 'هذا الحقل مطلوب',

            ]

        );
        $manufactor=new Manufactor;
        $manufactor->name_ar=$request->ar_name;
        $manufactor->name_en=$request->en_name;
        $manufactor->status=$request->status;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName =$request->en_name.'_'.time().'.'.$imageExtension;
            if (!file_exists('public/manufactor/larg/')) {
                mkdir('public/manufactor/larg/', 0777, true);
            }
            if (!file_exists('public/manufactor/small/')) {
                mkdir('public/manufactor/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(170, 110);
            $image_resize->save(public_path('manufactor/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(150, 150);
            $image_resize1->save(public_path('manufactor/small/' .$imageName));
           // $manufactor->image = $request->img;
            $manufactor->img='manufactor/larg/'.$imageName;
            
        }
        $manufactor->save();
        return  redirect('admin/Manufactor')->with('success','تم اضافة المصنع بنجاح');
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
        $manufactor=Manufactor::find($id);
        return view('Admin.manufactores.edit',compact('manufactor'));

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
            'img'=>'mimes:jpeg,jpg,png,gif|required|max:10000'
        ],[
            'name.required' => 'هذا الحقل مطلوب',
            'img.required' => 'هذا الحقل مطلوب',

            ]

        );
        $manufactor=Manufactor::find($id);
        $manufactor->name_ar=$request->ar_name;
        $manufactor->name_en=$request->en_name;
        $manufactor->status=$request->status;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName =$request->en_name.'_'.time().'.'.$imageExtension;
            if (!file_exists('public/manufactor/larg/')) {
                mkdir('public/manufactor/larg/', 0777, true);
            }
            if (!file_exists('public/manufactor/small/')) {
                mkdir('public/manufactor/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(170, 110);
            $image_resize->save(public_path('manufactor/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(150, 150);
            $image_resize1->save(public_path('manufactor/small/' .$imageName));
           // $manufactor->image = $request->img;
            $manufactor->img='manufactor/larg/'.$imageName;
            
        }
        $manufactor->save();
        return  redirect('admin/Manufactor')->with('success','تم تعديل المصنع بنجاح');
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
        $manufact=Manufactor::find($id);
        if($manufact->img != null){
            if(file_exists(asset("public/".$manufact->img))){
                unlink("public/".$manufact->img);
                unlink( "public/".str_replace("small","larg",$manufact->img));
            }
          
        }
        $manufact->delete();
        return  redirect('admin/Manufactor')->with('success','تم الحذف المصنع بنجاح');

    }
}
