<?
for ($x=0;$x<count($room);$x++){
	echo "<li><a tabindex='-1' href='#' class='search_from_room'>";
	echo "<input type='hidden' class='roomID' value='".$room[$x]['Room']."'>";
	echo $room[$x]['Room'];
	echo "</a></li>";

	}
?>