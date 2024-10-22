<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table            = 'productos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['clave','nombre','categoria','descripcion','fecha_caducidad','id_provedor'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function productosProvedor(){
        return $this->select('productos.*, provedores.nombre AS provedor')
        ->join('provedores', 'productos.id_provedor = provedores.id')
        ->findAll();
    }
}
