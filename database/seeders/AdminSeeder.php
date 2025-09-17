<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->updateOrInsert(
            ['email' => 'amadou.issiaka.services@gmail.com'],
            [
                'password' => Hash::make('Ab59000@/'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
