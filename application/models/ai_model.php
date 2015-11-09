<?php
class ai_model extends CI_Model
{

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		// $this->load->database();
	}

	//for inserting marist and non marist courses
	public function insert_course($data, $table)
	{
		$this->db->insert($table, $data);
		if ($this->db->affected_rows() > 0) {
			return 1;
		} else {
			return 0;
		}

	}

	//adding school
	public function insert_school($data)
	{
		$this->db->insert('schools', $data);
	}

	//insert transfer link
	public function insert_transfer($data)
	{
		$this->db->insert('transferrable_courses', $data);
	}

	//adding schools when someone adds a course from a school we don't have in DB
	public function getschool($school)
	{
		$sql = "SELECT school_name FROM schools WHERE school_name = '$school';";
		$results = $this->db->query($sql, array($school));
		if ($results == $school)
			return false;
		else {
			return true;
		}

	}

	//get school id for adding non marist course
	public function getschoolid($school)
	{
		$sql = "SELECT school_id FROM schools WHERE school_name = '$school';";
		$results = $this->db->query($sql, array($school));
		return $results;
	}

	//get marist course id
	public function getmaristcourseid($course)
	{
		$sql = "SELECT course_id FROM marist_courses WHERE course_num = '$course';";
		$results = $this->db->query($sql, array($course));
		return $results;
	}

	//get other course id
	public function getothercourseid($course)
	{
		$sql = "SELECT course_id FROM school_courses WHERE course_num = '$course';";
		$results = $this->db->query($sql, array($course));
		return $results;
	}

	//get state id for adding school
	public function getstateid($state)
	{
		$sql = "SELECT state_id FROM states WHERE state_name = '$state';";
		$results = $this->db->query($sql, array($state));
		return $results;
	}
}
	
	