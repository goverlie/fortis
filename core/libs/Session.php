<?php
namespace core\libs;

class Session {
	function __construct () {}
	
	public static function init () {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();

			//logout user is 2 hours have passed with no activity
			if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
				// last request was more than 30 minutes ago
				session_unset();     // unset $_SESSION variable for the run-time 
				session_destroy();   // destroy session data in storage
			}
			$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
			
			//protect against session fixation attacks
			if (!isset($_SESSION['CREATED'])) {
				$_SESSION['CREATED'] = time();
			} else if (time() - $_SESSION['CREATED'] > 1800) {
				// session started more than 30 minutes ago
				session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
				$_SESSION['CREATED'] = time();  // update creation time
			}
		}
	}
	
	public static function hasSessionStarted () {
		
		if (session_status() == PHP_SESSION_NONE) {
			return false;
			exit;
		}
		
		return true;
		
	}
	
	public static function set ($key, $value) {
		try {
			$_SESSION[$key] = $value;
		}
		catch (Throwable $t) {
			die("unable to set key is session... " . $t);
		}
	}
	
	public static function get ($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
	}
	
	public static function destroy () {
		//also unset anything unset($_SESSION);
		
		session_destroy();
	}
}
