<?
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Log extends CI_Model{
	
	function __construct(){
		parent::__construct();

		date_default_timezone_set("Asia/Bangkok");

	}

	public function _Logpage(){
		//$log_query = mysql_query("SELECT * FROM dblog_table ORDER BY log_Date DESC");
		$all_log = $this->db->query("SELECT * FROM dblog_table ORDER BY log_Date DESC")->result_array();
	
		$countlog = count($all_log);

		if ($countlog%20!=0){
			$num_log_page = ceil($countlog/20);
		}
		else {
			$num_log_page = floor($countlog/20);
		}

		return $num_log_page;

	}

	public function _Loglimit($currnt_lim){
		$val_lim = (20*$currnt_lim)-20;
		$log_qry = $this->db->query("SELECT * FROM dblog_table ORDER BY log_Date DESC LIMIT $val_lim,20 ")->result_array();
		return $log_qry;
	}

	public function _Logpagenum($log_limi,$log_reciv){
		if($log_limi <= 1){
			$prev_p = 1;
			$log_limi = 1;
		}
		else {
			$prev_p = $log_limi-1;
			
		}

		if ($log_limi>=$log_reciv){
			$log_limi = $log_reciv;
			$next_p = $log_reciv;
		}
		else {
			$next_p = $log_limi+1;
		}

			if($log_limi<=1){
				$retp = "disabled";
			}
			else {
				$retp = "previouss";
			}
		
			if($log_limi >= $log_reciv){
				$retn = "disabled";
			}
			else {
				$retn = "nextt";
			}
		

		$sent = array(

		'nextp' => $next_p 		,
		'prevp' => $prev_p 		,
		'log_lim' => $log_limi 	,
		'classn' => $retn 		,
		'classp' => $retp 		

		);

		return $sent;


	}

	public function _Cal_log($action,$dts,$usrr){
	//echo $usrr;

	if($action == "lin"){

			$logtext = "login";
	}
	else if($action == "ins"){
		$logtext = "Add user=".$usrr." @ ".date("H:i:s")." <br>";
	}
	else if($action == "upp"){
		$logtext = "Update profile On user = ".$usrr." @ ".date("H:i:s")."<br>";
	}
	else if($action == "restore"){
		$logtext = "Take baned from user = ".$usrr." @ ".date("H:i:s")."<br>";
	}
	else if($action == "drop_user"){
		$logtext = "Drop user = ".$usrr." @ ".date("H:i:s")."<br>";
	}
	else if($action == "chusr"){
		$dt_spilt = explode(',', $dts);


//print_r($dt_spilt);
		$logtext = "Change stat on user = ".$dt_spilt['1']." to ";
		if($dt_spilt['0']=='0'){
			$logtext .= "Activate";
		}
		else{
			$logtext .= "Deactivate";
		}
		$logtext .= " @ ".date("H:i:s")."<br>";
	}


		return $logtext;
}

	public function _Uplog($action,$logdt){
/*
	if($action == "lin"){

			$logtext = "login";
		}
		else if($action == "ins"){
			$logtext = "Insert user to";
		}
*/
	$ipaddr = $this->input->ip_address();
	$usr = $this->session->userdata('username');
	$logc = $this->session->userdata('log_code');

	
	//echo $dtrecive;
	
	
	
	
		if($action=="login"){
			//mysql_query("UPDATE permission_table SET Lastlog = '".date('d m y h i')." $ip' WHERE UserName = '$user'");
			$this->db->query("UPDATE permission_table SET Lastlog = '".date('d m y h i')." $ipaddr' WHERE UserName = '$usr'");
		}
		else {
			//$log_query = mysql_query("SELECT action FROM dblog_table WHERE log_code = '".$_SESSION['log_code']."'");
			$qry_log = $this->db->query("SELECT action FROM dblog_table WHERE log_code = '$logc'")->result_array();
			if(count($qry_log)==1){
				//$logtxt = cal_log($action,$dtrecive,$usr);
				//$log_fetch = mysql_fetch_array($log_query);

				$qry_log['0']['action'] .= $logdt;
				//return $qry_log[0]['action'];
				$this->db->query("UPDATE dblog_table SET action='".$qry_log['0']['action']."' WHERE log_code = '".$logc."'");
			}
			else {
				//$logtxt = cal_log($action,$dtrecive,$usr);
				$this->db->query("INSERT INTO dblog_table (user,action,ip,log_code) VALUES ('$usr','$logdt','$ipaddr','".$logc."')");
			}

		}
		

	}

	

}

?>