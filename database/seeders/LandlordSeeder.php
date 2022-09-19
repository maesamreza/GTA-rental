<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->role_id = 2;
        $admin->first_name = 'landlord';
        $admin->last_name = 'landlord';
        $admin->email = "landlord@gmail.com";
        $admin->password = Hash::make('12345678');
        $admin->is_active=1;
        $admin->save();
    }
}
