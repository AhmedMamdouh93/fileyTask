<?php

use Illuminate\Database\Seeder;
use App\Filey\Users\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@admin.com')->first();
        if(!$user){
            User::create([
                'name'=>'admin',
                'email'=>"admin@admin.com",
                'password'=>bcrypt(12345678),
                'is_admin'=>1
            ]);
        }
    }
}
