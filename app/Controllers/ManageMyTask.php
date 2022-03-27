<?php

namespace App\Controllers;

use \App\Models\saveArtikel;
use \App\Models\saveReviewer;
use \App\Models\saveEditor;

class ManageMyTask extends BaseController
{
    protected $session;
    public function __construct()
    {
        // parent::__construct();
        $this->session = session();
        $this->artikel = new saveArtikel();
        $this->reviewer = new saveReviewer();
        $this->editor = new saveEditor();

        // Your own constructor code
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
            'validation' => \Config\Services::validation()
        ];
        echo view('MMT/home', $data);
    }
    public function Dashboard()
    {
        // $session = session();
        // $artikel = new saveArtikel();
        // $id_editor = $this->reviewer->wh
        $data = [
            'title' => 'Dashboard',
            'type' => $this->session->get('type'),
            'logged_in' => $this->session->get('logged_in'),
            'username' => $this->session->get('username'),
            'email' => $this->session->get('useremail'),
            'pending_artikel' => $this->artikel->where('sts_payment', 0)->where('id_editor', $this->session->get('id_user'))->findAll(),
            'reviewer' => $this->reviewer->findAll(),
            'editor' => $this->editor->findAll(),
            'payment_confirm' => $this->artikel->where(['id_editor' => $this->session->get('id_user'), 'sts_payment' => -1])->findAll(),
            'accepted_task' => $this->artikel->where(['id_editor' => $this->session->get('id_user'), 'id_reviewer >' => 1, 'sts_artikel' => 1])->findAll(),
            'final_confirm' => $this->artikel->where(['id_editor' => $this->session->get('id_user'), 'sts_artikel' => 3])->findAll(),
            'finished_task' => $this->artikel->where(['id_editor' => $this->session->get('id_user'), 'sts_artikel' => 4])->findAll(),
            'rejected_task' => $this->artikel->where(['id_editor' => $this->session->get('id_user'), 'id_reviewer' => -1])->findAll()
        ];
        // $editor = $this->editor->findAll();
        // dd($this->artikel->where(['id_editor' => $this->session->get('id_user'), 'sts_artikel' => 3])->findAll());
        echo view('MMT/dashboard', $data);
    }
    public function printEditorName($id)
    {
        $editor_name = $this->editor->where('id_editor', $id)->first();
        echo $editor_name;
    }
    public function addNewTask()
    {
        $data = [
            'title' => 'Add New Task',
            'validation' => \Config\Services::validation(),
            'type' => $this->session->get('type'),
            'logged_in' => $this->session->get('logged_in'),
            'username' => $this->session->get('username'),
            'email' => $this->session->get('useremail')
        ];
        echo view('MMT/addNewTask', $data);
    }
    public function SaveArtikel()
    {
        //$filename = $this->request->getFile('filename');
        // dd($this->session->get('id_user'));
        $saveArtikel = new saveArtikel();
        if (!$this->validate([
            'title' => 'required',
            'author' => 'required',
            'commission' => 'required',
            'filename' => 'uploaded[filename]',
            'deadline' => 'required'
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('http://localhost:8080/ManageMyTask/addNewTask')->withInput()->with('validation', $validation);
            return redirect()->to('http://localhost:8080/ManageMyTask/addNewTask')->withInput();
        }
        $my_file = $this->request->getFile('filename');
        $file_name = $my_file->getName();
        // $file->store('/', $file_name);
        $my_file->move('upload');
        $saveArtikel->save([
            'judul' => $this->request->getVar('title'),
            'isi' => $file_name,
            'penulis' => $this->request->getVar('author'),
            'kataKunci' => $this->request->getVar('keyword'),
            'commission' => $this->request->getVar('commission'),
            'deadline' => $this->request->getVar('deadline'),
            'id_editor' => $this->session->get('id_user')
        ]);
        session()->setFlashdata('success', 'Task Has Been Added');
        return redirect()->to('http://localhost:8080/ManageMyTask/addNewTask');
    }
    public function confirmTaskCompletion()
    {
        $data = [
            'title' => 'Confirm Task'
        ];
        echo view('MMT/confirmTaskCompletion', $data);
    }
    public function selectPotentialReviewer()
    {
        $reviewer = new saveReviewer();

        $data = [
            'title' => 'Select Reviewer',
            'reviewer' => $reviewer->paginate(5, 'reviewer'),
            'type' => $this->session->get('type'),
            'pager' => $reviewer->pager
        ];
        echo view('MMT/selectPotentialReviewer', $data);
    }
    public function viewTask()
    {
        $taskList = new saveArtikel();

        $data = [
            'title' => 'View Task',
            'task' => $taskList->paginate(5, 'artikel'),
            'pager' => $taskList->pager
        ];
        echo view('MMT/viewTask', $data);
    }

    public function commitPayment($id)
    {
        $data = [
            'title' => 'Payment Method',
            'type' => $this->session->get('type'),
            'artikel' => $this->artikel->where('id_artikel', $id)->first(),
            'logged_in' => $this->session->get('logged_in'),
            'email' => $this->session->get('useremail'),
            'validation' => \Config\Services::validation()
        ];
        echo view('MMT/commitPayment', $data);
    }
    public function Payment($id)
    {
        $commission = $this->artikel->where('id_artikel', $id)->first();

        if (!$this->validate([
            'filename' => 'uploaded[filename]'
        ])) {
            return redirect()->to('http://localhost:8080/ManageMyTask/commitPayment/' . $id)->withInput();
        } else {
            $receipt = $this->request->getFile('filename');
            $file_name = $receipt->getName();
            $receipt->move('receipt');
            $this->artikel->save([
                'id_artikel' => $id,
                'receipt' => $file_name,
                'sts_payment' => -1
            ]);
            session()->setFlashdata('msg', 'Payment berhasil! Silahkan menunggu hasil konfirmasi dari makelar');
            return redirect()->to('http://localhost:8080/ManageMyTask/Dashboard/');
        }
    }
    public function Final($id)
    {
        $this->artikel->save([
            'id_artikel' => $id,
            'sts_artikel' => 4
        ]);
        return redirect()->to('http://localhost:8080/ManageMyTask/Dashboard/');
    }
    public function Download($file_name = null)
    {

        return $this->response->download('upload/' . $file_name, null);
    }
}
