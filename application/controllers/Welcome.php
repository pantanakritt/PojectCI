<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		date_default_timezone_set("Asia/Bangkok");

		$this->load->model('select_by','select_by');
		$this->load->model('show_table_menu','md_call');
		$this->load->model('log','logfile');

		//$this->load->helper('gadget');

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		


		$query1['day'] = $this->md_call->_callDay();
		$query1['room'] = $this->md_call->_callRoom();
		$query1['group'] = $this->md_call->_callGroup();
		$query1['teacher'] = $this->md_call->_callTeach();

		$q_select['select_day'] = $this->select_by->_selectByday();

		$dt_send = array(
			'day' => $query1['day']									, 
			'room' => $query1['room'] 								,
			'group' => $query1['group']								,
			'teacher' => $query1['teacher']							,
			'select_day' => $q_select['select_day']					,

			
			);

		$this->load->view('main', $dt_send );
		
	}

//--------------------- Check login ---------------------
	public function check_login(){
		//$this->load->helper('url');
		//$this->load->library('session');
		$user = $this->input->post('user');
		$pass = $this->input->post('password');

		$this->load->model('log_in' , 'chk_login');
		if($this->chk_login->_chkLogin($user,$pass)){
			//echo "success";
			//redirect(base_url(), 'refresh');
			$logtxt = $this->logfile->_Cal_log("lin",'0','1');
			$this->logfile->_Uplog("login",$logtxt);
			?>
			<script>
   			 window.location.href="index.php";
    		</script>
    		<?
		}
		else {
			$error['selection'] = 'wrong_psw';
			$this->load->view('myerror',$error);
		}
	}
// --------------------- log out -------------------------
	public function log_out(){
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	public function hello(){
		
		$q_select['select_day'] = $this->select_by->_selectByday();

		$this->load->view('view_index', $q_select);
		
		$log_q = $this->db->query("SELECT action FROM dblog_table WHERE log_code = '131111104723'")->result_array();
		print_r($log_q);

		echo "This is qry".$log_q[0]['action'];

		echo br(5);
		//$test = $this->logfile->_Uplog("ins");
		echo "Print r test".$test;
		//print_r($test);
		//echo "this echo ".$test['ipadr'];

		//echo cal_log("lin");

	}

	public function ins_permission(){
		$error['selection'] = 'notlogin';
		$this->load->view('myerror',$error);
	}






}
