<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\Hash;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Permission::truncate();
        Role::truncate();

        $useradmin = User::where('email', 'admin@admin.com')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin = User::Create([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        $roleadmin = Role::create(['name' => 'Admin',
            'slug'                            => 'admin',
            'description'                     => 'Administrador',
            'full-access'                     => 'yes',

        ]);
         $roleuser = Role::create(['name' => 'Registered User',
            'slug'                            => 'registereduser',
            'description'                     => 'Registered User',
            'full-access'                     => 'no',

        ]);
        $useradmin->roles()->sync([$roleadmin->id]);
        $permission_all = [];
        $permission     = Permission::create(['name' => 'List role',
            'slug'                                       => 'role.index',
            'description'                                => 'A user can List role',

        ]);
        $permission_all[] = $permission->id;
        $permission       = Permission::create(['name' => 'store role',
            'slug'                                         => 'role.store',
            'description'                                  => 'A user can store role',

        ]);
        $permission_all[] = $permission->id;
        $permission       = Permission::create(['name' => 'edit role',
            'slug'                                         => 'role.edit',
            'description'                                  => 'A user can edit role',

        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create(['name' => 'show role',
            'slug'                                   => 'role.show',
            'description'                            => 'A user can show role',

        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create(['name' => 'destroy role',
            'slug'                                   => 'role.destroy',
            'description'                            => 'A user can destroy destroy',

        ]);
        $permission_all[] = $permission->id;

        $permission       = Permission::create(['name' => 'edit own user',
            'slug'                                         => 'userown.edit',
            'description'                                  => 'A user can edit own user',

        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create(['name' => 'show own user',
            'slug'                                   => 'userown.show',
            'description'                            => 'A user can show own user',

        ]);

        $roleadmin->permissions()->sync($permission_all);
    }
}
