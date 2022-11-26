<?php

  class Security {

    public static function sanitize($var) {
		return htmlspecialchars(strip_tags($var));
    }

    public static function sanitizeArray($array) {
		$sanitizedArray = array();
		
		foreach ($array as &$var) {
			$sanitizedVar = self::sanitize($var);
			array_push($sanitizedArray, $sanitizedVar);
		}
			
		return $sanitizedArray;
    }
	
	public static function generateToken($formName) {
		$secretKey = Config::getCsrfTokenSecret();
		if (!session_id()) {
			session_start();
		}
		$sessionId = session_id();

		return sha1($formName . $sessionId . $secretKey);
	}
	
	public static function generateTimeToken($formName)
	{
		$secretKey = Config::getCsrfTokenSecret();
		if (!session_id()) {
			session_start();
		}
		$sessionId = session_id();
		$microtime = microtime();

		$_SESSION['token'] = sha1($formName . $sessionId . $secretKey . $microtime);

		return $_SESSION['token'];
	}

	
	public static function checkToken($token, $formName) {
		return $token === self::generateToken($formName);
	}
	
	public static function checkTimeToken($token) {
		if (!session_id()) {
			session_start();
		}		
		return $token == $_SESSION['token'];
	}
	
  }

?>
