<?php

namespace App\Controllers;

use \App\Models\saveArtikel;
use \App\Models\saveReviewer;
use \App\Models\saveEditor;

class ManageAssignedTask extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
        $this->artikel = new saveArtikel();
        $this->reviewer = new saveReviewer();
        $this->editor = new saveEditor();
    }
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
    public function home()
    {
        $data = [
            'title' => 'Home',
        ];
        echo view('MAsT/home', $data);
    }
    public function Dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'type' => $this->session->get('type'),
            'logged_in' => $this->session->get('logged_in'),
            'username' => $this->session->get('username'),
            'email' => $this->session->get('useremail'),
            'id_user' => $this->session->get('id_user'),
            'pending_accept' => $this->artikel->where(['sts_payment' => 1, 'id_reviewer' => 0])->findAll(),
            'editor' => $this->editor->findAll(),
            'pending_reviewed' => $this->artikel->where(['id_reviewer' => $this->session->get('id_user'), 'sts_artikel' => 1])->findAll(),
            'pending_reviewed_conf' => $this->artikel->where(['id_reviewer' => $this->session->get('id_user'), 'sts_artikel' => 2])->findAll(),
            'confirmed_makelar' => $this->artikel->where(['id_reviewer' => $this->session->get('id_user'), 'sts_artikel' => 3])->findAll(),
            'finished_task' => $this->artikel->where(['id_reviewer' => $this->session->get('id_user'), 'sts_artikel' => 4])->findAll()
        ];
        // dd($this->artikel->where(['id_reviewer' => $this->session->get('id_user'), 'sts_artikel' => 2])->first());
        echo view('MAsT/dashboard', $data);
    }
    public function acceptTask()
    {
        $data = [
            'title' => 'Accout Balance',
            'type' => $this->session->get('type'),
            'logged_in' => $this->session->get('logged_in'),
            'username' => $this->session->get('username'),
            'email' => $this->session->get('useremail'),
            'id_user' => $this->session->get('id_user'),
        ];
        echo view('MAsT/balance', $data);
    }
    public function Balance()
    {
        $data = [
            'title' => 'Deduction',
            'logged_in' => $this->session->get('logged_in'),
            'username' => $this->session->get('username'),
            'email' => $this->session->get('useremail'),
            'id_user' => $this->session->get('id_user'),
            'type' => $this->session->get('type'),
            'mydata' => $this->reviewer->where('id_reviewer', $this->session->get('id_user'))->first()
        ];
        echo view('MAsT/balance', $data);
    }

    public function Upload($id)
    {
        $data = [
            'title' => 'Upload Task',
            'type' => $this->session->get('type'),
            'logged_in' => $this->session->get('logged_in'),
            'username' => $this->session->get('username'),
            'email' => $this->session->get('useremail'),
            'artikel' => $this->artikel->where('id_artikel', $id)->first(),
            'validation' => \Config\Services::validation(),
        ];
        echo view('MAsT/submitTask', $data);
    }
    public function UploadResult($id)
    {
        if (!$this->validate([
            'review' => 'uploaded[review]',
        ])) {
            return redirect()->to('http://localhost:8080/ManageAssignedTask/Upload/' . $id)->withInput();
        }
        $review = $this->request->getFile('review');
        $file_name = $review->getName();
        $review->move('reviewed');
        $this->artikel->save([
            'id_artikel' => $id,
            'upload' => $file_name,
            'komentar_reviewer' => $this->request->getVar('comment'),
            'sts_artikel' => 2
        ]);
        return redirect()->to('http://localhost:8080/ManageAssignedTask/Dashboard');
    }

    public function AccTask($id)
    {

        $this->artikel->save([
            'id_artikel' => $id,
            'id_reviewer' => $this->session->get('id_user'),
        ]);
        session()->setFlashdata('msg', 'Task Accepted');
        return redirect()->to('http://localhost:8080/ManageAssignedTask/Dashboard/');
    }
    public function RejTask($id)
    {
        $this->artikel->save([
            'id_artikel' => $id,
            'id_reviewer' => -1
        ]);
        session()->setFlashdata('msg', 'Task Rejected');
        return redirect()->to('http://localhost:8080/ManageAssignedTask/Dashboard/');
    }
    public function DownloadResult($file_name = null)
    {
        return $this->response->download('reviewed/' . $file_name, null);
    }
    public function DeductFunds()
    {
        $data = [
            'title' => 'Payment Method',
            'type' => $this->session->get('type'),
            'logged_in' => $this->session->get('logged_in'),
            'email' => $this->session->get('useremail'),
            'validation' => \Config\Services::validation()
        ];
        echo view('MAsT/deductionFunds', $data);
    }
    public function Withdraw()
    {
        $account = $this->reviewer->where('id_reviewer', $this->session->get('id_user'))->first();
        $value = $this->request->getVar('value');
        if ($value > $account['balance']) {
            session()->setFlashdata('msg', 'you dont have enough balance');
            return redirect()->to('http://localhost:8080/ManageAssignedTask/DeductFunds/');
        }
        $finalvalue = $account['balance'] - $value;
        $this->reviewer->save([
            'id_reviewer' => $this->session->get('id_user'),
            'balance' => $finalvalue
        ]);
        return redirect()->to('http://localhost:8080/ManageAssignedTask/Balance/');
    }
}
