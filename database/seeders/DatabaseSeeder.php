<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Stancl\Tenancy\Database\Models\Tenant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin Name',
            'company' => 'Company Name',
            'about' => 'About admin',
            'email' => 'admin@demo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'avatar' => 'default.png',
            'logo' => 'logo.png',
            'remember_token' => Str::random(10),
        ]);

         Plan::create(['name' => 'Gold', 'url'=> 'gold',  'teams_limit' => 2, 'slug' => 'monthly', 'price'=> 990, 'stripe_id' => 'price_1LSRHkGQW0U1PfqxJO7EGsHx']);
         Plan::create(['name' => 'Gold', 'url'=> 'gold', 'teams_limit' => 2,'slug' => 'yearly', 'price'=> 9990, 'stripe_id' => 'price_1LTBIAGQW0U1Pfqxdr82APbW']);


         Plan::create(['name' => 'Diamond', 'url'=> 'diamond','teams_limit' => 5, 'slug' => 'monthly', 'price'=> 3990, 'stripe_id' => 'price_1LSmsIGQW0U1PfqxxsV7db73']);
         Plan::create(['name' => 'Diamond', 'url'=> 'diamond','teams_limit' => 5, 'slug' => 'yearly', 'price'=> 33990, 'stripe_id' => 'price_1Lb6p6GQW0U1PfqxjKs6uVX2']);

         Plan::create(['name' => 'Premium', 'url'=> 'premium', 'teams_limit' => 20,'slug' => 'monthly', 'price'=> 6990, 'stripe_id' => 'price_1LSRIVGQW0U1PfqxnFnKpQmh']);
         Plan::create(['name' => 'Premium', 'url'=> 'premium', 'teams_limit' => 20,'slug' => 'yearly', 'price'=> 66990, 'stripe_id' => 'price_1Lb6kvGQW0U1PfqxQFJJcEBN']);



    }
}
