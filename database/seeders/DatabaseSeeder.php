<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Image;
use App\Models\Roles;
use App\Models\Customers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //basic login keys
        \App\Models\User::factory()->has(Image::factory())->create([
            'name' => 'a',
            'email' => 'a',
            'password' => bcrypt('a')
        ]);

        //roles seed
        $arr = ['Admin', 'User', 'Customer', 'Editor'];
        collect($arr)->map(fn ($arre) =>
        \Spatie\Permission\Models\Role::create(['name' => $arre]));

        //seed user and customeer 
        \App\Models\User::factory(50)->has(Image::factory())->create()->map(fn ($user) => $user->assignRole($arr[rand(0, 3)]));
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Customers::factory(50)->has(Image::factory())->create()->map(fn ($customer) => $customer->responsible()->create(['reponsibleById' => User::inRandomOrder()
                ->limit(1)->first()->id]));
            info('50 yeni kayıt eklendi' . $i . '. adım');
        }
    }
}