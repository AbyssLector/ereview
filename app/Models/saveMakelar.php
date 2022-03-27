<?php

namespace App\Models;

use CodeIgniter\Model;

class saveMakelar extends Model
{
    protected $table = 'makelar';
    protected $primaryKey = 'id_makelar';
    // protected $allowedFields = ['judul', 'isi', 'penulis', 'bidang_ilmu', 'commission', 'kataKunci',];
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'date_updated';
}
