<?
if(! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{


	public function _uSer_status($expression_us){
		if($expression_us == '1' || $expression_us == '0') {
			$expression_us = "WHERE StatusID != '2' AND StatusID != '3'"; 
		}

		else $expression_us = "WHERE StatusID = '2'";

		
		$db_user = $this->db->query("SELECT * FROM permission_table $expression_us ORDER BY StatusID,UserName ASC")->result_array();
		return $db_user;
	}

	public function _uSer_changestat($statid , $statname){

		if($statid == 1){
			$this->db->query("UPDATE permission_table SET StatusID = '0' WHERE UserName = '$statname'");
			return TRUE;
		}
		else if ($statid == 0) {
			$this->db->query("UPDATE permission_table SET StatusID = '1' WHERE UserName = '$statname'");
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function _Userfill($user){
		$chk_user = $this->db->query("SELECT * FROM permission_table WHERE UserName = '$user'")->result_array();
		if(count($chk_user)  >= 1)	return TRUE;
		else return FALSE;
	}

	public function _Usearch($data_spilt){
			
		$expres2find = "WHERE UserName LIKE '".$data_spilt[0]."%' AND UserFirstname LIKE '".$data_spilt[1]."%' AND UserLastname LIKE '";
		$expres2find .= $data_spilt[2]."%' AND Email LIKE '".$data_spilt[3]."%' AND Telephone LIKE '".$data_spilt[4]."%'";
		
		return $expres2find;
	}

	public function _Useredit($edit_uid){
		$userget = $this->db->query("SELECT * FROM permission_table WHERE UserName = '$edit_uid'")->result_array();
		return $userget;
	}

	public function _uPprofile($data_up){
		$data_spilt = explode(',', $data_up);
		$tel3 = $data_spilt[6];
		if($data_spilt[4]=="male"){
				$data_spilt[4] = 1;
			}
			else $data_spilt[4] = 0;

			if($data_spilt[7]=="superuser"){
				$insert = 0;
				$update = 0;
				$delete = 0;
				$data_spilt[7] = 1;
			}
			else {
				$insert = 1;
				$update = 1;
				$delete = 1;
				$data_spilt[7] = 0;
			}
			if($data_spilt[8]=="activate"){

				$data_spilt[8] = 1;
			}
			else $data_spilt[8] = 0;

			$up_query1 = "UPDATE permission_table SET Password = '".$data_spilt[1]."', UserFirstname = '".$data_spilt[2]."', UserLastname = '".$data_spilt[3]."', ";
			$up_query2 = "Gender = '".$data_spilt[4]."', Email = '".$data_spilt[5]."', Telephone = '".$tel3."'";
			if ($_SESSION['SuperUser']){
				$up_query3 = ", Pinsert = '".$insert."', Pupdate = '".$update."', Pdelete = '".$delete."', SuperUser = '".$data_spilt[7]."', StatusID = '".$data_spilt[8]."'";
			}
			$up_query4 = " WHERE UserName ='".$data_spilt[0]."'";
		//echo "<br>";
		//print_r($update_usr_data);
			$this->session->set_flashdata('user_up', $data_spilt[0]);
		$finup_query = $up_query1.$up_query2.$up_query3.$up_query4;
		if ($this->db->query($finup_query)) {
			
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function _Adduserbtn($usr_dt){
			$data = explode(',',$usr_dt);
			$tel3 = '';
			$tel = explode('-', $data['6']);
			foreach ($tel as $tel2){
				$tel3 .= $tel2;
			}
			if($data['4']=="male"){
				$data['4'] = 1;
			}
			else $data['4'] = 0;

			if($data['7']=="superuser"){
				$insert = 0;
				$update = 0;
				$delete = 0;
				$data['7'] = 1;
			}
			else {
				$insert = 1;
				$update = 1;
				$delete = 1;
				$data['7'] = 0;
			}
			if($data['8']=="activate"){

				$data['8'] = 1;
			}
			else $data['8'] = 0;
			//update_log("add user ".$data[0]." to database <br>",get_client_ip(),$_SESSION['username'],"add_user");
			//mysql_query("INSERT INTO permission_table VALUES ('','$data[0]','$data[1]','','$data[2]','$data[3]','$data[4]','$insert','$update','$delete','$data[7]','$data[5]','$tel3','$data[8]')");
				//user_status();

			$this->db->query("INSERT INTO permission_table VALUES ('','$data[0]','$data[1]','','$data[2]','$data[3]','$data[4]','$insert','$update','$delete','$data[7]','$data[5]','$tel3','$data[8]','')");
			//$dd = "this is data 0 = ".$data['0']."/this is data 1 =".$data['1']."/this is data 2 =";
			//$dd .= $data['2']."/this is data 3 =".$data['3']."/this is data 4 =".$data['4'];
			//$dd .= "/this is insert =".$insert."/this is Update =".$update."/this is delete ".$delete."/this is data 7 =".$data['7']."/this is data 5 =".$data['5']."/this is data tel =".$tel3."/this is data 8 =".$data['8'];
			//$dd = "INSERT INTO permission_table VALUES ('','".$data[0]."','".$data[1]."','','".$data[2]."','".$data[3]."','".$data[4]."','".$insert."','".$update."','".$delete."','".$data[7]."','".$data[5]."','".$tel3."','".$data[8]."')";
			$this->session->set_flashdata('tmpusr',$data['0']);
			return TRUE;
	}

	public function _Deluser($usr){
		$this->db->query("UPDATE permission_table SET StatusID='2' WHERE UserName = '".$usr."'");
		return TRUE;
	}

	public function ch_statban($usr){
		$this->db->query("UPDATE permission_table SET StatusID = '0' WHERE UserNAME = '$usr'");
		return TRUE;
	}

	public function f_deluser($usr){

		//$this->db->query("DELETE FROM permission_table WHERE UserName = '$usr'");

		return TRUE;
	}


}
?>