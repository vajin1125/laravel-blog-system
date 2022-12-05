<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\BlogPost;
use App\Models\BlogComment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Roles
        $role_admin = Role::create(['role_name' => Role::ROLE_ADMIN]);
        $role_moderator = Role::create(['role_name' => Role::ROLE_MODERATOR]);
        $role_common = Role::create(['role_name' => Role::ROLE_COMMON]);

        //Users
        $user_admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@laravelblog.com',
            'surname' => 'Hacker',
            'nickname' => 'lahacker',
            'phone' => '00000000000',
            'address' => 'Address of Administrator',
            'city' => 'City of Administrator',
            'state' => 'State of Administrator',
            'zipcode' => '000000',
            'username' => 'hackerlar',
            'password' => Hash::make('admin@password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);
        
        $user_moderator = User::create([
            'name' => 'Modera',
            'email' => 'modera@laravelblog.com',
            'surname' => 'Laravel',
            'nickname' => 'bloger',
            'phone' => '11111111111',
            'address' => 'Address of Modera',
            'city' => 'City of Modera',
            'state' => 'State of Modera',
            'zipcode' => '111111',
            'username' => 'laravelmod',
            'password' => Hash::make('modera@password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);
        
        $user_common = User::create([
            'name' => 'Common',
            'email' => 'common@laravelblog.com',
            'surname' => 'Laravel',
            'nickname' => 'common',
            'phone' => '2222222222',
            'address' => 'Address of common',
            'city' => 'City of common',
            'state' => 'State of common',
            'zipcode' => '2222',
            'username' => 'laravelcom',
            'password' => Hash::make('common@password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);
        
        $user_admin->roles()->sync([$role_admin->id]);
        $user_moderator->roles()->sync([$role_moderator->id]);
        $user_common->roles()->sync([$role_common->id]);

        // User::factory(5)->create();

        // BlogPost
        BlogPost::factory(50)->has(BlogComment::factory(5))->create();

        // BlogComment
        // BlogComment::factory()->has(Blog)
    }
}
