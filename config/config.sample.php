<?php
	
	class Config {
		
		private static $hashtag = 'test';
		private static $user = 'test';
		private static $text = 'Hey, willkommen auf meiner Test-Seite!';
		private static $title = 'test';
		private static $links = [];
		
		private static $imprint = '';
		private static $privacy = '';
		
		private static $backgroundColors = ['#ffff00', '#ff9933'];
		private static $fontColor = '#333300';
		private static $linkColor = '#ffffff';
		
		public static function init() {
			array_push(self::$links, new LinkDto(1, 'Twitch', 'https://www.twitch.tv/', 'fa-twitch', date("Y-m-d H:i:s"), date("Y-m-d H:i:s")) );
			array_push(self::$links, new LinkDto(2, 'Instagram', 'https://www.instagram.com/', 'fa-instagram', date("Y-m-d H:i:s"), date("Y-m-d H:i:s")) );
			array_push(self::$links, new LinkDto(3, 'Youtube', 'https://www.youtube.com/', 'fa-youtube', date("Y-m-d H:i:s"), date("Y-m-d H:i:s")) );
			array_push(self::$links, new LinkDto(4, 'Twitter', 'https://twitter.com/', 'fa-twitter', date("Y-m-d H:i:s"), date("Y-m-d H:i:s")) );
		}
		
		public static function getHashtag() {
			return self::$hashtag;
		}
		
		public static function getUser() {
			return self::$user;
		}
		
		public static function getText() {
			return self::$text;
		}
		
		public static function getTitle() {
			return self::$title;
		}
		
		public static function getLinks() {
			return self::$links;
		}
		
		public static function getBackgroundColors() {
			return self::$backgroundColors;
		}
		
		public static function getFontColor() {
			return self::$fontColor;
		}
		
		public static function getLinkColor() {
			return self::$linkColor;
		}
		
		public static function getImprint() {
			return self::$imprint;
		}
		
		public static function getPrivacy() {
			return self::$privacy;
		}
	}

?>