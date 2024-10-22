<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvedoresModel extends Model
{
    protected $table            = 'provedores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre','descripcion','telefono'];


    // Dates
    protected $useTimestamps = false;


}
