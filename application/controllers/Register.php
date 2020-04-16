<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['T_user_model']);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$data = $this->createFormData();
		$this->load->view('register.php', $data);
	}

	// log the user in
	function regist()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$re_password = $this->input->post('re_password');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$date = new DateTime("NOW");

		if ($password != $re_password) {
			$data = $this->createFormData(
				$username, 
				$password,
				$re_password,
				$email,
				$phone
			);
			$data['message'] = MSG_NOT_COMPARE;
		} else {
			$user = $this->T_user_model->get_t_user($username);
			if (isset($user)) {
				$data = $this->createFormData(
					$username, 
					$password,
					$re_password,
					$email,
					$phone
				);
				$data['message'] = MSG_USER_EXIST;
			} else {
				$params = array(
					'username' => $username,
					'userpwd' => md5($password),
					'realname' => $username,
					'uquestion' => 0,
					'uanswer' => null,
					'regtime' => $date->format('Y-m-d H:i:s'),
					'lasttime' => $date->format('Y-m-d H:i:s'),
					'modtime' => null,
					'isadult' => 0,
					'money' => 0,
					'email' => $email,
					'phone' => $phone,
					'IsFirstGiftcode' => 0,
				);
		
				$this->T_user_model->add_t_user($params);
	
				$data = $this->createFormData();
				$data['message'] = MSG_SUCCCESS;
			}
		}

		$this->load->view('register.php', $data);
	}

	private function createFormData(
					$username= '', 
					$password='',
					$re_password='',
					$email='',
					$phone=''
		) {

		$data['username'] = array('name' => 'username',
				'id'   => 'username',
				'type' => 'username',
				'value' => $username
		);
		$data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
				'value' => $password
		);
		$data['re_password'] = array('name' => 're_password',
				'id'   => 're_password',
				'type' => 'password',
				'value' => $re_password
		);
		$data['email'] = array('name' => 'email',
				'id'   => 'email',
				'type' => 'email',
				'value' => $email
		);
		$data['phone'] = array('name' => 'phone',
				'id'   => 'phone',
				'type' => 'phone',
				'value' => $phone
		);
		
		return $data;
	}
}
