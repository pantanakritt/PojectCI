<?
echo br(1);

//print_r($user_edit);
//echo "Hello world ";

if($hchk=="edit_profile") echo "<div style='font-size: 250%' align='center'>แก้ไขข้อมูลส่วนตัว</div>";
		else echo "<div style='font-size: 250%' align='center'>แก้ไขข้อมูลผู้ใช้งาน</div>";
		echo "<div class='mini-layout'>";
			echo "<div class='mini-layout-body'>";

				echo "<fieldset>";
				echo "<label>ชื่อผู้ใช้งาน</label>";
					echo "<div class='control-group addusername'>";
					echo "<div class='controls'>";
					echo "<input class='input-large add_userID' type='text' value ='".$user_edit[0]['UserName']."' disabled>";
					echo "<span class='help-inline' id='user_error'></span>";
					echo "</div>";
	  				echo "</div>";
				echo "<label>รหัสผ่านของผู้ใช้งาน</label>";
				
				echo "<div class='control-group'>";
				echo "<div class='controls'>";
				echo "<input class='input-large add_userPWD' type='password' value ='".$user_edit[0]['Password']."'>";
				echo "<label>ยืนยันรหัสผ่าน</label>";
    			echo "<input type='password' class='confirmPWD' id='confirmPWD' value='".$user_edit[0]['Password']."'>";
    			echo "<span class='help-inline' id='pwd_error'></span>";
  				echo "</div>";
  				echo "</div>";
				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				echo "<label>ชื่อ - สกุล</label>";
				echo "<input class='input-large add_userFSTN' type='text' value ='".$user_edit[0]['UserFirstname']."'> ";
				echo "<input class='input-large add_userLSTN' type='text' value ='".$user_edit[0]['UserLastname']."'>";
				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				echo "<label>ระบุเพศของผู้ใช้งาน</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='optionsRadios' id='optionradiosex1' value='male' ";
 					if($user_edit[0]['Gender']==1) echo "checked>";
 						else echo ">";
  				echo "Male";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='optionsRadios' id='optionradiosex2' value='female'";
  					if($user_edit[0]['Gender']==0) echo "checked>";
  						else echo ">";
  				echo "Female";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุ E-mail ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_email' type='email' value ='".$user_edit[0]['Email']."' required>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุเบอร์โทรศัพท์ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_phone' type='text' value ='".$user_edit[0]['Telephone']."' required>";
				echo "</fieldset>";

				echo "<br>";
			if($this->session->userdata('SuperUser')){
				echo "<fieldset>";
				echo "<label>สิทธิ์สำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='permiss1' id='optionradiopermiss1' value='user'";
 					if(($user_edit[0]['Pinsert']==1||$user_edit[0]['Pupdate']||$user_edit[0]['Pdelete'])==1) echo " checked>";
 						else echo ">";
  				echo "ผู้ใช้งานทั่วไป";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='permiss1' id='optionradiopermiss2' value='superuser'";
  					if($user_edit[0]['SuperUser']==1) echo " checked>";
  						else echo ">";
  				echo "ผู้ดูแลระบบ";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สถานะสำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='active1' id='optionradioactive1' value='activate'";
 					if($user_edit[0]['StatusID']==1) echo " checked>";
 						else echo ">";
  				echo "Activate";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='active1' id='optionradioactive2' value='disactivate'";
  					if($user_edit[0]['StatusID']==0) echo " checked>";
  						else echo ">";
  				echo "Disactivate";
				echo "</label>";
				echo "</fieldset>";
			}

			else {
				echo "<fieldset>";
				echo "<label>สิทธิ์สำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='permiss1' id='optionradiopermiss1' value='user'";
 					if(($user_edit[0]['Pinsert']==1||$user_edit[0]['Pupdate']||$user_edit[0]['Pdelete'])==1) echo " checked disabled >";
 						else echo " disabled >";
  				echo "ผู้ใช้งานทั่วไป";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='permiss1' id='optionradiopermiss2' value='superuser'";
  					if($user_edit[0]['SuperUser']==1) echo " checked disabled >";
  						else echo " disabled >";
  				echo "ผู้ดูแลระบบ";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สถานะสำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='active1' id='optionradioactive1' value='activate'";
 					if($user_edit[0]['StatusID']==1) echo " checked disabled >";
 						else echo " disabled >";
  				echo "Activate";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='active1' id='optionradioactive2' value='disactivate'";
  					if($user_edit[0]['StatusID']==0) echo " checked disabled >";
  						else echo " disabled >";
  				echo "Disactivate";
				echo "</label>";
				echo "</fieldset>";
			}

				echo "<br><br>";


				echo "<center><button class='btn btn-primary update_userbtn' type='button'>บันทึกข้อมูล</button></center>";
				
			echo "</div>";
		echo "</div>";
		
	
	
?>