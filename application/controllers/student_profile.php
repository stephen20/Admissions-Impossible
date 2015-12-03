<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/24/2015
 * Time: 2:38 PM
 */

class student_Profile extends CI_Controller{

    public function studentHome(){
        $this -> load -> view('studentHome');
    }

    function editProfile()
    {
        $this->load->view('editProfile');
    }

    function registerStudent(){
        $this->load->view('registerStudent');
    }

    function majorCompletion(){
        $this->load->view("majorCompletion");
    }

    function savedSearches(){
        $this->load->view("savedCourses");
    }


    function getStudentInfo(){
        $this->load-> model("db_model");
        $result = $this->db_model->getStudentInfo('1');
        $studentProfile['student'] = $result;
    }

    function addNewStudent(){
        $this->load->model("db_model");

        $result = $this->db_model->addNewStudent();
        $departmentData['department'] = $result;
//        $this->load->view("Welcome");
    }

//    function getCourses()
//    {
//        $this->load->model('db_model');
//
//        $result = $this->db_model->getCourseNums($_POST['dept']);
//        $courseNumData['course_num'] = $result;
//    }
}

?>