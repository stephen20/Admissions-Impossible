<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ai extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
	}

	public function login(){
		$this->load->view('log_in');
	}

	public function viewCourseComparison(){
		$this->load->view('course_comparison');
	}

	/*public function getDepartments(){
		$this->load->model('db_model');
		$data['departments'] = $this->db_model->getDepartments();
		$this->load->view('course_comparison', $data);
	}*/
}
