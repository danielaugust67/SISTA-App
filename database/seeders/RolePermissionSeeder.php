<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        Permission::create(['name'=>'create-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'delete-user']);
        Permission::create(['name'=>'view-user']);
        Permission::create(['name'=>'assign-user']);

        //Mahasiswa
        Permission::create(['name'=>'create-mahasiswa']);
        Permission::create(['name'=>'edit-mahasiswa']);
        Permission::create(['name'=>'delete-mahasiswa']);
        Permission::create(['name'=>'view-mahasiswa']);

        //Koordinator
        Permission::create(['name'=>'create-koordinator']);
        Permission::create(['name'=>'edit-koordinator']);
        Permission::create(['name'=>'delete-koordinator']);
        Permission::create(['name'=>'view-koordinator']);

        //Dosen-Pembimbing
        Permission::create(['name'=>'create-dosenPembimbing']);
        Permission::create(['name'=>'edit-dosenPembimbing']);
        Permission::create(['name'=>'delete-dosenPembimbing']);
        Permission::create(['name'=>'view-dosenPembimbing']);

        //Dosen-Penguji
        Permission::create(['name'=>'create-dosenPenguji']);
        Permission::create(['name'=>'edit-dosenPenguji']);
        Permission::create(['name'=>'delete-dosenPenguji']);
        Permission::create(['name'=>'view-dosenPenguji']);

        //BAAK
        Permission::create(['name'=>'create-baak']);
        Permission::create(['name'=>'edit-baak']);
        Permission::create(['name'=>'delete-baak']);
        Permission::create(['name'=>'view-baak']);


        Role::create(['name'=>'admin']);
        Role::create(['name'=>'mahasiswa']);
        Role::create(['name'=>'koordinator']);
        Role::create(['name'=>'dosenPenguji']);
        Role::create(['name'=>'dosenPembimbing']);
        Role::create(['name'=>'BAAK']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo(['create-user', 'edit-user', 'delete-user', 'view-user','assign-user']);

        $roleMahasiswa = Role::findByName('mahasiswa');
        $roleMahasiswa->givePermissionTo(['create-mahasiswa', 'edit-mahasiswa', 'delete-mahasiswa', 'view-mahasiswa']);

        $roleKoordinator = Role::findByName('koordinator');
        $roleKoordinator->givePermissionTo(['create-koordinator', 'edit-koordinator', 'delete-koordinator', 'view-koordinator']);

        $roleDosenPenguji = Role::findByName('dosenPenguji');
        $roleDosenPenguji->givePermissionTo(['create-dosenPenguji', 'edit-dosenPenguji', 'delete-dosenPenguji', 'view-dosenPenguji']);

        $roleDosenPembimbing = Role::findByName('dosenPembimbing');
        $roleDosenPembimbing->givePermissionTo(['create-dosenPembimbing', 'edit-dosenPembimbing', 'delete-dosenPembimbing', 'view-dosenPembimbing']);

        $roleBaak = Role::findByName('BAAK');
        $roleBaak->givePermissionTo(['create-baak', 'edit-baak', 'delete-baak', 'view-baak']);
    }
}
