<?php
class ai extends CI_Controller {
	public function index() {
		$this -> load -> view('log_in');
	}

	//loads admin page
	public function admin(){
		session_start();
        $this -> load -> model('db_model');

		$isUser = false;

		if(isset($_POST['user'])){
			$user = $_POST['user'];
            $password = hash('sha512', $_POST['password']);

        	$isUser = $this -> db_model -> isUser($user, $password);
        }
        else{
            if(isset($_SESSION['admin'])){
                $this -> load -> view('adminHome');
                return;
            }
            else{
                $data['err'] = 'Please Log In';
                $this -> load -> view('log_in', $data);
                return;
            }
        }

        if($isUser === false){
            $data['err'] = 'Invalid Login';
            $this -> load -> view('log_in', $data);
        }
        else{
            $admin = $this -> db_model -> admin($isUser[0] -> email);
        
            $_SESSION['email'] = $isUser[0] -> email;
            $_SESSION['username'] = $isUser[0] -> username;
            $_SESSION['password'] = $isUser[0]-> password;
            $_SESSION['first_name'] = $admin[0] -> first_name;
            $_SESSION['last_name'] = $admin[0] -> last_name;
            $_SESSION['admin'] = true;

			$this -> load -> view('adminHome');
		}
	}

	public function navTest(){
		$this -> load -> view('navTest');
	}

	public function addMCourse(){
		session_start();
		if(isset($_SESSION['admin'])){
			$this->load->view('addMCourse');
		}
		else{
			$data['err'] = 'Please Log In as Admin';
            $this -> load -> view('log_in', $data);
		}
	}

	public function addNMCourse(){
		session_start();
		if(isset($_SESSION['admin'])){
			$this->load->view('addNMCourse');
		}
		else{
			$data['err'] = 'Please Log In as Admin';
            $this -> load -> view('log_in', $data);
		}
	}

	public function addTransfer(){
		session_start();
		if(isset($_SESSION['admin'])){
			$this->load->view('addTransfer');
		}
		else{
			$data['err'] = 'Please Log In as Admin';
            $this -> load -> view('log_in', $data);
		}
	}

	public function addAdmin(){
		session_start();
		if(isset($_SESSION['admin'])){
			$this->load->view('addNewAdmin');
		}
		else{
			$data['err'] = 'Please Log In as Admin';
            $this -> load -> view('log_in', $data);
		}
	}

	public function logOut(){
		session_start();

        $this -> load -> helper('url');
        $_SESSION = array();

        session_destroy();
        redirect();
	}

	//add marist course
	public function addM(){
		$this -> load -> model('ai_model');
		$courseNumM = $_POST['courseNumM'];
		$courseNameM = $_POST['courseNameM'];
		$departmentM = $_POST['departmentM'];
		$mData = array(
					'course_id' => 0,
					'department' => $departmentM,
					'course_num' => $courseNumM,
					'course_name' => $courseNameM
				);
		$result = $this->ai_model->insert_course($mData, 'marist_courses');
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
		$result = $this->ai_model->insert_course($data, 'school_courses');
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
		$result = $this->ai_model->insert_transfer($data, 'transferrable_courses');
		echo $result;
	}
}
?>