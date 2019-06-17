<?php

namespace App\Http\Controllers\Admin;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
            $all_permissions = Permission::all();
            return view('Admin.permission.index')->with('all_permissions', $all_permissions);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     
            return view('Admin.permission.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ],[
                'name.required' => 'name is required',

            ]

        );
        $newPermission = new Permission();
        $newPermission->name = $request->name;
        $newPermission->description = $request->description;
        $newPermission->display_name = $request->display_name;
        $newPermission->save();
        return  redirect('admin/permissions')->with('success','You Have Successfully Created a Permission');//route('permissions.index')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        
            // $permission= Permission::find($request->permission);
            // return view('Admin.permission.show')->with('permission',$permission);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
   
            $permission= Permission::find($request->permission);
            return view('Admin.permission.edit')->with('permission',$permission);
       
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
            'name'=>'required',
        ],[
                'name.required' => 'name is required',

            ]

        );
        $newPermission = Permission::find($request->permission);
        $newPermission->name = $request->name;
        $newPermission->description = $request->description;
        $newPermission->display_name = $request->display_name;
        $newPermission->save();
        return  redirect('admin/permissions')->with('update','You Have Successfully Created a Role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Permission::find($request->permission)->delete();
        return  redirect('admin/permissions')->with('delete','Permission deleted successfully');
    }
}
