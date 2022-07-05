<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\UsuarioFoto;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuario = Usuario::create([
            'nome' => 'alex silva',
            'email' => 'alex@hotmail.com',
            'senha' => '1234',
            'cargo' => 'adm',
            'status' => 'ativo'
        ]);

        UsuarioFoto::create([
            'usuario_id' => $usuario->id,
            'foto_caminho' => ''
        ]);
    }
}
