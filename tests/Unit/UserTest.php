<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Role;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_has_role()
    {
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
        // $role_admin = Role::create(['role_name' => Role::ROLE_ADMIN]);
        // $role_moderator = Role::create(['role_name' => Role::ROLE_MODERATOR]);
        $role_common = Role::create(['role_name' => Role::ROLE_COMMON]);
        $user_common->roles()->sync([$role_common->id]);
        $this->assertTrue($user_common->hasRole($role_common->role_name));
        // $this->assertTrue(true);
    }

    public function test_user_is_admin()
    {
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
        $role_admin = Role::create(['role_name' => Role::ROLE_ADMIN]);
        $user_admin->roles()->sync([$role_admin->id]);
        $this->assertTrue($user_admin->isAdmin());
    }
}
