<?php
	define('DEBUG', false);
	define('READONLY', true);
	define('VERSION', '0.0.6');
	
	if (DEBUG) {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
	
	include_once('dependencies/dependencies.php');
	
	Config::init();
	Router::init();

	Router::setMethodNotAllowed( function() {
		LinktreeController::linktree();
		// Response::error(405, 'method-not-allowed', 'method not allowed');
	});
	
	Router::setPathNotFound( function() {
		LinktreeController::linktree();
		// Response::error(404, 'not-found', 'not found');
	});

	Router::setSpamProtection( function($function, $matches, $path) {
		call_user_func_array($function, $matches);
	} );

	Router::setAllowedUsers( [] );

	Router::setBaseUrl( '' );

	Router::setAuthRequired( function() {
		Router::json();
		Response::error(401, 'wrong-credentials', 'wrong credentials supplied');
	});
	
	Router::setAuthDisabled( function() {
		Router::json();
		Response::error(400, 'readonly-mode', 'readonly mode is active');
	});
	





	Router::addMulti(['/'], function() {
		LinktreeController::linktree();
	}, 'get', 'none', false);

	Router::run();
?>