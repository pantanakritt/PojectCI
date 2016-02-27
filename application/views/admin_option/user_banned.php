
<?


/*
foreach ($userstat as $dbqry) {
	echo $dbqry['Gender'];
	echo br(2);
}

*/
echo "<br><br>";
		echo "<div style='font-size: 250%' align='center'>ผู้ใช้งานที่ถูกลบ</div><br>";
		echo "<div>";
		echo "<img src='tools/img/per_admin.png' width='16' height='16'> = สิทธิ์สำหรับผู้ดูแลระบบ<br>";
		echo "<img src='tools/img/per_insert.png' width='16' height='16'> = สิทธิ์สำหรับการเพิ่มข้อมูล<br>";
		echo "<img src='tools/img/per_update.png' width='16' height='16'> = สิทธิ์สำหรับการแก้ไขข้อมูล<br>";
		echo "<img src='tools/img/per_delete.png' width='16' height='16'> = สิทธิ์สำหรับการลบข้อมูล<br>";
		echo "<br>";

		echo "<table class='table table-bordered' >";

		echo "<tr bgcolor='#9C9C9C'>";
			
			echo "<th width='150'><center>ชื่อผู้ใช้</center></th>";
			echo "<th width='100'><center>สิทธ์การใช้งาน</center></th>";
			echo "<th><center>ชื่อ</center></th>";
			echo "<th><center>นามสกุล</center></th>";
			echo "<th><center>เพศ</center></th>";
			echo "<th width='110'><center>สถานะการใช้งาน</center></th>";
			echo "<th width='70'><center>แก้ไขผู้ใช้</center></th>";

		echo "</tr>";
		
			foreach ($userstat as $stat_query) {

				
					echo "<tr class='error' value>";

					

					echo "<td><center>".$stat_query['UserName']."</center></td>";

					echo "<td>";
						echo "<div align='center'>";
							if($stat_query['SuperUser']){
								echo "<img src='tools/img/per_admin.png' width='16' height='16'>";
							}
							else {
								if ($stat_query['Pinsert']){
									echo "<img src='tools/img/per_insert.png' width='16' height='16'>";
								}
								if ($stat_query['Pupdate']){
									echo "<img src='tools/img/per_update.png' width='16' height='16'>";
								}
								if ($stat_query['Pdelete']){
									echo "<img src='tools/img/per_delete.png' width='16' height='16'>";
								}
							}


						echo "</div>";
						
					echo "</td>";

					echo "<td><center>".$stat_query['UserFirstname']."</center></td>";
					echo "<td><center>".$stat_query['UserLastname']."</center></td>";

					echo "<td>";
						if($stat_query['Gender']){echo "<center>Male</center>";}
							else {echo "<center>Female</center>";}
					echo "</td>";

					echo "<td>";
					echo "<div align='center'>";
					echo "<a href='#' class='ch_statban'><img src='tools/img/activ.gif' height='80%' width='80%'>";
						echo "<input type='hidden' class='statname' value='".$stat_query['UserName']."'>";
						echo "<input type='hidden' class='statid' value='".$stat_query['StatusID']."'>";
					echo "</a>";
					
					echo "</div>"; 
					echo "</td>";

					echo "<td width='50'>";
					echo "<div align='center' class='btn-toolbar'>";
  							echo "<div class='btn-group'>";
    						echo "<a class='btn btn-mini edit_userbtn' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$stat_query['UserName']."'>";
    							
    							echo "<i class='icon-edit'></i>";
    						echo "</a>";
    						echo "<a class='btn btn-mini f_delusr' href='#'>";
    							echo "<input type='hidden' class='statname' value='".$stat_query['UserName']."'>";
    							
    							echo "<i class='icon-ban-circle'></i>";
    						echo "</a>";
  							echo "</div>";
						echo "</div>";
						echo "</td>";

					echo "</tr>";
				}
			
		echo "</table>";


		
?>