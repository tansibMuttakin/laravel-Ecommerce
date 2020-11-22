<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;
use DB;
use Hash;
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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'tansib.muhaimin@northsouth.edu',
            'isAdmin'=> 1,
            'isSuperAdmin'=> 1,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Muttakin',
            'email' => 'tansib.muttakin@yahoo.com',
            'isAdmin'=> 0,
            'isSuperAdmin'=> 0,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        Product::factory(20)->create();

        // foreach (Product::all() as $product) {
        //     $order = Order::inRandomOrder()->take(rand(1,3))->pluck('id');
        //     $product->orders()->attach($order,['price'=>$product->price, 'quantity'=>rand(1,5)]);
        // }
    }
}
