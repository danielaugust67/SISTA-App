<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');

        $mahasiswa = User::create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('mahasiswa123')
        ]);
        $mahasiswa->assignRole('mahasiswa');

        $koordinator = User::create([
            'name' => 'koordinator',
            'email' => 'koordinator@gmail.com',
            'password' => bcrypt('koordinator123')
        ]);
        $koordinator->assignRole('koordinator');

        $dosenPenguji = User::create([
            'name' => 'Dosen Penguji',
            'email' => 'penguji@gmail.com',
            'password' => bcrypt('penguji123')
        ]);
        $dosenPenguji->assignRole('dosenPenguji');

        $dosenPembimbing = User::create([
            'name' => 'Dosen Pembimbing',
            'email' => 'pembimbing@gmail.com',
            'password' => bcrypt('pembimbing123')
        ]);
        $dosenPembimbing->assignRole('dosenPembimbing');

        $baak = User::create([
            'name' => 'BAAK',
            'email' => 'baak123@gmail.com',
            'password' => bcrypt('baak12345')
        ]);
        $baak->assignRole('BAAK');

    }
}
