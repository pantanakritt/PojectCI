<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		

		if($this->session->userdata('SuperUser')){

			$this->load->model('user','user_md');
			$this->load->model('log','logfile');
			//$this->load->helper('gadget');
			
		}
		else {
			
			redirect('welcome/ins_permission', 'refresh');
			

		}

	}
	
	
	//---------------------- Show User status -----------------
	public function stat_user(){
		/*
		echo br(20);
		echo "Hello !! can you hear me";
		*/

		
		$exprs = 1;
		$user_data['user_stat'] = $this->user_md->_uSer_status($exprs);

		$send_it = array(
			'userstat' => $user_data['user_stat']	,
			'expression_us' => $exprs

			);
		$this->load->view('user_status', $send_it );
		
	}

	//--------------------- Chage User status ------------------
	public function ch_statid(){
		/*echo br(10);
		echo "Hello !!";
		echo $this->input->post('userSTSid');
		echo $this->input->post('StatID');
		//echo $ssid.$ssdt;
*/
		
		$stid = $this->input->post('StatID');
		$stnid = $this->input->post('userSTSid');

		if ($this->user_md->_uSer_changestat( $stid , $stnid ))	{
				$dtsend = $stid.",".$stnid;
				$logtxt = $this->logfile->_Cal_log("chusr",$dtsend,'1');
				$this->logfile->_Uplog("1",$logtxt);

				//echo "this is callog 2 ".cal_log("chusr",$dtsend);
				$exprs = 1;
				$user_data['user_stat'] = $this->user_md->_uSer_status($exprs);

				$send_it = array(
				'userstat' => $user_data['user_stat']	,
				'expression_us' => $exprs

				);
			$this->load->view('user_status', $send_it );
		}
		else {
			$error['selection'] = 'userstat_error';
			$this->load->view('myerror',$error);
		}
	}

	public function searchuser(){
		if($this->input->post('type_view')=="search_ulink"){
		$this->load->view('searchuser');
		}
		else {
			$data_spilt = explode(',', $_POST['search_data']);
			//print_r($data_spilt);
			$userstat = $this->user_md->_Usearch($data_spilt);
			$view_val = $this->user_md->_uSer_status($userstat);

			//echo $view_val;
			
			$send_it = array(
				'userstat' => $view_val	
			);

			$this->load->view('user_status', $send_it );

	
			
		}
	}

	public function logview(){

		$logreciv = $this->logfile->_Logpage();
		$lim = $this->input->post('log_lim');
		$limmit = $this->logfile->_Logpagenum($lim,$logreciv);
		
		
		$log_qrylim = $this->logfile->_Loglimit($lim);

		$send_it = array(
				'log_recieve' => $logreciv 		,
				'log_file' => $log_qrylim		,
				'pagenum' => $this->input->post('log_lim'),
				'limmit' => $limmit

			);
		$this->load->view('/log/log_view', $send_it);
		


	}

	public function adduser(){

		$this->load->view('admin_option/add_user');

	}

	public function adduser_btn(){
		$var1 = $this->input->post('data_user');
		if($this->user_md->_Adduserbtn($var1)){
			$logtxt = $this->logfile->_Cal_log("ins",'1',$this->session->flashdata('tmpusr'));
				$this->logfile->_Uplog("1",$logtxt);
			?>
			<script>
			alert('เพิ่มผู้ใช้เรียบร้อยแล้ว')
			
			</script>
			<?
			$exprs = 1;
				$user_data['user_stat'] = $this->user_md->_uSer_status($exprs);

				$send_it = array(
				'userstat' => $user_data['user_stat']	,
				'expression_us' => $exprs

				);
			$this->load->view('user_status', $send_it );
		}
		else redirect('welcome/ins_permission', 'refresh');
		
	}

	public function del_user(){
		$usrtd = $this->input->post('usr_del');
		if($this->user_md->_Deluser($usrtd)){
			$exprs = 1;
				$user_data['user_stat'] = $this->user_md->_uSer_status($exprs);

				$send_it = array(
				'userstat' => $user_data['user_stat']	,
				'expression_us' => $exprs

				);
			$this->load->view('user_status', $send_it );

			$logtxt = $this->logfile->_Cal_log("drop_user",'1',$usrtd);
			$this->logfile->_Uplog("1",$logtxt);

		}
		else redirect('welcome/ins_permission', 'refresh');
	}

	public function userban(){
				$user_data['user_stat'] = $this->user_md->_uSer_status('2');

				$send_it = array(
				'userstat' => $user_data['user_stat']	,
				
				);

			$this->load->view('admin_option/user_banned', $send_it );

	}

	public function ch_statusban(){
		$this->user_md->ch_statban($this->input->post('user'));

		$logtxt = $this->logfile->_Cal_log("restore",'1',$this->input->post('user'));
		$this->logfile->_Uplog("1",$logtxt);

				$user_data['user_stat'] = $this->user_md->_uSer_status('2');

				$send_it = array(
				'userstat' => $user_data['user_stat']	,
				
				);

			$this->load->view('admin_option/user_banned', $send_it );

	}

	public function fdel_user(){
		if($this->user_md->f_deluser($this->input->post('user'))){
			echo br(5);
			echo "<div align='center'>Permanent delete user are comming soon</div>";
		}
	}


}



?>