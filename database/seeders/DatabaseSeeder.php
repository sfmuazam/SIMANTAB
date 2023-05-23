<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tagihan;
use App\Models\Siswa;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Kelas::factory(30)->create();

        $user = User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'role' => 'Admin',
            'password' => bcrypt('admin')
        ]);

        Tagihan::create([
            'id' => '1',
            'jenis' => 'tagihan_kelas10',
            'nilai' => '0',
        ]);
        Tagihan::create([
            'id' => '2',
            'jenis' => 'tagihan_kelas11',
            'nilai' => '0',
        ]);
        Tagihan::create([
            'id' => '3',
            'jenis' => 'tagihan_kelas12',
            'nilai' => '0',
        ]);
        Tagihan::create([
            'id' => '4',
            'jenis' => 'tagihan_lain',
            'nilai' => '0',
        ]);
    }
}
