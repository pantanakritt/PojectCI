<?

		echo "<div class='pagination pagination-centered'>";
	  	echo "<ul>";
	    
	    	for ($x=1;$x<=$log_recieve;$x++){
	    		echo "<li><a href='#' class='page_dvide";
	    		if($x==$log_recieve) echo " max_page";
	    		echo "' id='page".$x."'>".$x."</a></li>";
			}
	    
	    
	  	echo "</ul>";
		echo "</div>";

		echo "<ul class='pager'>";
  		echo "<li class='previous ".$limmit['classp']."'>";
    	echo "<a href='#' class='prev_page'><input type='hidden' class='prev_val' value='".$limmit['prevp']."'>&larr; Previous</a>";
  		echo "</li>";
  		echo "<li><a href='#' class='this_page'>Page ".$pagenum."</a></li>";
  		echo "<li class='next ".$limmit['classn']."'>";
    	echo "<a href='#' class='next_page'><input type='hidden' class='next_val' value='".$limmit['nextp']."'><input type='hidden' class='max_page' value='".$log_recieve."'>Next &rarr;</a>";
  		echo "</li>";
		echo "</ul>";

		echo "<div class='show_log_page'>";
		

		echo "<table class='table table-bordered'>";
		echo "<tr><th width='15%'>Time</th><th width='15%'>User</th><th width='55%'>Action</th><th width='15%'>IP Address</th></tr>";
		$num_lim = count($log_file);
		for($y=0;$y<$num_lim;$y++){
			
			echo "<tr>";
				echo "<td>".$log_file[$y]['log_Date']."</td>";
				echo "<td>".$log_file[$y]['User']."</td>";
				echo "<td>";
				echo $log_file[$y]['Action'];
				echo "</td>";
				echo "<td>".$log_file[$y]['ip']."</td>";
			echo "</tr>";

		}
		echo "</table>";

		echo "</div>";




?>