<? if($this->session->userdata('session_logedin')){ 

  ?>
    
    <ul class="nav pull-right">
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
    ส่วนจัดการระบบ
      <b class="caret"></b>
      </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li class="dropdown-submenu"><a tabindex="-1" href="#">จัดการข้อมูลหลัก</a>
            <ul class="dropdown-menu">
                    <? if($this->session->userdata('SuperUser')||$this->session->userdata('Insert')){ ?>
                        <li><a tabindex="-1"  href="#" class="list_views">เรียกดูข้อมูลตารางสอนทั้งหมด(list view)</a></li> 
                        <li><a tabindex="-1" href="#" class="add_teach">เพิ่มข้อมูลตารางสอน</a></li>

                        <? } ?>
                    <? if($this->session->userdata('SuperUser')|| $this->session->userdata('Insert')) { ?> 
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">การจัดการไฟล์(csv)</a>
                          <ul class="dropdown-menu">
                            <li><a tabindex="-1" class="csv_link" href="#">Import ข้อมูลจากไฟล์(csv)</a></li>
                            <li><a tabindex="-1" class="sss" href="#">ส่วนจัดการไฟล์ import</a></li>
                            <li><a tabindex="-1" class="csv_clear" href="#">ยกเลิกการนำเข้า(csv)</a>
                            <? if($_SESSION['SuperUser']) {?><li><a tabindex="-1" class="csv_clear_cache" href="#">ล้างข้อมูลใน temp cache</a> <?}?>
                          </ul>
                        </li>
                        <? } ?>
                    <? if($this->session->userdata('Update')||$this->session->userdata('SuperUser')) { ?> <li><a tabindex="-1"  href="#">แก้ไขข้อมูลตารางสอน</a></li> 
                        <? } ?>
                    <? if($this->session->userdata('Delete')||$this->session->userdata('SuperUser')) { ?> <li><a tabindex="-1"  href="#">ลบข้อมูลตารางสอน</a></li>
                        <? } ?>
                    </ul>
         </li>
         <? if ($this->session->userdata('SuperUser')) {?> <li class="dropdown-submenu">
              <a tabindex="-1" href="#">ส่วนจัดการสำหรับผู้ดูแลระบบ</a>
                <ul class="dropdown-menu">
                  <li><a tabindex='-1' class='add_user' href="#">เพิ่มผู้ใช้งาน</a></li>
                  <li><a tabindex='-1' class='search_ulink' href="#">ค้นหาผู้ใช้งาน</a></li>
                  <li ><a tabindex='-1' class='status_user' href="#">สถานะผู้ใช้งาน</a></li>
                  <li ><a tabindex='-1' class='user_baned' href="#">ผู้ใช้งานที่ถูกลบ</a></li>
                  <li ><a tabindex='-1' class='view_log' href="#">ข้อมูลการใช้งานระบบ</a></li>
                </ul>
           
           </li>
           <? } ?>
           <li>
              <a tabindex="-1" class = 'edit_profile' href="#">แก้ไขข้อมูลส่วนตัว<input type='hidden' class='statname' value='<?=$_SESSION['username']?>'></a>
           
           </li>
          
           <li>
              <a tabindex="-1" href="<?echo base_url();?>index.php/welcome/log_out"><i class="icon-off"></i>&nbsp;&nbsp;ออกจากระบบ</a>
           
           </li>
           </ul>
    </li>
    </ul>
    
    <p class="navbar-text pull-right">Loged in as : <?=$this->session->userdata('username')?>&nbsp;&nbsp;&nbsp;</p>
    <? 
    }
     
  else { echo "<p class='navbar-text pull-right'><a href='#Login' class='navbar-link' data-toggle='modal'>เข้าสู่ระบบ</a>&nbsp;&nbsp;&nbsp;</p>";
    } 
    
    ?>