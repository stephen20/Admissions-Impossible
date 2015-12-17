<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/6/2015
 * Time: 2:51 PM
 */

class course_comparison extends CI_Controller{

    function display(){
        $this->load->view('course_comparison');
    }

    function displayStudent(){
        $this -> load -> view('student_course_comparison');
    }

    function getCourses()
    {
        $this->load->model('db_model');

        $result = $this->db_model->getCourseNums($_POST['dept']);
        $courseNumData['course_num'] = $result;
    }

    function getMatchedCourse(){
            $this->load->model('db_model');
            $result = $this->db_model->getMatchedCourses($_POST['dept'], $_POST['courseNum']);
            //$matchedCourses['courses'] = $result;
    }

    function getDepartments(){
        $this->load->model('db_model');

        $result = $this->db_model->getDepartments();
        $departmentData['department'] = $result;

    }
}