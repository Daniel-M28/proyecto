<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\usuario;
use App\Models\cita;
use App\Models\inventario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * @return void
     */


    public function run(): void
    { 
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(RoleSeeder::class);
        $this-> call(UserSeeder::class);
       
        
    }
}
