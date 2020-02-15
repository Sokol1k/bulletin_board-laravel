<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Spatie\Permission\Models\Role::class, 'admin', 1)->create()->each(function ($user) {
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'create bulletin', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'show bulletin', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'update bulletin', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'delete bulletin', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'index bulletins', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'store bulletin', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'edit bulletin', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'confirm user', 1)->create());
            $user->givePermissionTo(factory(Spatie\Permission\Models\Permission::class, 'index users', 1)->create());
        });

        factory(Spatie\Permission\Models\Role::class, 'user', 1)->create()->each(function ($user) {
            $user->givePermissionTo(Spatie\Permission\Models\Permission::findById(1));
            $user->givePermissionTo(Spatie\Permission\Models\Permission::findById(2));
            $user->givePermissionTo(Spatie\Permission\Models\Permission::findById(3));
            $user->givePermissionTo(Spatie\Permission\Models\Permission::findById(4));
            $user->givePermissionTo(Spatie\Permission\Models\Permission::findById(5));
            $user->givePermissionTo(Spatie\Permission\Models\Permission::findById(6));
            $user->givePermissionTo(Spatie\Permission\Models\Permission::findById(7));
        });
    }
}
