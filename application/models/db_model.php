<?php
/**
 * Created by IntelliJ IDEA.
 * User: thomas
 * Date: 11/6/2015
 * Time: 1:47 PM
 */

class db_model extends CI_Model{
    function getDepartments(){
        $query = $this->db -> distinct()
                            ->select('department')
                            ->from('school_courses')
                            ->where('school_id = 1');
        $return['rows'] = $query->get()->result();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }

    function getCourseNums($department){
        $sql = $this->db->select('course_num')
            ->from('school_courses')
            ->where('school_id = 1 AND department =' . "'".$department."'");
        //$query = $this->db->get();
        $return['rows'] = $sql->get()->result_array();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }

    function getMatchedCourses($department, $courseNum){
        $sqlstmt = $this->db->select('course_id')
                            ->from('school_courses')
                            ->where('school_id = 1 AND department= "' . $department . '" AND course_num=' . $courseNum);

        foreach ($sqlstmt->get()->result('object') as $course_id)
        {
            $id = ($course_id->course_id);
            $sql = $this->db->select('course_id, department, course_num, course_name')
                ->from('marist_courses, transferrable_courses')
                ->where('marist_courses.course_id = transferrable_courses.marist_course AND
                        transferrable_courses.school_course = ' . $id);

            if ($this->db->affected_rows()> 0)
            {
                $return = $sql->get()->result();
                $return = (json_encode($return));
                print_r($return);
                return $return;
            }else{
                return 0;
            }
        }
    }

//
//        foreach ($course as $course_id)
//        {
//            $id = $courseid->$course_id;
}