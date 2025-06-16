<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'Vishnu',
            'email' => 'vishnu@sht.com',  // unique email
            'phone' => '7354473505',
            'address' => '123 Main Street',
            'birthday' => '2001-09-18',
            'profile_photo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
