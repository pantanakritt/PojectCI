<?
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Log_in extends CI_Model{

	function __construct(){
		parent::__construct();


	}

	
	function _chkLogin($user,$password){
		$fetchlogin = $this->db->query("SELECT * FROM permission_table WHERE UserName = '$user' && Password = '$password'")->result_array();
		//$sesid = $this->session->all_userdata();
		if(count($fetchlogin) >= 1){
			if($fetchlogin['0']['StatusID']==2){

				$this->session->set_flashdata('nact',FALSE);
					return FALSE;
			}

			else {
			
			$set_usr = array(
			//'log_code' => date("ymdhis")									,
			//'sesid'=> $sesid												,
			'session_logedin' => TRUE										,
			'tmpcsvname' => $fetchlogin[0]['CSVname']						,
			'username' => $fetchlogin[0]['UserName']						,
			'password' => $fetchlogin[0]['Password']						,
			'SuperUser' => $fetchlogin[0]['SuperUser']						,
			'Insert' => $fetchlogin[0]['Pinsert']							,
			'Update' => $fetchlogin[0]['Pupdate']							,
			'Delete' => $fetchlogin[0]['Pdelete']							,
			'StatusID' => $fetchlogin[0]['StatusID']						,
			'log_code' => date("ymdhis")
			);

			


			/*
			print_r($fetchlogin);
			echo "<br><br>";
			echo $fetchlogin[0]['Password'];
			
			//update_log('',get_client_ip(),$_SESSION['username'],"login");
			*/
			if($fetchlogin[0]['StatusID']!=FALSE){
				$this->session->set_userdata($set_usr);

				return TRUE;
			}
			else 
				{
					$this->session->set_flashdata('nact',TRUE);
					return FALSE;

				}				
			
				return TRUE;
			}
		}
			else return FALSE;
		

	}
	
}


?>