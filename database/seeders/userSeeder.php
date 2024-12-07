<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              // User::factory(10)->create();
        // 0 : user biasa
        // 1 : admin
        // 2 : guru
        // 3 : staff
        // status 
        // 1 : aktif
        // 2 : tidak aktif
        
    
        DB::table('user')->insert([
            'name' => 'nildawati',
            'email' => 'nildw@gmail.com',
            'role' => '0', 
            'status' => 1, 
            'password' => bcrypt('password'),
 
        ]);
    }
}
