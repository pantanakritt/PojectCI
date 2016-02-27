<?
$count_period = count($select_day);

echo "<br><br><div align='center'> ตารางการใช้ห้องเรียนประจำ วัน จันทร์</div><br><br>";


echo "<table class='table table-bordered'  >"; //เปิด Table
echo "<tr class='success'>";    //Tr บรรทัดแรก

for ($xi=0;$xi<=14;$xi++){    
	//for สำหรับ บอก คาบเรียน
	if ($xi==0) echo "<td width='100'><center>ห้อง / คาบ</center></td>";
	else echo "<td><center>".$xi."</center></td>";
}
echo "</tr>";   //ปิด Tr บรรทัดแรก
$trcount = 1;

for ($i=0;$i<$count_period;$i++){  //for เพื่อกำหนด แถว

		if ($i<($count_period-1))
			
	if (($trcount%2)!=0) echo "<tr class='info'>";	
	else echo "<tr class='success'>"; 
	$trcount ++;
	$stack = 0;
	for ($x=0;$x<=14;$x++){ //for เพื่อนกำหนด Col
		if ($x==0) { 
			echo "<td><center>".$select_day[$i][Room]."</center></td>";  //เช็คเงื่อน ไข หาก x เป็น 0 ให้ echo ห้องเรียน
			$room_chk = $select_day[$i][Room];
		}
		else if ($select_day[$i][StartTime]==$x&&$room_chk==$select_day[$i][Room]){
			
			$sql_class_room = "SELECT COUNT(DISTINCT main_table.AsgnRef,main_table.Room) FROM main_table ";
			$sql_class_room .= "WHERE main_table.Room = '$fetch[Room]' ORDER BY main_table.Room,main_table.StartTime";

			$query3 = $this->db->query($sql_class_room)->result_array();    //ตรวจสอบห้องเรียนว่า มีห้องเดียวกัน ใช้วันเดียวกันแต่คนละคาบหรือ ไม่
			//$fetch3 = mysql_fetch_array($query3);
			
			if ($query3[0]>1){
				
				
				echo "<td align='center' id='tcolor' colspan='".calperiod($fetch[Theory],$fetch[Practical])."'>";
				echo $fetch[CourseName]."<br>";
				echo show_teacher($fetch[AsgnRef])."<br>";
				echo count_sect($fetch[AsgnRef]);
				echo "</td>";
				
				
				$x += calperiod($fetch[Theory],$fetch[Practical])-1;
				
				$stack +=1;
				if ($stack<$query3[0]) {
						$fetch = mysql_fetch_array($query);
				}
				else 
					$i++;
				}
			else if ($query3[0]==1) {
				
				echo "<td align='center' id='tcolor' colspan='".calperiod($fetch[Theory],$fetch[Practical])."'>";
				echo $fetch[CourseName]."<br>";
				echo show_teacher($fetch[AsgnRef])."<br>";
				echo count_sect($fetch[AsgnRef])."</td>";
				
				$x += calperiod($fetch[Theory],$fetch[Practical])-1;
			}
		}
		else echo "<td width='50'></td>";	
	}
	echo "</tr>";

}
echo "</table>";

?>