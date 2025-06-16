<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'vishnu@sht.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        // Create profile for the admin user
        Profile::create([
            'user_id' => $user->id,  // Reference to the user ID
            'name' => 'Admin',
            'email' => 'vishnu@sht.com',
            'phone' => '7354473505',
            'address' => '123 Admin Street',
            'birthday' => '2000-01-01',
            'profile_photo' => null,
        ]);
    }
}
