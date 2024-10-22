<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProvedoresSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre' => 'Coca-cola',
                'descripcion' => 'empresa de refrescos y productos bebibles',
                'telefono' => '1011202187'
            ],
            [
                'nombre' => 'Sabritas',
                'descripcion' => 'empresa de frituras',
                'telefono' => '6011282187'
            ],
            [
                'nombre' => 'Bimbo',
                'descripcion' => 'empresa de panes',
                'telefono' => '1011608182'
            ],
            [
                'nombre' => 'sahuayo',
                'descripcion' => 'provedores de multiples productos para el hogar',
                'telefono' => '1081207189'
            ],
        ];

        $this->db->table('provedores')->insertBatch($data);
    }
}
