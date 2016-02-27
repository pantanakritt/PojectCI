<?

for ($x=0;$x<count($teacher);$x++){
echo "<li><a tabindex='-1' href='#' class='search_from_teacher'>";
	echo $teacher[$x]['TeacherName']."&nbsp;&nbsp;".$teacher[$x]['TeacherLastname'];
	echo "<input type='hidden' class='teacherID' value='".$teacher[$x]['TeacherID']."'>";
	echo "</a></li>";
	}
?>