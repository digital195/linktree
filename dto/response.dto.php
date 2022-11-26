<?php

    class ResponseDto {
		use \GetSetGo\SetterGetter;
		
        private $title;
        private $content;
		private $redirectTo;

        public function __construct() {
            // parent::__construct();
        }
		
    }

?>
