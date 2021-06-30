<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion'];

    public function get($id = null){

        if ($id == null) {
            return $this->findAll();
        }

        return $this->asObject
                    ->where(['id' => $id])
                    ->first();

    }
}