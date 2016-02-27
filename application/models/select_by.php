<?
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Select_by extends CI_Model{

	
	function _selectByday(){
		$select = "SELECT DISTINCT main_table.AsgnRef ,main_table.CourseID,main_table.Room,major_table.MajorName,main_table.Day,main_table.StartTime,course_table.Theory,course_table.Practical,course_table.CourseName FROM main_table"; 
		$select .= " INNER JOIN course_table ON main_table.CourseID = course_table.CourseID";
		$select .= " INNER JOIN major_table ON main_table.MajorID = major_table.MajorID";
		$select .= " WHERE Day = 'MON' ORDER BY main_table.Room,main_table.StartTime";
		$query = $this->db->query($select)->result_array();
		return $query;
	}
	
}


?>