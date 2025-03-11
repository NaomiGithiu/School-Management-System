<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'name' => "admin",
        //     'email' => "admin@gmail.com",
        //     //'mobile_no' => '0748830110',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
        //      ]);
        // $user->assignRole('writer', 'admin');

        ///////
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')

        ])->assignRole('admin');
        
        User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Parent User',
            'email' => 'parent@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Student User',
            'email' => 'student@gmail.com',
            'password' => bcrypt('password')
        ]);        

    }   
}
