<?php

namespace App\Models;

use CodeIgniter\Model;

class saveReviewer extends Model
{
    protected $table = 'reviewer';
    protected $primaryKey = 'id_reviewer';
    protected $allowedFields = ['nama', 'email', 'password', 'bidang_ilmu', 'balance'];
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'date_updated';
}
