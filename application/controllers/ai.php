<?php
class ai extends CI_Controller {
	public function index() {
		$this -> load -> view('login_view');
	}
	//loads admin page
	public function admin(){
		$this -> load -> view('admin_view');
	}
	//add marist course
	public function addM(){
		$this -> load -> model('ai_model');
		$courseNumM = $_POST['courseNumM'];
		$courseNameM = $_POST['courseNameM'];
		$departmentM = $_POST['departmentM'];
		$mData = array(
					'course_num' => $courseNumM,
					'course_name' => $courseNameM,
					'department' => $departmentM
				);
		$result = $this->ai_model->insert_course('marist_courses', $mData);
		echo $result;
	}
	//add non marist course
	public function addNM(){
		$this -> load -> model('ai_model');
		$schoolName = $_POST['schoolName'];
		$schoolState = $_POST['schoolState'];
		$courseNumNM = $_POST['courseNumNM'];
		$courseNameNM = $_POST['courseNameNM'];
		$departmentNM = $_POST['departmentNM'];
		$schoolid = $this->ai_model->getschoolid($schoolName);
		if($this->ai_model->getschool($schoolName)){
			//$dataS['schoolName'] = $schoolName;
			//$dataS['schoolState'] = $schoolState;
			$stateId = $this->ai_model->getstateid($schoolState);
			$dataS = array(
						'school_name' => $schoolName,
						'school_state' => $stateId
					); 
			$this->ai_model->insert_school($dataS); 
		}
		$data = array(
					'school_id' => $schoolid,
					'department' => $departmentNM,
					'course_num' => $courseNumNM,
					'course_name' => $courseNameNM
				);
		$result = $this->ai_model->insert_course('school_courses', $data);
		echo $result;
	}
	//adding transfer link
	public function addTLink(){
		$this -> load -> model('ai_model');
		$mCourseNum = $_POST['mCourseNum'];
		$nMCourseNum = $_POST['nMCourseNum'];
		$mCourseId = $this->ai_model->getmaristcourseid($mCourseNum);
		$nMCourseId = $this->ai_model->getothercourseid($nMCourseNum);
		$data = array(
					'school_course' => $nMCourseId,
					'marist_course' => $mCourseId
				);
		$result = $this->ai_model->insert_transfer('transferrable_courses', $data);
		echo $result;
	}
}
?>