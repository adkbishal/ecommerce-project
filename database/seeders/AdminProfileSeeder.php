<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\User;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::where('email','admin@gmail.com')->first();
        $vendor= new Vendor();
        $vendor->banner= 'uploads/1234.jpg';
        $vendor->shop_name= 'Admin Shop ';
        $vendor->phone= '123123123';
        $vendor->email= "admin@gmail.com";
        $vendor->address= "Nepal";
        $vendor->description="short Description about Admin Profile Seeder";
        $vendor->user_id= $user->id;
        $vendor->save();


    }
}
