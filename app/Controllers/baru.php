<?php

namespace App\Controllers;

class baru extends BaseController
{
    public function index()
    {
        echo "hello";
        //return view('welcome_message');
    }
    public function viewListIlmu()
    {
        $listArtikel = new \App\Models\viewIlmu();
        /* $db = \Config\Database::connect();
        $listilmu = $db->query("SELECT * FROM bidang_ilmu");
        foreach ($listilmu->getResultArray() as $row) {
            d($row);
        }*/
    }
    public function coba()
    {
        $data = [
            'title' => 'Coba'
        ];
        echo view('coba', $data);
    }
}
