<?php
// Get current page URL
$urlShare = get_permalink();

// Get current page title
$pageTitle = str_replace( ' ', '%20', get_the_title());

// Get Post Thumbnail for pinterest
$thumbnail = $fullimage;

$twitterURL = 'https://twitter.com/intent/tweet?'.$pageTitle.'&amp;url='.$urlShare;
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$urlShare;
$googleURL = 'https://plus.google.com/share?url='.$urlShare;
$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$urlShare.'&amp;media='.$thumbnail[0].'&amp;pageTitle';
$linkedin = 'http://www.linkedin.com/shareArticle?mini=true&url='.$urlShare.'&title='.$pageTitle;
$mailto = 'mailto:?subject='.$pageTitle.'&body='.$urlShare;

printf("
		<li class='social-share-item'>
			<a class='js-open-popup social-share-link' href='%s' target='_blank'>
				<i class='icon-facebook'></i>
				<span class='visually-hidden'>
					Facebook
				</span>
			</a>
		</li>
		<li class='social-share-item'>
			<a class='js-open-popup social-share-link' href='%s' target='_blank'>
				<i class='icon-twitter'></i>
				<span class='visually-hidden'>
					Twitter
				</span>
			</a>
		</li>
		<li class='social-share-item'>
			<a class='js-open-popup social-share-link' href='%s' target='_blank'>
				<i class='icon-google-plus'></i>
				<span class='visually-hidden'>
					Google+
				</span>
			</a>
		</li>
		<li class='social-share-item'>
			<a class='js-open-popup social-share-link' href='%s' target='_blank'>
				<i class='icon-linkedin'></i>
				<span class='visually-hidden'>
					LinkedIn
				</span>
			</a>
		</li>
		<li class='social-share-item'>
			<a class='social-share-link' href='%s'>
				<i class='icon-mailto'></i>
				<span class='visually-hidden'>
					Email
				</span>
			</a>
		</li>
	",
	$facebookURL,
	$twitterURL,
	$googleURL,
	$linkedin,
	$mailto
);

?>