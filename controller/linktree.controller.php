<?php

  class LinktreeController {

    public static function linktree() {
        $response = new ResponseDto();
		$response->setTitle( Config::getTitle() );

		if (Router::getRequestUri() != Router::getBaseUrl() . '/') {
			$response->setRedirectTo(Router::getBaseUrl() . '/');
		}

		$links = '';
		
		foreach (Config::getLinks() as $linkDto) {
			$links = $links . 
				Builder::buildLink(
					$linkDto->link,
					Builder::buildIcon(
						$linkDto->icon
					) .
					Builder::buildText(
						$linkDto->title
					),
					'link',
					true
				);
		}

		$content =
			GithubCorners::generate('https://github.com/digital195/linktree', 'var(--bgColor2)', 'var(--linkColor)') .
			Builder::buildSection(
				Builder::buildImage(Router::getBaseUrl() . 'static/image.png', 'Profile Picture'),
				'picture'
			) .
			Builder::buildSection(
				(
					Config::getText() != '' ?
						Builder::buildText(
							Config::getText(),
							'small'
						) .
						Builder::buildLineBreak() .
						Builder::buildLineBreak()
					: ''
				) .
				Builder::buildText('@' . Config::getUser() ),
				'user'
			) .
			Builder::buildSection(
				$links,
				'links'
			) .
			(
				Config::getHashtag() != '' ?
					Builder::buildSection(
						Builder::buildText(
							'#' . Config::getHashtag()
						),
						'hashtag'
					)
				: ''
			);

		$response->setContent($content);

		return Response::buildTemplate($response);
	}

  }

?>