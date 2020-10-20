<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
        Permission::create(['name' => 'cleaning.list']);
        Permission::create(['name' => 'cleaning.edit']);
        Permission::create(['name' => 'cleaning.delete']);

        Permission::create(['name' => 'maintenance.list']);
        Permission::create(['name' => 'maintenance.edit']);
        Permission::create(['name' => 'maintenance.delete']);

        Permission::create(['name' => 'longstay.list']);
        Permission::create(['name' => 'longstay.edit']);
        Permission::create(['name' => 'longstay.delete']);

        Permission::create(['name' => 'inventory.list']);
        Permission::create(['name' => 'inventory.edit']);
        Permission::create(['name' => 'inventory.delete']);

        Permission::create(['name' => 'hotel.list']);
        Permission::create(['name' => 'hotel.edit']);
        Permission::create(['name' => 'hotel.delete']);

        Permission::create(['name' => 'kasboek.list']);
        Permission::create(['name' => 'kasboek.edit']);
        Permission::create(['name' => 'kasboek.delete']);

        Permission::create(['name' => 'blacklist.list']);
        Permission::create(['name' => 'blacklist.edit']);
        Permission::create(['name' => 'blacklist.delete']);

        Permission::create(['name' => 'guesty.checkin.list']);
        Permission::create(['name' => 'guesty.checkout.list']);

        Permission::create(['name' => 'configuration']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo(Permission::all());
        $user = User::find(1); //Ernesto
        $user->assignRole('Admin');

        $guest = Role::create(['name' => 'Guest']);
        $guest->givePermissionTo([
            'cleaning.list',
            'cleaning.edit',
            'maintenance.list',
            'maintenance.edit'
        ]);
    }
}
