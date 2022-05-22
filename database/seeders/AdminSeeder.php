<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exist = User::where('email','admin@gmail.com')->exists();
        if (!$exist){
            $user = User::create([
                'name'=>'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(12345678),
                'email_verified_at' => Carbon::now()
            ]);
            $user->assignRole(ADMIN);
        }
    }
}
