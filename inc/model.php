<?php

class BitTestModel {
	
	private $input;
	private $db_conn;
	
	public function __construct($a, $b) {
		
		$this->input = $a;
		$this->db_conn = $b;
		
	}
	
	public function get_users() {
		
		if (empty($this->input)) {
			
			$query = "SELECT user_login, user_email FROM wp_users";
			
		} else {
			
			$query = "SELECT user_login, user_email FROM wp_users WHERE user_login LIKE '%".$this->input."%' OR user_email LIKE '%".$this->input."%'";
			
		}
		
		$results = $this->db_conn->get_results($query, ARRAY_A);
		
		return $results;
		
	}

	public function post_users() {

	if (isset($_POST['send'])) {

	$user_login = $_POST['user_login'];
	$user_pass = $_POST['user_pass'];
	$user_email = $_POST['user_email'];
	$secpass = md5($user_pass);

		$query_str = "INSERT INTO wp_users (user_login, user_pass, user_email) VALUES ('$user_login', '$secpass', '$user_email')";

		$query_final = $this->db_conn->prepare($query_str);

		$results = $this->db_conn->get_results($query_final, OBJECT);
	}

	return $results;
	}
}