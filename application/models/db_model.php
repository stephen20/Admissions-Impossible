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
                            ->where('school_id = 1')
                            ->order_by('department asc');
        $return['rows'] = $query->get()->result();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }

    function getCourseNums($department){
        $sql = $this->db->select('course_num')->distinct()
            ->from('school_courses')
            ->where('school_id = 1 AND department =' . "'".$department."'")
            ->order_by("course_num ASC");
        //$query = $this->db->get();
        $return['rows'] = $sql->get()->result_array();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }

    function getMatchedCourses($department, $courseNum){
        $sqlstmt = $this->db->select('cId')
                            ->from('school_courses')
                            ->where('school_id = 1 AND department= "' . $department . '" AND course_num=' . "'" . $courseNum. "'");

        foreach ($sqlstmt->get()->result('object') as $course_id)
        {
            $id = ($course_id->cId);
            $sql = $this->db->select('m.mId, m.department, m.course_num, m.course_name')
                ->from('marist_courses m, transferrable_courses tc')
                ->where('m.mId = tc.marist_course AND
                        tc.school_course = ' . $id);

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

    function getMatchedSavedCourses($department, $courseNum){
        $sqlstmt = $this->db->select('cId')
            ->from('school_courses')
            ->where('school_id = 1 AND department= "' . $department . '" AND course_num=' . $courseNum);

        foreach ($sqlstmt->get()->result('object') as $course_id)
        {
            $id = ($course_id->cId);
            $sql = $this->db->select('m.mId, m.department, m.course_num, m.course_name')
                ->from('marist_courses m, transferrable_courses tc')
                ->where('m.mId = tc.marist_course AND
                        tc.school_course = ' . $id);

            if ($this->db->affected_rows()> 0)
            {
                $return = $sql->get()->result();
                return $return;
            }else{
                return 0;
            }
        }
    }

    function getStudentInfo($student_id){
        $query = $this->db -> distinct()
            ->select('sId, email, first_name, last_name')
            ->from('students')
            ->where('sId = 1');
        $return['rows'] = $query->get()->result();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }


    function createUser($data){
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function getStudentEmail($student_id){
        $stmt= "Select email from students where sId =".$student_id;
        $query1 = $this->db->query($stmt);
        if ($query1->num_rows() > 0) {
            $email= $query1->row();
        }
        $return = (json_encode($email));
        print_r($return);
        return $return;
    }

    function getSavedCourses($email){
            $query = $this->db
                ->select('school_courses.department, school_courses.course_num, school_courses.course_name')
                ->from('saved_courses')
                ->join('school_courses','school_courses.cId = saved_courses.course_id','right')
                ->where("email ="."'".$email."'");
        $return['rows'] = $query->get()->result_array();
        $return = (json_encode($return));
        print_r($return);
        return $return;
        }

    function getMajors(){
        $sql = $this->db->select('major_name')
            ->from('majors')
            ->order_by("major_name ASC");
        //$query = $this->db->get();
        $return['rows'] = $sql->get()->result_array();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }

    function getMajorCourses($major){
            $sql = $this->db->select('marc.department, marc.course_num, marc.course_name')
                ->from('marist_courses marc, major_courses mc, majors m ')
                ->where('m.major_name = '."'" .$major."'"." AND mc.major_id=m.major_id AND mc.course_id=marc.mId");

                $return = $sql->get()->result();
                $return = (json_encode($return));
                print_r($return);
                return $return;
    }

    //START : Juan

    function checkStudent($email){
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $result = $this -> db -> query($sql);
        if($result -> num_rows() == 1){
            return true;
        }
        else{
            return false;
        }
    }

    function addNewStudent($first_name, $last_name, $email, $username, $hashedPassword){
        $userSql = "INSERT INTO users VALUES('$email', '$username', '$hashedPassword');";
        $studentSql = "INSERT INTO students(email, first_name, last_name) VALUES('$email', '$first_name', '$last_name');";

        $userResult = $this -> db -> query($userSql);
        $studentResult = $this -> db -> query($studentSql);
        return true;
    }

    function isUser($user, $password){
        $sql = "SELECT * FROM users WHERE ";
        if(strpos($user, '@') === false){
            $sql .= "username = '$user' AND password = '$password'";
        }
        else{
            $sql .= "email = '$user' AND password = '$password'";
        }

        $result = $this -> db -> query($sql);
        if($result -> num_rows() == 1){
            return $result -> result();
        }
        else{
            return false;
        }
    }

    public function student($email){
        $sql = "SELECT * FROM students WHERE email = '$email';";

        $result = $this -> db -> query($sql);
        return $result -> result();
    }

    public function admin($email){
        $sql = "SELECT * FROM admin WHERE email = '$email';";

        $result = $this -> db -> query($sql);
        return $result -> result();
    }

    public function updateStudent($newEmail, $oldEmail, $password, $username, $first_name, $last_name){
        $deleteStudent = "DELETE FROM students WHERE email = '$oldEmail';";
        $userSql = "UPDATE users SET email = '$newEmail', username = '$username', password = '$password' WHERE email = '$oldEmail';";
        $studentSql = "INSERT INTO students(email, first_name, last_name) VALUES('$newEmail','$first_name', '$last_name');";

        $this -> db -> query($deleteStudent);
        $userResult = $this -> db -> query($userSql);
        $studentResult = $this -> db -> query($studentSql);
    }

    function getStates(){
        $sql = $this->db->select('state_name')
            ->from('states')
            ->order_by("state_name ASC");
        //$query = $this->db->get();
        $return['rows'] = $sql->get()->result_array();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }

    function getSchools(){
        $sql = $this->db->select('school_name')
            ->from('schools')
            ->order_by("school_name ASC");
        //$query = $this->db->get();
        $return['rows'] = $sql->get()->result_array();
        $return = (json_encode($return));
        print_r($return);
        return $return;
    }
    //END : Juan
}
?>