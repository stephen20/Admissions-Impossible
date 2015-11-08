<?php
class ai extends CI_Controller {
	public function index() {
		$this -> load -> view('login_view');
	}
	public function admin(){
		$this -> load -> view('admin_view');
	}
	
}
?>