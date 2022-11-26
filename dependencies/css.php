<?php

?>
<style>
			@import url('https://use.fontawesome.com/releases/v5.8.1/css/all.css');
			
			/* latin-ext */
			@font-face {
				font-family: 'Nunito';
				font-style: normal;
				font-weight: 400;
				/* normal */
				src: local('Nunito Regular'), local('Nunito-Regular'), url('../static/fonts/Nunito-Regular-latin-ext.woff2') format('woff2'), url('../fonts/Nunito-Regular.ttf') format('truetype');
				unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
			}

			/* latin */
			@font-face {
				font-family: 'Nunito';
				font-style: normal;
				font-weight: 400;
				/* normal */
				src: local('Nunito Regular'), local('Nunito-Regular'), url('../static/fonts/Nunito-Regular.woff2') format('woff2'), url('../fonts/Nunito-Regular.ttf') format('truetype');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}

			/* latin-ext */
			@font-face {
				font-family: 'Nunito';
				font-style: normal;
				font-weight: 700;
				/* bold */
				src: local('Nunito Bold'), local('Nunito-Bold'), url('../static/fonts/Nunito-Bold-latin-ext.woff2') format('woff2'), url('../fonts/Nunito-Bold.ttf') format('truetype');
				unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
			}

			/* latin */
			@font-face {
				font-family: 'Nunito';
				font-style: normal;
				font-weight: 700;
				/* bold */
				src: local('Nunito Bold'), local('Nunito-Bold'), url('../static/fonts/Nunito-Bold.woff2') format('woff2'), url('../fonts/Nunito-Bold.ttf') format('truetype');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}

			a {
				color: var(--linkColor);
				text-decoration: none;
			}

			body {
				margin: 0;
				padding: 0;
				min-height: 100vh;
				width: 100%;
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
				margin-right: 0.5em;
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
			
			.hidden {
				display: none;
			}

			.elevated {
				background-color: rgba(0,0,0,0.5);
				max-width: 43em;
				margin: 0 auto;
				margin-top: -10px;
				padding-top: 10px;
				border-radius: 1em;
			}

			.slider {
				position: absolute;
				left: 0;
				top: 0; 
				z-index: -1;
				width: 100vw;
				height: 100vh;
				overflow: hidden;
			}

			.slide {
				width: 100vw;
				height: 100vh;
				background-position: center; 
				background-size: cover;
			}

			/* Fading animation */
			.fade {
				-webkit-animation-name: fade;
				-webkit-animation-duration: 0.5s;
				animation-name: fade;
				animation-duration: 0.5s;
			}

			@-webkit-keyframes fade {
				from {opacity: .4}
				to {opacity: 1}
			}

			@keyframes fade {
				from {opacity: .4}
				to {opacity: 1}
			}

		</style>