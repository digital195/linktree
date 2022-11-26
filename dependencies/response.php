<?php

  class Response {

    public static function build($statusCode = 200, $data = null, $message = 'OK') {
      $response = new \stdClass();

      $response->statusCode = $statusCode;
      $response->message = $message;

      $response->data = $data;

      http_response_code($statusCode);

      echo self::buildJSON($response);

      Log::write($statusCode);
    }

    public static function empty($statusCode = 200) {
      http_response_code($statusCode);

      Log::write($statusCode);
    }

    public static function error($statusCode = 400, $code = 'unknown-error', $message = 'unknown error') {
      $response = new \stdClass();

      $response->statusCode = $statusCode;
      $response->code = $code;
      $response->message = $message;

      $response->error = true;

      http_response_code($statusCode);

      echo self::buildJSON($response);

      Log::write($statusCode);
    }

    private static function buildJSON($stdClass) {
      return json_encode($stdClass);
    }

    public static function buildTemplate($responseDto) {
      include_once 'template/template.php';
    }
	
  }

?>
