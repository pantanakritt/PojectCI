<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

.text {
	background-color: #fff;
	margin: 40px;
	font: 16px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 20px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
<?
if ($selection == 'userstat_error'){
	echo br(6);
	echo "<div align = 'left'><h1>Error 404 not found !!</h1></div>";
	echo br(1);
	echo "<p class='text'> Error User data !! Cannot find this user data , Please contact your administrator to solve this problem.";
	echo br(3)."</p>";
	echo "<a href='".base_url()."'>Return to Home</a>";
}

else if ($selection == 'wrong_psw'){
	if ($this->session->flashdata('nact')){
		echo "<div class='alert'>";
  		echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
  		echo "<strong>เกิดข้อผิดพลาด!</strong> <p>ชื่อผู้ใช้งานของท่านยังไม่ได้ทำการยืนยันตัว หรืออาจอยู่ระหว่างถูกระงับการใช้งานกรุณาติดต่อผู็ดูแลระบบ</p>";
		echo "</div>";
		
	}
	else if ($this->session->flashdata('nact')==FALSE){
		echo "<div class='alert'>";
  		echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
  		echo "<strong>เกิดข้อผิดพลาด!</strong> <p>ชื่อผู้ใช้ของท่าน<u>ถูกถอนการใช้งาน</u> กรุณาติดต่อผู้ดูแลระบบ !!</p>";
		echo "</div>";
	}
	else {
		echo "<div class='alert'>";
  		echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
  		echo "<strong>เกิดข้อผิดพลาด!</strong> <p>มีข้อผิดพลาดในชื่อผู้ใช้งาน หรือ รหัสผ่านของท่าน กรุณาตรวจสอบอีกครั้ง</p>";
		echo "</div>";
	}
}
else if($selection == 'notlogin'){
	echo br(6);
	echo "<div align='center'>";
	echo "<div align = 'center'><h1>Error 404 not found !!</h1></div>";
	echo br(1);
	echo "<p class='text'> insufficient permission to enter this section if you used to use this option please contact administrator.<br>";
	echo br(3)."If you found this link on yourself , Don't try to do this again !!</p>";
	echo "<a href='".base_url()."'>Return to Home</a>";
	echo "</div>";
}


?>