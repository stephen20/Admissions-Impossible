<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/6/2015
 * Time: 2:51 PM
 */

class course_comparison extends CI_Controller{

    function display(){
        $this -> load -> helper('url');
        $this->load->view('course_comparison');
    }

    function displayStudent(){
        $this->load->view('student_course_comparison');
    }

    function getCourses()
    {
        $this->load->model('db_model');

        $result = $this->db_model->getCourseNums($_POST['dept']);
        $courseNumData['course_num'] = $result;
    }

    function getMatchedCourse(){
        $this->load->model('db_model');
        $dept = $_POST['dept'];
        $courseNum = $_POST['courseNum'];
        $result = $this->db_model->getMatchedCourses($dept,$courseNum);
    }

    function getMatchingSavedCourses(){
        $result = [];
        $this->load->model('db_model');
        $courses = $_POST['savedCourses'];
        for($i =0; $i<count($courses); $i++){
            $dept = $courses[$i]['dept'];
            $courseNum = $courses[$i]['courseNum'];
            $result[$i] = $this->db_model->getMatchedSavedCourses($dept,$courseNum);
        }
       print_r(json_encode($result));
    }

    function getDepartments(){
        $this->load->model('db_model');

        $result = $this->db_model->getDepartments();
        $departmentData['department'] = $result;

    }
}