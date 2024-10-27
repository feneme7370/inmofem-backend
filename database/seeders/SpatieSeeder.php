<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     // poner  use HasRoles; en user model
    public function run(): void
    {
        $userSuperadmin = User::create([
            'name' => 'SuperAdmin',
            'lastname' => 'Master',
            'slug' => 'SuperAdmin Master',
            'email' => 'inmofem@gmail.com',
            'password' => '$2y$10$BnAoWLTKBHHwp/SAOBzamu/ec8YzDRTHKqLkXRdwCUsCoCJmA/We6',
            'phone' => '2396513953',
            'birthday' => '1995-09-07',
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares',
            'description' => 'Usuario Maestro',
            'status' => '1',
            'company_id' => '1',
        ]);
        $userFalse1 = User::create([
            'name' => 'Fede',
            'lastname' => 'Marasco',
            'slug' => 'Fede Marasco',
            'email' => 'marascofederico95@gmail.com',
            'password' => '$2y$10$BnAoWLTKBHHwp/SAOBzamu/ec8YzDRTHKqLkXRdwCUsCoCJmA/We6',
            'phone' => '2395969696',
            'birthday' => '1998-10-05',
            'address' => 'Zanni 1508',
            'city' => 'Pehuajo',
            'description' => 'Usuario de prueba',
            'status' => '1',
            'company_id' => '2',
        ]);
        $userFalse2 = User::create([
            'name' => 'Cintia',
            'lastname' => 'Navarro',
            'slug' => 'Cintia Navarro',
            'email' => 'cintisnavarro@gmail.com',
            'password' => '$2y$10$BnAoWLTKBHHwp/SAOBzamu/ec8YzDRTHKqLkXRdwCUsCoCJmA/We6',
            'phone' => '2395969696',
            'birthday' => '1998-10-05',
            'address' => 'Zanni 1508',
            'city' => 'Pehuajo',
            'description' => 'Usuario de prueba',
            'status' => '1',
            'company_id' => '2',
        ]);
        
        $adminRole = Role::create(['name' => 'superadmin']);
        $employeeRole = Role::create(['name' => 'employee']);
        $unregisterRole = Role::create(['name' => 'unregister']);

        $userSuperadmin->assignRole(['superadmin']);
        $userFalse1->assignRole(['employee']);
        $userFalse2->assignRole(['unregister']);
        
        Permission::create(['name' => 'dashboard.index'])->syncRoles([$adminRole, $employeeRole, $unregisterRole]);
        
        Permission::create(['name' => 'companies.index'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'companies.create'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'companies.show'])->syncRoles([$adminRole]);
        
        Permission::create(['name' => 'properties.index'])->syncRoles([$adminRole, $employeeRole]);
        Permission::create(['name' => 'properties.create'])->syncRoles([$adminRole, $employeeRole]);
        Permission::create(['name' => 'properties.show'])->syncRoles([$adminRole, $employeeRole]);

        Permission::create(['name' => 'memberships.index'])->syncRoles([$adminRole]);
    }
}
