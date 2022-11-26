<?php

  class Router {
    private static $routes = Array();
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;
    private static $spamProtection = null;
    private static $users = [];
    private static $authRequired = null;
    private static $authDisabled = null;
    private static $baseUrl = '';

    public static function init() {

    }

    public static function json() {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
      header("Access-Control-Max-Age: 3600");
      header("Access-Control-Allow-Headers: Content-Type, origin, Access-Control-Allow-Headers, Authorization, X-Requested-With");
      header("Content-Type: application/json; charset=UTF-8");
    }

    public static function add($expression, $function, $method = 'get', $auth = 'none', $spamProtection = false) {
      array_push(self::$routes, Array(
        'expression' => $expression,
        'function' => $function,
        'method' => $method,
        'auth' => $auth,
        'spamProtection' => $spamProtection
      ));
    }

    public static function addMulti($expressions, $function, $method = 'get', $auth = 'none', $spamProtection = false) {
      if (is_array($expressions)) {
        foreach ($expressions as &$expression) {
          foreach(explode(',', $method) as $m) {
            self::add($expression, $function, $m, $auth, $spamProtection);
          }

          self::add($expression, function() {
            Response::empty(204);
          }, 'options', 'none', false);
        }
      }
    }

    public static function getIp() {
      return $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ( ' . $_SERVER['REMOTE_ADDR'] .' )' : $_SERVER['REMOTE_ADDR'];
    }

    public static function setBaseUrl($baseUrl) {
      self::$baseUrl = $baseUrl;
    }

    public static function getBaseUrl() {
      return self::$baseUrl;
    }

    public static function setPathNotFound($function) {
      self::$pathNotFound = $function;
    }

    public static function setMethodNotAllowed($function) {
      self::$methodNotAllowed = $function;
    }

    public static function setSpamProtection($function) {
      self::$spamProtection = $function;
    }

    public static function setAllowedUsers($users) {
      self::$users = $users;
    }

    public static function setAuthRequired($function) {
      self::$authRequired = $function;
    }

    public static function setAuthDisabled($function) {
      self::$authDisabled = $function;
    }
    
    public static function buildUrl($domain) {
      return 'https://' . $domain;
    }

    public static function getUrl() {
      return 'https://' . $_SERVER['HTTP_HOST'];
    }

    public static function getRequestUri() {
      return $_SERVER['REQUEST_URI'];
    }

    public static function getUrlName() {
        return $_SERVER['HTTP_HOST'];
    }

    public static function run() {
      $basePath = self::getBaseUrl();

      // Parse current url
      $parsed_url = parse_url($_SERVER['REQUEST_URI']);//Parse Uri

      if(isset($parsed_url['path'])) {
        $path = $parsed_url['path'];
      } else {
        $path = '/';
      }

      // Get current request method
      $method = $_SERVER['REQUEST_METHOD'];

      $path_match_found = false;
      $route_match_found = false;

      foreach(self::$routes as $route) {

        // If the method matches check the path

        // Add basePath to matching string
        if($basePath!='' && $basePath!='/') {
          $route['expression'] = '('.$basePath.')' . $route['expression'];
        }

        // Add 'find string start' automatically
        $route['expression'] = '^' . $route['expression'];

        // Add 'find string end' automatically
        $route['expression'] = $route['expression'] . '$';

        // echo $route['expression'].'<br/>';

        // Check path match
        if(preg_match('#' . $route['expression'] . '#', $path, $matches)) {

          $path_match_found = true;

          // Check method match
          if(strtolower($method) == strtolower($route['method'])) {

            array_shift($matches);// Always remove first element. This contains the whole string

            if($basePath != '' && $basePath != '/') {
              array_shift($matches);// Remove basePath
            }

            if($route['auth'] == 'apiKey') {
              $apiKey = isset($_SERVER['HTTP_X_API_KEY']) ? $_SERVER['HTTP_X_API_KEY'] : 'not-defined';

              if( $apiKey == 'not-defined' ) {
                call_user_func_array(self::$pathNotFound, Array($path,$method));
                $route_match_found = true;
                break;
              }

              if(READONLY && $route['auth'] != 'cron') {
                call_user_func_array(self::$authDisabled, Array($path,$method));
                $route_match_found = true;
                break;
              }

              $found = false;

              foreach (self::$users as &$user) {
                if ($user->apiKey == $apiKey) {
                    if ($user->ip != '' && $user->ip != self::getIp()) {
                        Response::error(401, 'wrong-credentials', 'wrong credentials supplied');

                        exit;
                    }

                    $_SERVER['REMOTE_USER'] = str_replace(' ', '-', strtolower($user->title));

                    $found = true;
                    array_push($matches, $user);

                    call_user_func_array($route['function'], $matches);

                    $route_match_found = true;

                    break;
                }
              }

              if (!$found) {
                call_user_func_array(self::$authRequired, Array($path,$method));
                $route_match_found = true;
              }

              break;
            }

            /*
            if($route['auth'] == 'session') {
              if (!Auth::isLogin()) {
                call_user_func_array(self::$pathNotFound, Array($path,$method));
                $route_match_found = true;

                break;
              }
            }
            */

            if($route['spamProtection'] == true) {
              array_unshift($matches, $route['function']);

              call_user_func(self::$spamProtection, $route['function'], $matches, $route['expression']);
            } else {
              call_user_func_array($route['function'], $matches);
            }

            $route_match_found = true;
            // Do not check other routes
            break;
          }
        }
      }

      // No matching route was found
      if(!$route_match_found) {

        // But a matching path exists
        if($path_match_found) {
          if(self::$methodNotAllowed) {
            call_user_func_array(self::$methodNotAllowed, Array($path,$method));
          }
        } else {
          if(self::$pathNotFound) {
            call_user_func_array(self::$pathNotFound, Array($path,$method));
          }
        }

      }

    }

  }

?>
