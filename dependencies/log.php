<?php

  class Log {

    public static $log = 'log/access.log';

    public static function write($status = 200) {
      $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

      $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] . ' ( ' . $_SERVER['REMOTE_ADDR'] .' )' : $_SERVER['REMOTE_ADDR'];
      $contentLength = isset($_SERVER['CONTENT_LENGTH']) ? $_SERVER['CONTENT_LENGTH'] : 0;
      $user = isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'] : '';

      $log = $ip . ' - ' . $user . ' ' . date(DATE_ISO8601) . ' - "' . $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'] . ' ' . $_SERVER['SERVER_PROTOCOL'] . '" ' . $status . ' ' . $contentLength . ' ' . round(( $time*1000 ), 2) . 'ms';

      file_put_contents(self::$log, $log . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

  }

?>
