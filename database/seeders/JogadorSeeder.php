<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jogador;


class JogadorSeeder extends Seeder
{
    
    
    
    
    /**
     * Run the database seeds.
    */
 public function run(): void
    {
        Jogador::factory(10)->create();
        

           /* Jogador::insert(
            [
                'id' => 13,
                'nome' => "Walcot",
                'clube' => 'Arsenal',
                'nacionalidade' => 'Ingles',
                'sobre' => 'Teste tes', 
                'numero_de_titulos' => 2,
                'foto' => 'image.jpg'

            ],
            [
                'id' => 14,
                'nome' => "Griezman",
                'clube' => 'Real Sociedade',
                'nacionalidade' => 'Frances',
                'sobre' => 'Teste tes', 
                'foto' => 'image.jpg'

            ],
            [
                'id' => 15,
                'nome' => "Benzema",
                'clube' => 'Real Madrid',
                'nacionalidade' => 'Ingles',
                'sobre' => 'Teste tes', 
                'numero_de_titulos' => 2,
                'foto' => 'image.jpg'

            ] 
        );*/

    }
}


