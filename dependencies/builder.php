<?php

	class Builder {
				
		public static function buildSection($content, $class = 'section', $style = '') {
			return '<div ' . self::buildClass($class) .self::buildStyle($style) .'>' . $content . '</div>';
		}		
		
		public static function buildText($text, $class = '') {
			return '<span' . self::buildClass($class) .'>' . $text . '</span>';
		}
		
		public static function buildLineBreak() {
			return '<br/>';
		}
		
		public static function buildLink($href, $content, $class = '', $blank = false ) {
			return '<a href="' . $href . '"' . ($blank ? ' target="_blank"' : '') . '' . self::buildClass($class) .'>' . $content . '</a>'; 
		}
		
		public static function buildImage($src, $alt = '', $class = '') {
			return '<img src="' . $src . '"' . ($alt != '' ? ' alt=""' : '') . '' . self::buildClass($class) .'>';
		}
		
		public static function buildLabel($for, $text, $class = '') {
			return '<label for="' . $for .'"' . self::buildClass($class) .'><strong>' . $text . '</strong></label>';
		}
		
		public static function buildInput($type, $placeholder, $name, $value, $required = false, $class = '') {
			return '<input type="' . $type . '" placeholder="' . $placeholder . '" name="' . $name . '" value="' . $value . '"' . ($required ? ' required' : '') . self::buildClass($class) . '>';
		}
		
		public static function buildButton($type, $value, $name, $class = '') {
			return '<input type="' . $type . '" value="' . $value . '" name="' . $name . '"' . self::buildClass($class) . '>';
		}			
		
		public static function buildForm($action, $method, $content, $class = '') {
			return '<form action="' . $action . '" method="' . $method . '"' . self::buildClass($class) .'>' . $content . '</form>';
		}

		public static function buildFigure($content, $class = '') {
			return '<figure' . self::buildClass($class) .'>' . $content . '</figure>';
		}

		public static function buildFigCaption($content, $class = '') {
			return '<figcaption' . self::buildClass($class) .'>' . $content . '</figcaption>';
		}

		public static function buildIcon($icon) {
			return '<i class="' . $icon . '"></i>';
		}

		public static function buildScript($script) {
			return '<script>' . $script . '</script>';
		}
		
		private static function buildClass($class) {
			return $class != '' ? ' class="' . $class . '"' : '';
		}
		
		private static function buildStyle($style) {
			return $style != '' ? ' style="' . $style . '"' : '';
		}
		
	}

?>