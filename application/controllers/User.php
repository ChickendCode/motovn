<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->ion_auth->check_login();

		$userdata =  $this->session->userdata('identity');
		$user = $this->T_user_model->get_t_user($userdata['username']);
		
		$data = $this->createFormData('', '', '', $user['email'], $user['phone']);
		$data['subview'] = 'user';
		$data['title'] = 'Quản lý tài khoản';
		$this->load->view('main.php', $data);
	}

	// log the user in
	function update()
	{
		$this->ion_auth->check_login();
		
		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$re_password = $this->input->post('re_password');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$date = new DateTime("NOW");
		
		$user = $this->T_user_model->get_t_user_by_pwd(md5($old_password));

		$data = $this->createFormData(
			$old_password, 
			$new_password,
			$re_password,
			$email,
			$phone
		);

		if (!isset($user)) {
			$data['message'] = MSG_OLD_PASS_NOT_COMPARE;
			$data['type'] = TYPE_DANGER;
		} else if (strlen($new_password) <= 6) {
			$data['message'] = MSG_PASSWORD_THAN_6;
			$data['type'] = TYPE_DANGER;
		} else if ($new_password != $re_password) {
			$data['message'] = MSG_NOT_COMPARE;
			$data['type'] = TYPE_DANGER;
		} else {
			$params = array(
				'userpwd' => md5($new_password),
				'regtime' => $date->format('Y-m-d H:i:s')
			);

			$userdata =  $this->session->userdata('identity');
	
			$this->T_user_model->update_t_user($userdata['userid'], $params);

			$data = $this->createFormData('', '', '', $email, $phone);
			$data['message'] = MSG_SUCCCESS_UPDATE;
			$data['type'] = TYPE_SUCCESS;
		}

		$data['subview'] = 'user';
		$data['title'] = 'Quản lý tài khoản';
		$this->load->view('main.php', $data);
	}

	private function createFormData(
					$old_password= '', 
					$new_password='',
					$re_password='',
					$email='',
					$phone=''
		) {

		$data['old_password'] = array('name' => 'old_password',
				'id'   => 'old_password',
				'type' => 'password',
				'value' => $old_password
		);
		$data['new_password'] = array('name' => 'new_password',
				'id'   => 'new_password',
				'type' => 'password',
				'value' => $new_password
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
