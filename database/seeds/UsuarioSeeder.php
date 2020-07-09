<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Berni',
            'email' => 'ernesto_fope55@hotmail.com',
            'password'=>Hash::make('12345678'),
            'url' => 'https://github.com/berniBean',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name'=> 'juan',
            'email' => 'correo@correo.com',
            'password'=>Hash::make('12345678'),
            'url' => 'http://codigoconjuan.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name'=> 'Diana',
            'email' => 'diAna@correo.com',
            'password'=>Hash::make('12345678'),
            'url' => 'https://www.alfaomega.com.mx/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        DB::table('users')->insert([
            'name'=> 'Mel O saco',
            'email' => 'saco@correo.com',
            'password'=>Hash::make('12345678'),
            'url' => 'http://www.miholamundo.com/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')            
        ]);
    }
}
