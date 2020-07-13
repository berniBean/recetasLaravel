<?php

use App\User;
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

        $user = User::create([
            'name'=> 'Berni',
            'email' => 'ernesto_fope55@hotmail.com',
            'password'=>Hash::make('12345678'),
            'url' => 'https://github.com/berniBean',            
        ]);
        $user->perfil()->create();

        $user2 = User::create([
            'name'=> 'Mel O saco',
            'email' => 'saco@correo.com',
            'password'=>Hash::make('12345678'),
            'url' => 'http://www.miholamundo.com/',        
        ]);
        $user2->perfil()->create();
        
    }
}
