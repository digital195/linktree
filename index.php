<?php
	define('DEBUG', false);
	define('VERSION', '0.0.3');
	
	if (DEBUG) {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
	
	include_once('dependencies/dependencies.php');
	
	Config::init();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<base href="/">
		<title><?php echo Config::getTitle(); ?> - LinkTree</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="icon" href="static/image.png" />
		
		<style>
			:root {
				--bgColor: <?php echo Config::getBackgroundColors()[0]; ?>;
				--bgColor2: <?php echo Config::getBackgroundColors()[1]; ?>;
				
				--linkColor: <?php echo Config::getLinkColor(); ?>;
				--accentColor: <?php echo Config::getFontColor(); ?>;
				
				--font: 'Nunito', sans-serif;
				
				--transitionDuration: .3s;
			}		
		</style>
		
		<?php 
			include_once('dependencies/css.php');
		?>
		

	</head>

	<body class="app">
		<div class="wrapper">
	
			<div class="picture">
				<img src="static/image.png" alt="Profile Picture">
			</div>

			<div class="user">
			
				<?php if (Config::getText() != '') { ?>
				
				<span class="small"><?php echo Config::getText(); ?></span><br/>
				<br/>
			
				<?php } ?>
				
				<span>@<?php echo Config::getUser(); ?></span>
			</div>

			<div class="links">
				
				<?php foreach (Config::getLinks() as $linkDto) { ?>
								
				<a class="link" id="<?php echo $linkDto->id; ?>" href="<?php echo $linkDto->link; ?>" target="_blank">
					<i class="<?php echo $linkDto->icon; ?>"></i>
					<span><?php echo $linkDto->title; ?></span>
				</a>
				
				<?php } ?>
				
			</div>

			<?php if (Config::getHashtag() != '') { ?>

			<div class="hashtag">
				<span>#<?php echo Config::getHashtag(); ?></span>
			</div>
			
			<?php } ?>
			
			<div class="copyright">
				<span>Build by <a href="https://link.s-loer.de/" target="_blank">Sebastian Loer</a></span><br/>
				<span>LinkTree is a free software. Find the source code on <a class="button" href="https://github.com/digital195/" target="_blank">GitHub</a></span><br/>
				<br/>
				
				<?php if (Config::getImprint() != '' && Config::getPrivacy() != '') { ?>
				
				<span><a href="<?php echo Config::getImprint(); ?>" target="_blank">Imprint</a> - <a href="<?php echo Config::getPrivacy(); ?>" target="_blank">Privacy</a></span><br/>
				<br/>
			
				<?php } ?>
				
				<span>v<?php echo VERSION; ?></span>
			</div>
		
		</div>

	</body>
</html>