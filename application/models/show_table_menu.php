<?
if(! defined('BASEPATH')) exit('No direct script access allowed');
class Show_table_menu extends CI_Model{
	
	
	function _callRoom(){
		$query = $this->db->query('SELECT DISTINCT(main_table.Room) FROM main_table')->result_array();
		return $query;
	}

	function _callDay(){
		$query = $this->db->query('SELECT DISTINCT(main_table.Day) FROM main_table')->result_array();
		return $query;
	}

	function _callGroup(){
		$query = $this->db->query('SELECT DISTINCT(main_table.MajorID),major_table.MajorName FROM main_table INNER JOIN major_table ON main_table.MajorID = major_table.MajorID ORDER BY major_table.MajorID ASC')->result_array();
		return $query;
	}

	function _callTeach(){
		$query = $this->db->query('SELECT DISTINCT(teaassgn_table.TeacherID),teacher_table.TeacherName,teacher_table.TeacherLastname FROM teaassgn_table INNER JOIN teacher_table ON teaassgn_table.TeacherID = teacher_table.TeacherID ORDER BY teacher_table.TeacherID ASC')->result_array();
		return $query;
	}

	
}


?>