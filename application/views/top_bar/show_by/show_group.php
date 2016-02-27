<?
for ($x=0;$x<count($group);$x++){
	echo "<li><a tabindex='-1' href='#' class='search_from_group'>";
	echo $group[$x]['MajorName']."&nbsp;(".$group[$x]['MajorID'].")";
	echo "<input type='hidden' class='groupID' value='".$group[$x]['MajorID']."'>";
	echo "</a></li>";

	}
	
?>