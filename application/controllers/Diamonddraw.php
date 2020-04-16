<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diamonddraw extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('T_serverdata_model');
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
		if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
		}
		
		$serverdata = $this->T_serverdata_model->get_all_t_serverdata();
		$data['subview'] = 'Diamond_draw';
		$data['title'] = 'Hệ thống rút kim cương';
		$data['serverdata'] = $serverdata;
		$data['diamondlist'] = DIAMOND_LIST;
		
		$this->load->view('home.php', $data);
	}

	public function get_dummy_data() {

		$response = array(
			REQ_STATUS_KEY => REQ_STATUS_OK,
			REQ_DATA_KEY => [],
			REQ_ERROR_KEY => []
		);

		try {
			$response[REQ_DATA_KEY] = array(
				'keyParam' => $this->input->post('keyParam')
			);
        } catch (Exception $e) {
			log_message('error', $e->getMessage());
			$response[REQ_STATUS_KEY] = REQ_STATUS_NG;
			$response[REQ_ERROR_KEY] = [];
		}

		echo json_encode($response);
	}
}
