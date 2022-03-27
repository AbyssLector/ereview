<?php

namespace App\Models;

use CodeIgniter\Model;

class saveEditor extends Model
{
    protected $table = 'editor';
    protected $primaryKey = 'id_editor';
    protected $allowedFields = ['nama', 'email', 'password'];
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'date_updated';
    // public function getId_editor()
    // {

    // }
}
