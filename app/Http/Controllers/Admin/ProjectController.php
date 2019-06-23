<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Intervention\Image\ImageManagerStatic as Image;
class ProjectController extends Controller
{
   
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=Project::all();
        return view('Admin.projects.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.projects.create');
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

        $this->validate($request,[
            'ar_name'=>'required',
            'ar_description'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'ar_name.required' => 'اسم المشروع باللغة العربية مطلوب ',
            'ar_description.required' => 'وصف المشروع باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        //'tag_ar', 'tag_en', 'image', 'slogen_ar', 'slogen_en', 'status',
        $project=new Project;
        $project->name_ar=$request->ar_name;
        $project->name_en=$request->en_name;
        $project->description_ar=$request->ar_description;
        $project->description_en=$request->en_description;
        $project->tag_ar=$request->ar_tag;
        $project->tag_en=$request->en_tag;
        $project->slogen_ar=$this->make_slug($request->ar_name);
        $project->slogen_en=$this->make_slug($request->en_name);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='Project_'.time().'.'.$imageExtension;
            if (!file_exists('public/project/larg/')) {
                mkdir('public/project/larg/', 0777, true);
            }
            if (!file_exists('public/project/small/')) {
                mkdir('public/project/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(1920, 670);
            $image_resize->save(public_path('project/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(350, 200);
            $image_resize1->save(public_path('project/small/' .$imageName));
            $project->image='project/larg/'.$imageName;
            
        }
        $project->status=$request->status;
        $project->save();
        return  redirect('admin/Project')->with('success','تم اضافة  المشروع بنجاح');

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
        $project=Project::find($id);
        return view('Admin.projects.edit',compact('project'));
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
        $this->validate($request,[
            'ar_name'=>'required',
            'ar_description'=>'required',
            'img'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'ar_name.required' => 'اسم المشروع باللغة العربية مطلوب ',
            'ar_description.required' => 'وصف المشروع باللغة العربية مطلوب ',
            'img.mimes' => 'هذا النوع من الصور غير مسموح',
            'img.max'=>'هذه الصورة اكبر من الحجم المسموح به ',
            ]

        );
        //'tag_ar', 'tag_en', 'image', 'slogen_ar', 'slogen_en', 'status',
        $project=Project::find($id);
        $project->name_ar=$request->ar_name;
        $project->name_en=$request->en_name;
        $project->description_ar=$request->ar_description;
        $project->description_en=$request->en_description;
        $project->tag_ar=$request->ar_tag;
        $project->tag_en=$request->en_tag;
        $project->slogen_ar=$this->make_slug($request->ar_name);
        $project->slogen_en=$this->make_slug($request->en_name);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $imageExtension = $file->getClientOriginalExtension();
            $imageName ='Project_'.time().'.'.$imageExtension;
            if (!file_exists('public/project/larg/')) {
                mkdir('public/project/larg/', 0777, true);
            }
            if (!file_exists('public/project/small/')) {
                mkdir('public/project/small/', 0777, true);
            }
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(1920, 670);
            $image_resize->save(public_path('project/larg/' .$imageName));
            $image_resize1 = Image::make($file->getRealPath());
            $image_resize1->resize(350, 200);
            $image_resize1->save(public_path('project/small/' .$imageName));
            $project->image='project/larg/'.$imageName;
            
        }
        $project->status=$request->status;
        $project->save();
        return  redirect('admin/Project')->with('success','تم تعديل المشروع  بنجاح');
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
        $project=Project::find($id);
        if($project->image != null){
            if(file_exists(asset("public/".$project->image))){
                unlink("public/".$project->image);
                unlink( "public/".str_replace("small","larg",$project->image));
            }
          
        }
        $project->delete();
        return  redirect('admin/Project')->with('success','تم الحذف المشروع بنجاح');

    
    }
}
