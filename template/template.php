<?php
	if (!isset($responseDto)) {
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<base href="<?php echo Router::getBaseUrl(); ?>/">
		<title><?php echo Config::getTitle(); ?> - LinkTree</title>
		<link rel="icon" href="static/favicon.ico" />

		<?php if ($responseDto->getRedirectTo() != '') { ?>

		<meta http-equiv="refresh" content="3; url=<?php echo $responseDto->getRedirectTo(); ?>">
			
		<?php } ?>

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
			
			<?php if ($responseDto->getContent() != '') { ?>

				<?php echo $responseDto->getContent(); ?>
			
			<?php } ?>

			<div class="copyright <?php if (Config::getCopyright() != true) { echo "hidden"; } ?>">
				
				<span>Build by <a href="https://link.s-loer.de/" target="_blank">Sebastian Loer</a></span><br/>
				<span>LinkTree is a free software. Find the source code on <a class="button" href="https://github.com/digital195/linktree" target="_blank">GitHub</a></span><br/>
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