<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Hakem', 'Yonetici', 'Yazar', 'Admin'];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role]);
        }
    }
}
