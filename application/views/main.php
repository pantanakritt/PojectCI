<?
$this->load->view('header');
?>
<body>

<div id="wrap">

<div class="container-fluid">
	<div class="row-fluid">
    	<div class="span12" >
<?

$this->load->view('top_bar/login');
?>
				<div class="navbar navbar-fixed-top">
 <div class="navbar-inner">
    <a class="brand" href="./index.php">&nbsp;&nbsp;&nbsp;ระบบตารางเรียนตารางสอนออนไลน์</a>
    <ul class="nav">
    
                
      <li><a href="./index.php">หน้าหลัก</a></li>
      <?
        $this->load->view('top_bar/show_table');
      ?>
      <li>
        <a tabindex="-1" href="#">แสดงคำสั่งผู้สอน</a>
       </li>
      
    </ul>
    <?
      $this->load->view('top_bar/stat_login');
    ?>
    <p class="divider-vertical pull-right"></p>
    
    
  </div>
</div>

				</div>
			</div>
			
	</div>

  <div class="row-fluid">
    <div class="span1">
      <!-- LEFT SIDE -->
    </div>
    <?=br(1);
    ?>
 
    <div class="span10 updates">

    <?
    echo br(5);

    echo "<div align = 'center' > ";
        echo $this->session->userdata('tmpcsvname');
        echo br(1);
        echo $this->session->userdata('username');
        echo br(1);
        echo $this->session->userdata('password');
        echo br(1);
        echo $this->session->userdata('SuperUser');
        echo br(1);
        echo $this->session->userdata('Insert');
        echo br(1);
        echo $this->session->userdata('Update');
        echo br(1);
        echo $this->session->userdata('Delete');
        echo br(1);
        echo $this->session->userdata('StatusID');
        echo br(1);
        echo $this->session->userdata('log_code');
        //$sesid = $this->session->all_userdata();
        //$this->load->view('select_by_day');
    echo "</div>";
    /*
      if ($_GET['imprt_func']=="set_imprt") {
        echo "<div align='center'>".imprt_form()."</div>";
      }
      else {
        $this->load->view('select_by_day');
      
      }
        */

       //$this->load->view('select_by_day');





        //echo "<div align='center'>".c_byday('MON')."</div>";
    
    
//echo "<br><br><br><br><br>";
//echo "<div align='center'>";select_teacher('0101002'); echo "</div>";
//echo "<br><br><br><br><br>";
//echo "<div align='center'>";select_room('832'); echo "</div>";
//echo "<br><br><br><br><br>";
//echo "<div align='center'>";select_group('560429701'); echo "</div>";
echo "</div>";
$this->load->view('footer');
?>
