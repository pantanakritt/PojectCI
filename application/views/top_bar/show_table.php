<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
				แสดงข้อมูลตารางเรียนตารางสอน
			<b class="caret"></b>
			</a>
  				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    				<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามวัน</a>
    				<ul class="dropdown-menu">
    					<?php
             
              $this->load->view('top_bar/show_by/show_day',$day);

              ?>
    				</ul>	
    				</li>
    				<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามห้อง</a>
    				<ul class="dropdown-menu">
    					<?php

              $this->load->view('top_bar/show_by/show_room',$room);

              ?>
    					</ul>
    				</li>
    			<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามกลุ่มเรียน</a>
    				<ul class="dropdown-menu scroll">
    					<?php
              $this->load->view('top_bar/show_by/show_group',$group);
              ?>
    					</ul>
    			</li>
    			<li class="dropdown-submenu"><a tabindex="-1" href="#">แสดงโดยเรียงตามผู้สอน</a>
    				<ul class="dropdown-menu">
    					<?php
              $this->load->view('top_bar/show_by/show_teacher',$teacher);
              ?>
    					</ul>
    			</li>

  				</ul>
			</a>
	 </li>