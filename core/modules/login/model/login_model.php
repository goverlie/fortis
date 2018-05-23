<?php
use \core\libs as core;

class Login_Model extends core\Model {
	 function __construct() {
		 parent::__construct();
	 }
	
	public function run () {
		
		$data = $this->db->select1('SELECT * FROM ' . DB_TABLE_PREFIX . 'users WHERE username = :username', array(':username' => $_POST['username']));
		
		$postData = array (
			'last_login' => date('Y-m-d H:i:s')
		);
		
		$check_password = hash('sha256', $_POST['password'] . $data['salt']);
			for($round = 0; $round < 65536; $round++) {
				$check_password = hash('sha256', $check_password . $data['salt']);
			}

			if($check_password === $data['password']) {
				//log in
				//core\Session::set('theme_id',$data['theme_id']);
				core\Session::set('loggedIn', true);
				core\Session::set('user_id',$data['user_id']);
				core\Session::set('firstname',$data['firstname']);
				core\Session::set('lastname',$data['lastname']);
				//Session::set('role',$data['permission_level']);
				$this->db->update(DB_TABLE_PREFIX . 'users', $postData ,"`user_id` = {$data['user_id']}");
				header('location: '.URL.'dashboard');
			} else {
				core\Session::destroy();
				header('location: '.URL.'login');
			}
	}
}
