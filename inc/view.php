<?php
	
class BitTestView {

	public static function generate_users_view($results) {
		
		$output = '<form method="post">';
		$output .= '<h1>Add User in Database</h1><br>';
		$output .= 'Username: <input type="text" placeholder="Username" autocomplete="off" name="user_login"><br>';
		$output .= 'Password: <input type="password" placeholder="Password" autocomplete="off" name="user_pass"><br>';
		$output .= 'Email: <input type="email" placeholder="Email" autocomplete="off" name="user_email"><br>';
		$output .= '<input type="submit" name="send" value="Add User">';
		$output .= '</form><hr>';

		$output .= '<ul>';
		
		foreach ($results as $result) {
			
			$output .= '<li>'.$result['user_login'].' , '.$result['user_email'].'</li>';
			
		}
		
		$output .= '</ul>';
		
		
		return $output;	
	}

}

