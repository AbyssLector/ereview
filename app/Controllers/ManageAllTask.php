<?php

namespace App\Controllers;

use \App\Models\saveArtikel;
use \App\Models\saveReviewer;
use \App\Models\saveEditor;

class ManageAllTask extends BaseController
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
    public function home()
    {
        $data = [
            'title' => 'home'
        ];
        echo view('MAT/home', $data);
    }
    public function Dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'type' => $this->session->get('type'),
            'logged_in' => $this->session->get('logged_in'),
            'username' => $this->session->get('username'),
            'email' => $this->session->get('useremail'),
            'pending_payment' => $this->artikel->where('sts_payment', 0)->findAll(),
            'pending_confirmation' => $this->artikel->where('sts_payment', -1)->findAll(),
            'editor' => $this->editor->findAll(),
            'rejected_task' => $this->artikel->where('id_reviewer', -1)->findAll(),
            'ongoing_task' => $this->artikel->where(['sts_artikel' => 1, 'id_reviewer >' => 0])->findAll(),
            'confirm_finished' => $this->artikel->where(['sts_artikel' => 2,])->findAll(),
            'reviewer' => $this->reviewer->findAll(),
            'finished_task' => $this->artikel->where(['sts_artikel' => 4])->findAll(),
            'accepted_task' => $this->artikel->where(['id_reviewer >' => 0, 'sts_artikel' => 1])->findAll(),
            'confirmed_finished' => $this->artikel->where(['sts_artikel' => 3])->findAll(),
        ];
        // dd($this->artikel->where(['sts_artikel' => 2,])->findAll());
        echo view('MAT/dashboard', $data);
    }
    public function confirmTaskCompletion() //don't forget $data!!!!
    {
        $data = [
            'title' => 'Confirm Task'
        ];
        echo view('MAT/confirmTaskCompletion', $data);
    }

    public function manageEditor()
    {
        $data = [
            'title' => 'Manage Editor'
        ];
        echo view('MAT/manageEditor', $data);
    }

    public function monitorProgressofTask()
    {
        $data = [
            'title' => 'Monitor Task'
        ];
        echo view('MAT/monitorProgressofTask', $data);
    }
    public function AcceptPayment($id)
    {

        $this->artikel->save([
            'id_artikel' => $id,
            'sts_payment' => 1
        ]);
        session()->setFlashdata('msg', 'payment accepted');
        return redirect()->to('http://localhost:8080/ManageAllTask/Dashboard/');
    }
    public function RejectPayment($id)
    {
        $this->artikel->save([
            'id_artikel' => $id,
            'sts_payment' => 0
        ]);
        session()->setFlashdata('msg', 'payment rejected');
        return redirect()->to('http://localhost:8080/ManageAllTask/Dashboard/');
    }
    public function DownloadReceipt($file_name = null)
    {

        return $this->response->download('receipt/' . $file_name, null);
    }
    public function AcceptReviewedTask($id)
    {
        $this->artikel->save([
            'id_artikel' => $id,
            'sts_artikel' => 3
        ]);
        return redirect()->to('http://localhost:8080/ManageAllTask/Dashboard/');
    }
    public function RejectReviewedTask($id)
    {
        $this->artikel->save([
            'id_artikel' => $id,
            'sts_artikel' => 1
        ]);
        return redirect()->to('http://localhost:8080/ManageAllTask/Dashboard/');
    }
    public function SendPayment($id)
    {
        $artikel = $this->artikel->where('id_artikel', $id)->first();
        $reviewer = $this->reviewer->where('id_reviewer', $artikel['id_reviewer'])->first();

        $balance = $artikel['commission'] + $reviewer['balance'];
        $this->reviewer->save([
            'id_reviewer' => $artikel['id_reviewer'],
            'balance' => $balance
        ]);
        $this->artikel->save([
            'id_artikel' => $id,
            'sts_artikel' => 5
        ]);
        return redirect()->to('http://localhost:8080/ManageAllTask/Dashboard/');
    }
}
