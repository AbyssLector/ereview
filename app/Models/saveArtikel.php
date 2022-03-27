<?php

namespace App\Models;

use CodeIgniter\Model;

class saveArtikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    protected $allowedFields = ['judul', 'isi', 'penulis', 'bidang_ilmu', 'commission', 'kataKunci', 'id_editor', 'id_reviewer', 'sts_payment', 'receipt', 'upload', 'komentar_reviewer', 'sts_artikel', 'deadline'];
    protected $useTimestamps = true;
    protected $createdField = 'date_created';
    protected $updatedField = 'date_updated';
}
