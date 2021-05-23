<?php

?>
<style>
			@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400&display=swap');

			a {
				color: var(--linkColor);
				text-decoration: none;
			}

			body {
				margin: 0;
				padding: 0;
				min-height: 100vh;
				width: 100vw;
				font-family: var(--font);
				font-weight: 300;
				background: radial-gradient(ellipse at bottom, var(--bgColor) 0%, var(--bgColor2) 100%);
			}

			.wrapper {
				padding: 1.25em;
			}

			.picture, .picture img {
				width: 6em;
				height: 6em;
				display: block;
				margin: 2.5em auto 1.25em;
				border-radius: 50%;
			}

			.user {
				color: var(--accentColor);
				font-size: 1rem;
				font-weight: bold;
				line-height: 1.25;
				font-family: var(--font);
				width: 100%;
				text-align: center;
				text-decoration: none;
			}

			.links {
				max-width: 42em;
				width: auto;
				display: block;
				margin: 1.25em auto;
			}

			.link {
				position: relative;
				background-color: var(--accentColor);
				color: var(--bgColor);
				border: solid var(--accentColor) 0.125em;	
				border-radius: 0.625em;
				text-align: center;
				display: block;
				margin-left: 0.625em;
				margin-right: 0.625em;
				margin-bottom: 0.625em;
				padding: 0.625em;
				text-decoration: none;
				-webkit-tap-highlight-color: transparent;
				
				transition-duration: var(--transitionDuration);
				height: 1.8em;
				line-height: 1.8em;
				font-size: 1.2em;
			}
			
			.link i {
				margin-right: 0.25em;
			}

			.link:hover {
				color: var(--accentColor);
				background-color: transparent;
			}

			.link:active {
				color: var(--accentColor);
				background-color: transparent;
			}
			
			.socials {
				
			}

			.hashtag {
				padding-bottom: 1.25em;
				color: var(--accentColor);
				font-size: 1rem;
				font-family: var(--font);
				width: 100%;
				text-align: center;
			}
			
			.copyright {
				margin-top: 1.25em;
				padding-bottom: 1.25em;
				color: var(--accentColor);
				font-size: 0.7rem;
				font-family: var(--font);
				width: 100%;
				text-align: center;
			}
			
			.small {
				font-size: 0.9rem;
			}
		</style>