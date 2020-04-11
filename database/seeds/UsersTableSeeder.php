<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('users')->insert([
            [
                'name'=>'Dao Duy Tu',
                'email'=>'admin@admin',
                'password'=>Hash::make('123123123'),
                'date_of_birth'=>'12-12-2020',
                'identity_card'=>'123456789',
                'address'=>'Da Nang',
                'gender'=>'female',
                'role'=>'admin',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ]
        ]);
    }
}
