<script type="text/javascript" src="tools/js/validator.js"></script>
<?
echo "<br><br>";
		
		echo "<div class='mini-layout'>";
			echo "<div style='font-size: 250%' align='center'>เพิ่มข้อมูลผู้ใช้งาน</div>";
			echo "<div class='mini-layout-body'>";

				echo "<fieldset>";
				echo "<label>ชื่อผู้ใช้งาน</label>";
					echo "<div class='control-group addusername'>";
					echo "<div class='controls'>";
					echo "<input class='input-large add_userID' type='text' placeholder='พิมพ์ Ussername ที่ต้องการ'>";
					echo "<span class='help-inline' id='user_error'></span>";
					echo "</div>";
	  				echo "</div>";
				echo "<label>รหัสผ่านของผู้ใช้งาน</label>";
				
				echo "<div class='control-group'>";
				echo "<div class='controls'>";
				echo "<input class='input-large add_userPWD' type='password' placeholder='พิมพ์ Password ที่ต้องการ'>";
				echo "<label>ยืนยันรหัสผ่าน</label>";
    			echo "<input type='password' class='confirmPWD' id='confirmPWD' placeholder='ยืนยันรหัสผ่าน'>";
    			echo "<span class='help-inline' id='pwd_error'></span>";
  				echo "</div>";
  				echo "</div>";
				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				/*
				echo "<div class='form-group'>";
    			echo "<label for='inputName' class='control-label'>ชื่อ - สกุล</label>";
    			echo "<input type='text' class='form-control' id='inputName' placeholder='Cina Saffary' required>";
  				echo "</div>";
  				echo "<div class='form-group has-feedback'>";
				*/
				echo "<label>ชื่อ - สกุล</label>";
				echo "<input class='input-large add_userFSTN' type='text' placeholder='พิมพ์ชื่อของผู้ใช้งาน'> ";
				echo "<input class='input-large add_userLSTN' type='text' placeholder='พิมพ์นามสกุลของผู้ใช้งาน'>";

				echo "</fieldset>";

				echo "<br>";


				echo "<fieldset>";
				echo "<label>ระบุเพศของผู้ใช้งาน</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='optionsRadios' id='optionradiosex1' value='male' checked>";
  				echo "Male";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='optionsRadios' id='optionradiosex2' value='female'>";
  				echo "Female";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุ E-mail ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_email' type='email' placeholder='foo@bar.com' required>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>ระบุเบอร์โทรศัพท์ของผู้ใช้งาน</label>";
				echo "<input class='span3 adduser_phone' type='text' placeholder='081-234-5678' required>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สิทธิ์สำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='permiss1' id='optionradiopermiss1' value='user' checked>";
  				echo "ผู้ใช้งานทั่วไป";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='permiss1' id='optionradiopermiss2' value='superuser'>";
  				echo "ผู้ดูแลระบบ";
				echo "</label>";
				echo "</fieldset>";

				echo "<br>";

				echo "<fieldset>";
				echo "<label>สถานะสำหรับการใช้งานระบบ</label>";
				echo "<label class='radio'>";
 				echo "<input type='radio' name='active1' id='optionradioactive1' value='activate' checked>";
  				echo "Activate";
				echo "</label>";
				echo "<label class='radio'>";
  				echo "<input type='radio' name='active1' id='optionradioactive2' value='disactivate'>";
  				echo "Disactivate";
				echo "</label>";
				echo "</fieldset>";

				echo "<br><br>";


				echo "<center><button class='btn btn-primary add_userbtn' type='button'>บันทึกข้อมูล</button></center>";
				
			echo "</div>";
		echo "</div>";
?>