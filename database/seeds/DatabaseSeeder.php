<?php


use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        //1) Create Admin Role
        $user = ['fname' => 'superAdmin', 'lname'=>'User','phone'=>'01211309733','address'=>'giza','zipcode'=>'12345','email' => 'adminuser@test.com', 'password' => Hash::make('123123')];
        $user = User::create($user);
        //4) Set User Role
        $role=Role::where('name','Admin')->pluck('id');
        $user->roles()->attach($role);

    }
}
