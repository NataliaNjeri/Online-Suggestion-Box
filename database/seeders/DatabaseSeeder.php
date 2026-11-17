<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call(DepartmentSeeder::class);

        User::updateOrCreate(
            ['email' => 'admin@university.ac.ke'],
            [
                'name'        => 'System Admin',
                'password'    => Hash::make('12345678'),
                'role'        => 'admin',
                'is_approved' => true,
            ]
        );
    }
}
