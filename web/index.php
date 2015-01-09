<?php
if ( isset( $_SERVER['HTTPS'] ) && $_SERVER["HTTPS"] == "on" ) {
	header( 'Location: http://wpthemetable.com' );
	exit;
}
?>
<?php header( 'Content-type: text/html; charset=utf-8' ); ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
	<title>The Periodic Table of WordPress Themes</title>
	<meta name="viewport" content="width=1360">
	<link rel="stylesheet" href="css/style.css" />
	<meta name="description" content="There are around 3000 themes available in the WordPress.org theme directory. This table showcases the 108 most popular WordPress themes, ranked by the number of downloads." />
	<meta name="robots" content="index, follow" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:title" content="The Periodic Table of WordPress Themes" />
	<meta property="og:url" content="http://wpthemetable.com" />
	<meta property="og:image" content="http://wpthemetable.com/img/wpthemetable.png" />
	<meta property="og:description" content="There are around 3000 themes available in the WordPress.org theme directory. This table showcases the 108 most popular WordPress themes, ranked by the number of downloads." />
	<link href="https://plus.google.com/103365919153496720927" rel="author" />
	<link href="https://plus.google.com/+SpinPress" rel="publisher" />
	<!--

					   `-/+osssssssssssso+/-`
				   ./oys+:.`            `.:+syo/.
				.+ys:.   .:/osyyhhhhyyso/:.   ./sy+.
			  /ys:   -+ydmmmmmmmmmmmmmmmmmmdy+-   :sy/
			/h+`  -odmmmmmmmmmmmmmmmmmmmmmmmmmmdo-  `+h/
		  :ho`  /hmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmds/   `oh:
		`sy.  /hmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmd+        .ys`
	   .ho  `sdddhhhyhmmmdyyhhhdddddhhhyydmmmmy           oh.
	  .h+          ``-dmmy.``         ``.ymmmmh            +h.
	 `ho  `       /mmmmmmmmmmo       .dmmmmmmmms        ~~  oh`
	 oy  .h`       ymmmmmmmmmm:       /mmmmmmmmmy`      -d.  yo
	.d-  ymy       `dmmmmmmmmmd.       ymmmmmmmmmh`     /my  -d.
	oy  -mmm+       /mmmmmmmmmmy       .dmmmmmmmmmy     ymm-  yo
	h+  +mmmd-       smmmmmmmmmm+       /mmmmmmmmmm-   :mmm+  +h
	d/  smmmmh`      `dmmmmmmmmmd`       smmmmmmmmm:  `dmmms  /d
	d/  smmmmms       :mmmmmmmmm+        `dmmmmmmmd.  smmmms  /d
	h+  +mmmmmm/       smmmmmmmh  +       /mmmmmmmy  /mmmmm+  +h
	oy  -mmmmmmd.      `dmmmmmd- +m/       smmmmmd. .dmmmmm-  yo
	.d-  ymmmmmmh       :mmmmm+ .dmd-      `dmmmm/  ymmmmmy  -d.
	 oy  .dmmmmmmo       smmmh  hmmmh`      :mmmy  +mmmmmd.  yo
	 `ho  -dmmmmmd:      `dmd- ommmmms       smd- .dmmmmd-  oh`
	  .h+  -dmmmmmd`      :m+ -dmmmmmm:      `do  hmmmmd-  +h.
	   .ho  .ymmmmmy       + `hmmmmmmmd.      :` ommmmy.  oh.
		`sy.  /hmmmm+        ommmmmmmmmy        -dmmh/  .ys`
		  :ho`  /hmmd-      :mmmmmmmmmmmo      `hmh/  `oh:
			/h+`  -odh`    `dmmmmmmmmmmmd:     oo-  `+h/
			  /ys:   ~~    smmmmmmmmmmmmmd`       :sy/
				.+ys/.    `/osyyhhhhyyso/:`   ./sy+.
				   ./oys+:.`            `.:+syo/.
					   `-/+osssssssssssso+/-`

	   We ♥ WordPress — http://wordpress.org/
	   (ASCII art by Mark Jaquith)
	-->
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
<body>
<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-2653828-16', 'auto');
	ga('require', 'linkid', 'linkid.js');
	ga('require', 'displayfeatures');
	ga('set', 'dimension1', 'true');
	ga('send', 'pageview');

</script>
<div class="toolbar">
	<div class="toolbar-inner">
		<div class="social-links">
			<div class="button facebook">
				<iframe src="//www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwpthemetable.com&amp;layout=button_count" width="130" height="30" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowTransparency="true"></iframe>
			</div>
			<div class="button google">
				<script src="https://apis.google.com/js/platform.js" async defer></script>
				<div class="g-plus" data-action="share" data-annotation="none" data-href="http://wpthemetable.com"></div>
			</div>
			<div class="button twitter">
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://wpthemetable.com" data-via="SpinPress">Tweet</a>
				<script>!function (d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
						if (!d.getElementById(id)) {
							js = d.createElement(s);
							js.id = id;
							js.src = p + '://platform.twitter.com/widgets.js';
							fjs.parentNode.insertBefore(js, fjs);
						}
					}(document, 'script', 'twitter-wjs');</script>
			</div>
		</div>
		<div class="info-text">
			<a href="https://spinpress.com/subscribe/" target="_blank" title="Subscribe to our blog!">
				<p>Curious about future updates? Subscribe to our blog for more information!</p></a>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="table">
		<aside class="infobox">
			<div class="example">
				<div class="element">Symbol</div>
				<div class="name-wrap">
					<div class="name">Theme Name</div>
				</div>
			</div>
			<div class="intro">
				<h1 class="logo">
					<a href="http://wpthemetable.com" title="The Periodic Table of WordPress Themes">The Periodic Table of WordPress Themes</a>
				</h1>

				<div class="description">
					<p>
						Around <strong>3&lsquo;000 WordPress themes</strong> have been contributed to the
						<a href="https://wordpress.org/themes/" target="_blank">WordPress.org Theme Directory</a> by an amazing open-source community around the globe.
						This table showcases the 108 most popular WordPress themes from both WordPress.org and ThemeForest, ranked by the number of downloads/sales.
					</p>
				</div>
			</div>
		</aside>
		<?php
		require_once( 'load.php' );
		$themes = get_themes();

		foreach ( $themes as $theme ) : ?>
			<div class="theme <?php echo $theme['slug']; ?>">
				<div class="element"><?php echo get_element_name( get_theme_name( $theme['name'] ), 3 ); ?></div>
				<div class="name-wrap">
					<div class="name"><?php echo get_theme_name( $theme['name'], 5, true ); ?></div>
				</div>
				<div class="tooltip right hidden">
					<div class="tooltip-inner">
						<div class="upper-wrap">
							<div class="name">
								<a href="<?php echo get_theme_url( $theme ) ?>" title="<?php echo $theme['name']; ?>" target="_blank" rel="nofollow"><?php echo $theme['name']; ?></a>
							</div>
							<div class="author">Author: <?php echo $theme['author']; ?></div>
							<div class="additionalinfo"><?php echo get_theme_additional_info( $theme ); ?></div>
						</div>
						<div class="description"><?php echo $theme['short_description']; ?></div>
						<div class="downloaded"><?php echo str_replace( '-', '&lsquo;', number_format( $theme['downloaded'], 0, '.', '-' ) ); ?></div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="footer">
		<p class="copyright">&copy; <?php echo date( 'Y' ); ?> wpthemetable.com / see also
			<a href="http://plugintable.com/" title="The Periodic Table of WordPress Plugins" target="_blank">plugintable.com</a>
		</p>

		<p class="info">Brought to you by
			<a href="https://twitter.com/spinpress" target="_blank" title="Twitter - @SpinPress">@SpinPress</a> /
			<a href="http://spinpress.com" title="SpinPress – A new spin on WordPress community news" target="_blank">SpinPress.com</a>
		</p>
	</div>
</div>
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script>
	jQuery(document).ready(function ($) {
		$(".theme:nth-of-type(2)").addClass('nth-of-type-float');
		$(".theme:nth-of-type(5), .theme:nth-of-type(13)").addClass('nth-of-type-margin');
		$(".theme:nth-of-type(1), .theme:nth-of-type(3), .theme:nth-of-type(11), .theme:nth-of-type(18n+19)").addClass('nth-of-type-clear');

		$(document).on('click', function (e) {
			var clicked = $(e.target);
			if (clicked.is('.theme') || clicked.parents('.theme').length > 0)
				return;

			closeTooltips();
		});
		$('.theme').on('click', function (e) {
			var show = true,
				offset = $(this).offset(),
				clicked = $(e.target);

			if (clicked.parents('.tooltip').length > 0) {
				return;
			}

			if ($(this).find('.tooltip').is(':visible')) {
				show = false;
			}

			closeTooltips();

			if (show) {
				if (offset.left > ( $('.table').width() / 2 ))
					$(this).find('.tooltip').removeClass('right');
				if ($('.table').height() - offset.top < 330)
					$(this).find('.tooltip').addClass('bottomtop');
				$(this).addClass('active').find('.tooltip').show('fast');
				ga('send', 'event', 'tooltip', 'open', $(this).find('.name').first().text(), $('.theme').index($(this)));
			}
		});

		function closeTooltips() {
			$('.tooltip').each(function () {
				if ($(this).parent('.theme').hasClass('active')) {
					ga('send', 'event', 'tooltip', 'close', $(this).find('.name').first().text(), $('.theme').index($(this).parent()));
				}
				$(this).parent('.theme').removeClass('active');
				$(this).removeClass('bottomtop').hide('fast');
			});
		}
	});
</script>
</body>
</html>