<?
//print_r($day);

for ($x=0;$x<count($day);$x++){
	echo "<li><a tabindex='-1' href='#' class='search_by_day'>";
	echo "<input type='hidden' class='DayID' value='".$day[$x]['Day']."'>";
	echo $day[$x]['Day'];
	echo "</a></li>";

	}
?>