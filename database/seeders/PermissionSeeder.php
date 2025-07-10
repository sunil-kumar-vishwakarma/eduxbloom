<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'name' => 'View Dashboard', 'guard_name' => 'Dashboard'],
            ['id' => 47, 'name' => 'Total Student', 'guard_name' => 'Dashboard'],
            ['id' => 2, 'name' => 'View button', 'guard_name' => 'Student'],
            ['id' => 3, 'name' => 'create button', 'guard_name' => 'Student'],
            ['id' => 4, 'name' => 'edit button', 'guard_name' => 'Student'],
            ['id' => 5, 'name' => 'View button', 'guard_name' => 'Mentor Applications'],
            ['id' => 6, 'name' => 'create button', 'guard_name' => 'Mentor Applications'],
            ['id' => 7, 'name' => 'edit button', 'guard_name' => 'Mentor Applications'],
            ['id' => 8, 'name' => 'View button', 'guard_name' => 'Webinar'],
            ['id' => 9, 'name' => 'create button', 'guard_name' => 'Webinar'],
            ['id' => 10, 'name' => 'edit button', 'guard_name' => 'Webinar'],
            ['id' => 11, 'name' => 'edit button', 'guard_name' => 'Roles Permission'],
            ['id' => 12, 'name' => 'create button', 'guard_name' => 'Roles Permission'],
            ['id' => 13, 'name' => 'View button', 'guard_name' => 'Roles Permission'],
            ['id' => 14, 'name' => 'View button', 'guard_name' => 'Contact Info'],
            ['id' => 15, 'name' => 'create button', 'guard_name' => 'Contact Info'],
            ['id' => 16, 'name' => 'edit button', 'guard_name' => 'Contact Info'],
            ['id' => 17, 'name' => 'View button', 'guard_name' => 'Program'],
            ['id' => 18, 'name' => 'create button', 'guard_name' => 'Program'],
            ['id' => 19, 'name' => 'edit button', 'guard_name' => 'Program'],
            ['id' => 20, 'name' => 'View button', 'guard_name' => 'Team'],
            ['id' => 21, 'name' => 'create button', 'guard_name' => 'Team'],
            ['id' => 22, 'name' => 'edit button', 'guard_name' => 'Team'],
            ['id' => 23, 'name' => 'View button', 'guard_name' => 'Enquiry'],
            ['id' => 24, 'name' => 'create button', 'guard_name' => 'Enquiry'],
            ['id' => 25, 'name' => 'edit button', 'guard_name' => 'Enquiry'],
            ['id' => 26, 'name' => 'View button', 'guard_name' => 'Privacy Policy'],
            ['id' => 27, 'name' => 'create button', 'guard_name' => 'Privacy Policy'],
            ['id' => 28, 'name' => 'edit button', 'guard_name' => 'Privacy Policy'],
            ['id' => 29, 'name' => 'View button', 'guard_name' => 'Term and Condition'],
            ['id' => 30, 'name' => 'create button', 'guard_name' => 'Term and Condition'],
            ['id' => 31, 'name' => 'edit button', 'guard_name' => 'Term and Condition'],
            ['id' => 32, 'name' => 'View button', 'guard_name' => 'Blog'],
            ['id' => 33, 'name' => 'create button', 'guard_name' => 'Blog'],
            ['id' => 34, 'name' => 'edit button', 'guard_name' => 'Blog'],
            ['id' => 35, 'name' => 'View button', 'guard_name' => 'Subscription'],
            ['id' => 36, 'name' => 'create button', 'guard_name' => 'Subscription'],
            ['id' => 37, 'name' => 'edit button', 'guard_name' => 'Subscription'],
            ['id' => 38, 'name' => 'View button', 'guard_name' => 'Payment'],
            ['id' => 39, 'name' => 'create button', 'guard_name' => 'Payment'],
            ['id' => 40, 'name' => 'edit button', 'guard_name' => 'Payment'],
            ['id' => 41, 'name' => 'View button', 'guard_name' => 'Notification'],
            ['id' => 42, 'name' => 'create button', 'guard_name' => 'Notification'],
            ['id' => 43, 'name' => 'edit button', 'guard_name' => 'Notification'],
            ['id' => 44, 'name' => 'View button', 'guard_name' => 'Settings'],
            ['id' => 45, 'name' => 'create button', 'guard_name' => 'Settings'],
            ['id' => 46, 'name' => 'edit button', 'guard_name' => 'Settings'],
             ['id' => 47, 'name' => 'View Applynow', 'guard_name' => 'Applynow'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['id' => $permission['id']],
                [
                    'name' => $permission['name'],
                    'guard_name' => $permission['guard_name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}

