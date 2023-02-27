<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_user' => 'admin',
            'alamat' => '',
            'email' => 'admin@gmail.com',
            'no_telp' => '',
            'password' => Hash::make('admin'),
            'level_user' => 'admin',
        ]);
        User::factory(10)->create();
        Kategori::create([
            'nama_kategori' => 'Teknologi'
        ]);
        Kategori::create([
            'nama_kategori' => 'Action'
        ]);
        Kategori::create([
            'nama_kategori' => 'Comedy'
        ]);
        Kategori::create([
            'nama_kategori' => 'Sejarah'
        ]);
        Kategori::create([
            'nama_kategori' => 'Ilmiah'
        ]);
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
