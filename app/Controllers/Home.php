<?php

namespace App\Controllers;

use App\Models\saveReviewer;
use App\Models\saveEditor;
use App\Models\saveMakelar;
use App\Models\saveArtikel;

class Home extends BaseController
{
	protected $session;
	public function __construct()
	{
		// parent::__construct();
		$this->session = session();
		$this->artikel = new saveArtikel();
		$this->reviewer = new saveReviewer();
		$this->editor = new saveEditor();
		$this->makelar = new saveMakelar();
	}
	public function index()
	{
		//echo "hello world";
		$data = [
			'title' => 'Home',
			'type' => $this->session->get('type'),
			'logged_in' => $this->session->get('logged_in')
		];
		return view('dashboard', $data);
	}

	public function welcome()
	{
		// $session = session();
		$data = [
			'title' => 'Welcome',
			'username' => $this->session->get('username')
		];
		// dd($data['session']);
		echo view('welcome', $data);
	}

	public function signUp()
	{
		// $session = session();
		$data = [
			'title' => 'Sign Up',
			'type' => $this->session->get('type'),
			'validation' => \Config\Services::validation(),
			'logged_in' => $this->session->get('logged_in'),
			'email' => $this->session->get('useremail')
		];
		echo view('signUp', $data);
	}
	public function myLogin()
	{
		// $session = session();

		$data = [
			'title' => 'login',
			'type' => $this->session->get('type'),
			'logged_in' => $this->session->get('logged_in'),
			'email' => $this->session->get('useremail')
		];

		// $session = session();
		echo view('login', $data);
	}
	public function Auth()
	{
		// $session = session();

		// $editor = new saveEditor();
		$email = $this->request->getVar('email');
		$pass = $this->request->getVar('password');
		if ($this->request->getVar('option') == 'reviewer') {
			$reviewer = new saveReviewer();
			$data = $reviewer->where('email', $email)->first();

			if ($data) {
				$password = $data['password'];
				// dd($pass);
				$verify_pass = strcmp($password, $pass);
				// dd($verify_pass);
				if ($verify_pass == 0) {
					$ses_data = [
						'username' => $data['nama'],
						'type' => 'reviewer',
						'useremail' => $data['email'],
						'id_user' => $data['id_reviewer'],
						'level' => $data['level'],
						'logged_in' => true
					];
					$this->session->set($ses_data);
					session()->setFlashdata('success', $data['nama']);
					return redirect()->to('http://localhost:8080/ManageAssignedTask/Dashboard');
				} else {
					session()->setFlashdata('msg', 'Wrong Password');
					return redirect()->to('http://localhost:8080/Home/myLogin');
				}
			} else {
				session()->setFlashdata('msg', 'Email not found');
				return redirect()->to('http://localhost:8080/Home/myLogin');
			}
		} else if ($this->request->getVar('option') == 'editor') {
			$editor = new saveEditor();
			$data = $editor->where('email', $email)->first();

			if ($data) {
				$password = $data['password'];
				// dd($pass);
				$verify_pass = strcmp($password, $pass);
				// dd($verify_pass);
				if ($verify_pass == 0) {
					$ses_data = [
						'username' => $data['nama'],
						'type' => 'editor',
						'useremail' => $data['email'],
						'id_user' => $data['id_editor'],
						'logged_in' => true
					];
					$this->session->set($ses_data);
					session()->setFlashdata('success', $data['nama']);
					return redirect()->to('http://localhost:8080/ManageMyTask/Dashboard');
				} else {
					session()->setFlashdata('msg', 'Wrong Password');
					return redirect()->to('http://localhost:8080/Home/myLogin');
				}
			} else {
				session()->setFlashdata('msg', 'Email not found');
				return redirect()->to('http://localhost:8080/Home/myLogin');
			}
		} else {
			$makelar = new saveMakelar();
			$data = $makelar->where('email', $email)->first();

			if ($data) {
				$password = $data['password'];
				// dd($pass);
				$verify_pass = strcmp($password, $pass);
				// dd($verify_pass);
				if ($verify_pass == 0) {
					$ses_data = [
						'username' => $data['nama'],
						'useremail' => $data['email'],
						'id_user' => $data['id_makelar'],
						'type' => 'makelar',
						'logged_in' => true
					];
					$this->session->set($ses_data);
					session()->setFlashdata('success', $data['nama']);
					return redirect()->to('http://localhost:8080/ManageAllTask/Dashboard');
				} else {
					session()->setFlashdata('msg', 'Wrong Password');
					return redirect()->to('http://localhost:8080/Home/myLogin');
				}
			} else {
				session()->setFlashdata('msg', 'Email not found');
				return redirect()->to('http://localhost:8080/Home/myLogin');
			}
		}
	}
	public function Logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('http://localhost:8080/Home/myLogin');
	}
	public function save()
	{
		//validation

		$name = $this->request->getVar('name');
		$email = $this->request->getVar('email');
		$bidangIlmu = $this->request->getVar('expertise');
		$pass = $this->request->getVar('Password');
		session()->setFlashdata('success', $name);
		if ($this->request->getVar('option') == 'reviewer') {
			if (!$this->validate([
				'name' => 'required',
				'email' => 'required|is_unique[reviewer.email]',
				'Password' => 'required',
				'expertise' => 'required'
			])) {
				$validation = \Config\Services::validation();
				return redirect()->to('http://localhost:8080/Home/signUp')->withInput()->with('validation', $validation);
			}
			$saveReviewer = new saveReviewer();
			$saveReviewer->save([
				'nama' => $name,
				'email' => $email,
				'bidang_ilmu' => $bidangIlmu,
				'password' => $pass
			]);

			return redirect()->to('http://localhost:8080/Home/myLogin');
		} else {
			if (!$this->validate([
				'name' => 'required',
				'email' => 'required|is_unique[editor.email]',
				'Password' => 'required'
			])) {
				$validation = \Config\Services::validation();
				return redirect()->to('http://localhost:8080/Home/signUp')->withInput()->with('validation', $validation);
			}
			$saveEditor = new saveEditor();
			$saveEditor->save([
				'nama' => $name,
				'email' => $email,
				'password' => $pass
			]);
			return redirect()->to('http://localhost:8080/Home/myLogin');
		}
	}
	public function Profile()
	{
		$type = $this->session->get('type');
		// dd($type);
		if ($type == 'reviewer') {
			$user = $this->reviewer->where('id_reviewer', $this->session->get('id_user'))->first();
			$competence = $user['bidang_ilmu'];
		} else if ($type == 'editor') {
			$user = $this->editor->where('id_editor', $this->session->get('id_user'))->first();
			$competence = '0';
		} else {
			$user = $this->makelar->where('id_makelar', $this->session->get('id_user'))->first();
			$competence = '0';
		}

		$data = [
			'title' => 'Profile',
			'type' => $this->session->get('type'),
			'logged_in' => $this->session->get('logged_in'),
			'mail' => $this->session->get('useremail'),
			'name' => $user['nama'],
			'competence' => $competence
		];
		echo view('profile', $data);
	}
	public function ChangeProfile()
	{
		$type = $this->session->get('type');
		// dd($type);
		if ($type == 'reviewer') {
			$user = $this->reviewer->where('id_reviewer', $this->session->get('id_user'))->first();
		} else if ($type == 'editor') {
			$user = $this->editor->where('id_editor', $this->session->get('id_user'))->first();
		} else {
			$user = $this->makelar->where('id_makelar', $this->session->get('id_user'))->first();
		}
		$data = [
			'title' => 'Change Profile',
			'name' => $user['nama'],
			'type' => $this->session->get('type'),
			'validation' => \Config\Services::validation(),
			// 'mail' => $this->session->get('useremail')
		];
		echo view('changeprofile', $data);
	}
	public function SaveChange()
	{
		$type = $this->session->get('type');
		// $id = $this->session->get('id_user');
		// $email = $this->request->getVar('email');
		if ($type == 'editor') {
			if (!$this->validate([
				'name' => 'required',
				'email' => 'required|is_unique[editor.email]',
				'password' => 'required',
				'confpass' => 'required'
			])) {
				return redirect()->to('http://localhost:8080/Home/ChangeProfile')->withInput();
			}
			$pass = $this->request->getVar('password');
			$conf = $this->request->getVar('confpass');
			if (strcmp($pass, $conf) == 0) {
				$this->editor->save([
					'id_editor' => $this->session->get('id_user'),
					'nama' => $this->request->getVar('name'),
					'password' => $pass,
					'email' => $this->request->getVar('email'),
				]);
				session()->destroy();
				return redirect()->to('http://localhost:8080/Home/myLogin');
			}
			session()->setFlashdata('msg', 'password doesnt match');
			return redirect()->to('http://localhost:8080/Home/ChangeProfile');
		} elseif ($type == 'reviewer') {
			if (!$this->validate([
				'name' => 'required',
				'email' => 'required|is_unique[editor.email]',
				'password' => 'required',
				'confpass' => 'required'
			])) {
				return redirect()->to('http://localhost:8080/Home/ChangeProfile')->withInput();
			}
			$pass = $this->request->getVar('password');
			$conf = $this->request->getVar('confpass');
			if (strcmp($pass, $conf) == 0) {
				$this->reviewer->save([
					'id_editor' => $this->session->get('id_user'),
					'nama' => $this->request->getVar('name'),
					'email' => $this->request->getVar('email'),
					'password' => $pass,
					'bidang_ilmu' => $this->request->getVar('competence'),
				]);
				session()->destroy();
				return redirect()->to('http://localhost:8080/Home/myLogin');
			}
			session()->setFlashdata('msg', 'password doesnt match');
			return redirect()->to('http://localhost:8080/Home/ChangeProfile');
		}
	}
}
