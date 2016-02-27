<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Odinary extends CI_Controller {
	function __construct(){
		parent::__construct();
		

		if(($this->session->userdata('SuperUser')=='1')||($this->session->userdata('Insert')=='1')||($this->session->userdata('Update')=='1')||($this->session->userdata('Delete')=='1')){
			$this->load->model('user','user_md');
			$this->load->model('log','logfile');
			//$this->load->helper('gadget');
			date_default_timezone_set("Asia/Bangkok");

		}
		else {
			//echo "hello ins permission";
			redirect('welcome/ins_permission', 'refresh');

		}

	}

	
//--------------------------------- user fill ---------------
	public function chk_userfill(){
		/*
		echo "Post ".$this->input->post('usrn');
		$u_srn = $this->input->post('usrn');
		//echo $usrn;
		$chk = $this->usr->_Userfill($u_srn);
		echo "Hello".$u_srn;*/
		$u_srn = $this->input->post('usrn');
		if ($this->user_md->_Userfill($u_srn)){
			?>
			<script>
			$(".addusername").removeClass("success");
			$(".addusername").addClass("error");
			</script>
			<?
			//echo count($chk);
			echo "ชื่อผู้ใช้งานถูกใช้งานแล้ว";
		}
		else {
			?>
			<script>
			$(".addusername").removeClass("error");
			$(".addusername").addClass("success");
			</script>
			<?
			$usrval = 0;
			echo "";
		}
	}

	public function edit_profile(){
			$db_getuser = $this->user_md->_Useredit($this->input->post('edit_id'));

			$send_it = array(
				'user_edit' => $db_getuser		,
				'hchk' 		=> "edit_profile"
			);
			//echo "Hello Controller";

			$this->load->view('edit_profile', $send_it );

		}
	public function update_profile(){
		
		$upsuccess = $this->user_md->_uPprofile($this->input->post('usr_data'));
		if($upsuccess) {
			
			$logtxt = $this->logfile->_Cal_log("upp",'0',$this->session->flashdata('user_up'));
			$this->logfile->_Uplog("upp",$logtxt);
			?>
			<script>
			alert('ปรับปรุงข้อมูลเรียบร้อยแล้ว')
			window.location.href = 'index.php'
			</script>
			<?
		}
		else {
			?>
			<script>
			alert('เกิดข้อผิดพลาด !! กรุณาตรวจสอบข้อมูลอีกครั้งหนึ่ง')
			window.location.href = 'index.php'
			</script>
			<?
		}
		
		

		

		 
	}
}
?>