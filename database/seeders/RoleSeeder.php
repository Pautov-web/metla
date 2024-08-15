<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Role();
        $client->name = 'Client';
        $client->protected = 1;
        $client->save();

        $cleaner = new Role();
        $cleaner->name = 'Cleaner';
        $cleaner->protected = 1;
        $cleaner->save();

        $admin = new Role();
        $admin->name = 'Admin';
        $admin->protected = 1;
        $admin->save();
    }
}
