<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test01',
            'email'=>  'test01@mail.com',
            'password' => Hash::make('test01test01'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(), //綱川流
        ]);
    }
}