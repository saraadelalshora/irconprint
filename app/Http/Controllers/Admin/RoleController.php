<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use App\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $all_role = Role::all();
            return view('Admin.role.index')->with('all_roles', $all_role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
            $permissions = Permission::all();
            return view('Admin.role.create', compact('permissions'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->lang);
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);
        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
       $role ->permision()->sync($request->input('permission'));
        // foreach ($request->input('permission') as $key => $value) {
        //     $role->attachPermission(array($value));

        // }
        // dd($value ,$role->id);
        // 
        return redirect()->route('Roles.index')
            ->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
    //     $roles= Role::find($request->role);
    //     $permissionrole=Permission::join('permission_role','permission_role.permission_id','permissions.id')
    //         ->where('permission_role.role_id',$roles->id)->get();
    //    // dd($permissionrole);
    //     return view('Admin.role.show')->with('roles',$roles)->with('permissionrole',$permissionrole);
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
     
            $permissions = Permission::all();
            $role=Role::find($id);
            return view('Admin.role.edit', compact('permissions','role'));
  
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
         
        $role =Role::find($id);
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        if($request->input('permission')){
        //     $delete_old_permation=RolePermission::where('role_id',$request->role)->delete();
        // foreach ($request->input('permission') as $key => $value) {
        //     $role->attachPermission($value);
        // }
          $role ->permision()->sync($request->input('permission'));
        
        }
        return redirect()->route('Roles.index')
            ->with('success','Role Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('Roles.index')->with('delete','User deleted successfully');
    }
}
