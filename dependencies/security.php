<?php

  class Security {

    public static function sanitize($var) {
      return htmlspecialchars(strip_tags($var));
    }

  }

?>
