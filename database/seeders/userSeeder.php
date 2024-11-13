<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Destri wahyu ikhsani',
            'email' => 'destri.iw@gmail.com',
            'role' => '1', 
            'status' => 1, 
            'password' => bcrypt('P@ssw0rd'), 
        ]);

    }
}
