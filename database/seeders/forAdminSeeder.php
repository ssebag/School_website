<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class forAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123456789'),
          ]);
    /**for classes */
        DB::table('classses')->insert([
            'name' => 'First',
        ]);
        DB::table('classses')->insert([
            'name' => 'Second',
        ]);
        DB::table('classses')->insert([
            'name' => 'Third',
        ]);
        DB::table('classses')->insert([
            'name' => 'Fourth',
        ]);


    /**for subject */
        DB::table('subjects')->insert([
            'name' => 'Arabic',
        ]);
        DB::table('subjects')->insert([
            'name' => 'English',
        ]);
        DB::table('subjects')->insert([
            'name' => 'French',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Math',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Science',
        ]);
    }
}
