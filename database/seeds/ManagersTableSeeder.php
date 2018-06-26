<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("managers")->insert([
        	['username'=>'gh0s1s','password'=> bcrypt('123456'),'email' => 'gh0s1s@gmail.com'],
        	['username'=>'f1r0','password'=> bcrypt('123456'),'email' => 'f1ro@sina.com'],
        	['username'=>'lucy','password'=> bcrypt('123456'),'email' => 'lucy@sina.com'],
        	['username'=>'tom','password'=> bcrypt('123456'),'email' => 'tom@sina.com'],
        	['username'=>'alex','password'=> bcrypt('123456'),'email' => 'alex@sina.com'],
        ]);
    }
}
