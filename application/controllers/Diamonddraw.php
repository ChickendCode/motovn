<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diamonddraw extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model([
			'T_serverdata_model', 
			'T_role_model', 
			'T_user_model',
			'T_inputlog_model',
			'T_tempmoney_model',
			'T_tranlog_model'
			]);
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
		
		$serverdata = $this->T_serverdata_model->get_all_t_serverdata();
		$userdata =  $this->session->userdata('identity');
		$tranlog = $this->T_tranlog_model->get_t_tranlog($userdata['username']);
		$data['subview'] = 'Diamond_draw';
		$data['title'] = 'Hệ thống rút kim cương';
		$data['serverdata'] = $serverdata;
		$data['diamondlist'] = DIAMOND_LIST;
		$data['tranlog'] = $tranlog;
		
		$this->load->view('main.php', $data);
	}

	public function get_figure() {
		$this->ion_auth->check_login();

		$response = array(
			REQ_STATUS_KEY => REQ_STATUS_OK,
			REQ_DATA_KEY => [],
			REQ_ERROR_KEY => []
		);

		$databaseName = $this->input->post('databaseName');
		$db_server_other = $this->load->database($databaseName, TRUE);
		$userdata =  $this->session->userdata('identity');
		$role = $this->T_role_model->get_t_role(XYMU.$userdata['username'], $db_server_other);
		$this->session->userdata("role", $role);
		echo $this->session->userdata("role");

		try {
			$response[REQ_DATA_KEY] = array(
				'role' => $role
			);
        } catch (Exception $e) {
			log_message('error', $e->getMessage());
			$response[REQ_STATUS_KEY] = REQ_STATUS_NG;
			$response[REQ_ERROR_KEY] = [];
		}

		echo json_encode($response);
	}

	public function diamon_draw() {
		$this->ion_auth->check_login();
		
		$response = array(
			REQ_STATUS_KEY => REQ_STATUS_OK,
			REQ_DATA_KEY => [],
			REQ_ERROR_KEY => []
		);

		$money_client = $this->input->post('money');
		$serverName = $this->input->post('serverName');
		$userdata =  $this->session->userdata('identity');
		try {

			$this->db->trans_begin();
			
			//  Trừ money trong t_users (Database server_info)
			$money = $userdata['money'] - (int)$money_client;
			$params = array('money'=> $money);
			$this->T_user_model->update_t_user($userdata['userid'], $params);

			$content = '';
			if ($serverName == SERVER_1) {
				$content = DIAMOND_DRAW_01;
			} else {
				$content = DIAMOND_DRAW_02;
			}

			$role = $this->session->userdata("role");
			echo print_r($role);
			//  Ghi log vào bảng t_tranlog
			$params = array(
				'uid' => $userdata['userid'],
				'title' => DIAMOND_DRAW,
				'timecreate' => date('Y-m-d H:i:s'),
				'coin_request' => $money_client,
				'coin_receive' => $money_client,
				'roleid' => $role['rid'],
				'rolename' => $role['rname'],
				'zoneid' => $role['zoneid'],
				'content' => $content,
			);
			
			$this->T_tranlog_model->add_t_tranlog($params);
			

			// if If an exception occurs rollback , otherwise commit
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				log_message('error', 'Update data error');
			}
			else
			{
				$this->db->trans_commit();
				log_message('error', 'Update data success');

				// // Connect db server other
				// $db_server_other = $this->load->database($serverName, TRUE);

				// $db_server_other->trans_begin();
				
				// //  Insert tiền tưng ứng vôrecord trong t_inputlog
				// $params = array(
				// 	'amount' => $this->input->post('amount'),
				// 	'u' => $this->input->post('u'),
				// 	'rid' => $this->input->post('rid'),
				// 	'order_no' => $this->input->post('order_no'),
				// 	'cporder_no' => $this->input->post('cporder_no'),
				// 	'time' => $this->input->post('time'),
				// 	'sign' => $this->input->post('sign'),
				// 	'inputtime' => $this->input->post('inputtime'),
				// 	'result' => $this->input->post('result'),
				// 	'zoneid' => $this->input->post('zoneid'),
				// 	'itemid' => $this->input->post('itemid'),
				// 	'chargetime' => $this->input->post('chargetime'),
				// );
				
				// $t_inputlog_id = $this->T_inputlog_model->add_t_inputlog($params, $db_server_other);

				// //  Insert tiền tưng ứng vô record trong t_tempmoney
				// $params = array(
				// 	'cc' => $this->input->post('cc'),
				// 	'uid' => $this->input->post('uid'),
				// 	'rid' => $this->input->post('rid'),
				// 	'addmoney' => $this->input->post('addmoney'),
				// 	'itemid' => $this->input->post('itemid'),
				// 	'budanflag' => $this->input->post('budanflag'),
				// 	'chargetime' => $this->input->post('chargetime'),
				// );
				
				// $t_tempmoney_id = $this->T_tempmoney_model->add_t_tempmoney($params,  $db_server_other);

				// if ($db_server_other->trans_status() === FALSE)
				// {
				// 	$db_server_other->trans_rollback();
				// 	log_message('error', 'Update data error');
				// }
				// else
				// {
				// 	$db_server_other->trans_commit();
				// 	log_message('error', 'Update data success');
				// }
			}

        } catch (Exception $e) {
			log_message('error', $e->getMessage());
			$response[REQ_STATUS_KEY] = REQ_STATUS_NG;
			$response[REQ_ERROR_KEY] = [];
		}

		echo json_encode($response);
	}
}
