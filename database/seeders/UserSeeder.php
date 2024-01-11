<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * datos para ingresar como administrador
     * si se cambian hay que hacer una migracion a la bd con --seed 
     * @return void
     */
    public function run()
    {
        User::create([
          'name'=> 'administrador',
          'email' => 'usuario@admin.com',
          'password' => bcrypt('12345678')
        
        ])->assignRole('Admin');
         
       
    }

}