<?php

/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/24/2015
 * Time: 2:38 PM
 */

class student_Profile extends CI_Controller{

    public function getSavedCourses(){
        session_start();
        $this->load->model("db_model");
       $result = $this->db_model->getSavedCourses($_SESSION['email']);
        // $result = $this->db_model->getSavedCourses('ryan@marist.edu');

        $savedCourses['saved_courses'] = $result;
    }

    public function getMajors(){
        $this->load->model('db_model');
        $result = $this->db_model->getMajors();
        $majors['major_name'] = $result;

    }
    public function getMajorCourses(){
        $this->load-> model("db_model");
        $result = $this->db_model->getMajorCourses($_POST['major']);
        $savedCourses['major_courses'] = $result;
    }

    public function getMatchingCourse(){
        $this->load-> model("db_model");
        $result = $this->db_model->getSavedCourses('1');
        $savedCourses['saved_courses'] = $result;
    }

    public function getMatchingSavedCourses(){
        $this->load-> model("db_model");
        $result = $this->db_model->getSavedCourses('1');
        $savedCourses['saved_courses'] = $result;
    }

    public function savedSearches(){
        $this->load->view("savedCourses");
    }

    public function getStudentInfo(){
        $this->load-> model("db_model");
        $result = $this->db_model->getStudentInfo('1');
        $studentProfile['student'] = $result;
    }

    public function addNewStudent(){
        $this -> load -> model('db_model');
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email= $_POST['email'];
        $password= $_POST['password'];

        $data = array(
            'first_name' => $fName,
            'last_name' => $lName,
            'student_email' => $email
        );

        $result = $this->db_model->addNewStudent($data);

        $currDate = date('Y-m-d H:i:s');
        $data2 = array(
            'user_email' => $email,
            'password' => $password,
            'date_added' => $currDate,
            'date_modified' => $currDate
        );
        $this -> load -> model('db_model');
        $result2 = $this->db_model->createUser($data2);
        echo $result2;
    }

//START: Juan
    public function register(){
        session_start();
        $this -> load -> model('db_model');
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = hash('sha512', $_POST['password']);

        if($this -> db_model -> checkStudent($email)){
            $data['err'] = 'Invalid Registration';
            $this->load->view('registerStudent', $data);
        }
        else{
            $username = explode("@", $email)[0];
            $inserted = $this -> db_model -> addNewStudent($first_name, $last_name, $email, $username, $password);

            if($inserted){
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['last_name'] = $last_name;
                $_SESSION['student'] = true;
                $this -> load -> view("studentHome");
            }
        }
    }

    public function studentHome(){
        session_start();
        $this -> load -> model('db_model');

        if(isset($_POST['user'])){
            $user = $_POST['user'];
            $password = hash('sha512', $_POST['password']);
        }
        else{
            if(isset($_SESSION['student'])){
                $this -> load -> view('studentHome');
                return;
            }
            else{
                $data['err'] = 'Please Log In';
                $this -> load -> view('log_in', $data);
                return;
            }
        }

        $isUser = $this -> db_model -> isUser($user, $password);

        if($isUser === false){
            $data['err'] = 'Invalid Login';
            $this -> load -> view('log_in', $data);
            return;
        }
        else{
            $student = $this -> db_model -> student($isUser[0] -> email);
        
            $_SESSION['email'] = $isUser[0] -> email;
            $_SESSION['username'] = $isUser[0] -> username;
            $_SESSION['password'] = $isUser[0]-> password;
            $_SESSION['first_name'] = $student[0] -> first_name;
            $_SESSION['last_name'] = $student[0] -> last_name;
            $_SESSION['student'] = true;

           $this -> load -> view('studentHome');
           return;
        }
    }

    public function editProfile(){
        session_start();
        // var_dump($_SESSION);
        if(isset($_SESSION['student'])){
            $data['first_name'] = $_SESSION['first_name'];
            $data['last_name'] = $_SESSION['last_name'];
            $data['email'] = $_SESSION['email'];
            $data['username'] = $_SESSION['username'];

            $this -> load -> view('editProfile', $data);
        }
        else{
            $data['err'] = 'Please Log In as Student';
            $this -> load -> view('log_in', $data);
        }
    }

    public function registerStudent(){
        $this->load->view('registerStudent');
    }

    public function majorCompletion(){
        session_start();

        if($_SESSION['student']){
            $this->load->view("majorCompletion");
        }
        else{
            $data['err'] = 'Please Log In as Student';
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

    public function updateStudent(){
        session_start();
        $this -> load -> model('db_model');
        $last_name = $_POST['studentLastName'];
        $first_name = $_POST['studentFirstName'];
        $email = $_POST['studentEmail'];
        $username = $_POST['studentUsername'];
        $oldPassword = hash('sha512', $_POST['studentOldPassword']);
        $newPassword = hash('sha512', $_POST['studentNewPassword']);


        if($email != $_SESSION['email'] && $this -> db_model -> checkStudent($email)){
            $data['err'] = 'Invalid email/password';
            $this -> load -> view('editProfile', $data);
            return;
        }

        if($oldPassword == $_SESSION['password']){
            $this -> db_model -> updateStudent($email, $_SESSION['email'], $newPassword, $username, $first_name, $last_name);
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $newPassword;
            $_SESSION['email'] = $email;

            $data['first_name'] = $_SESSION['first_name'];
            $data['last_name'] = $_SESSION['last_name'];
            $data['email'] = $_SESSION['email'];
            $data['username'] = $_SESSION['username'];

            $this -> load -> view('editProfile', $data);
            return;
        }

    }
//END: Juan
}
