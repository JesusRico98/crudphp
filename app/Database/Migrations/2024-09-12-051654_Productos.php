<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Productos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'categoria' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'fecha_caducidad'=>[
                'type' => 'DATE',
            ],
            'id_provedor'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                
            ],
        ]);

        $this->forge->addKey('id',true);
        $this->forge->addForeignKey('id_provedor','provedores','id');
        $this->forge->createTable('productos');
    }

    public function down()
    {
        $this->forge->dropTable('productos');
    }
}
