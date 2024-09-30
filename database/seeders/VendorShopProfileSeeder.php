<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/1234.jpg';
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '+8801608-186044';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'Mirpur 1 Dhaka';
        $vendor->description = 'Shop description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
