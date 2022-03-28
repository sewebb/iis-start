<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" sizes="180x180" href="https://static.internetstiftelsen.se/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="https://static.internetstiftelsen.se/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="https://static.internetstiftelsen.se/favicons/favicon-16x16.png">
		<link rel="manifest" href="https://static.internetstiftelsen.se/favicons/site.webmanifest">
		<link rel="mask-icon" href="https://static.internetstiftelsen.se/favicons/safari-pinned-tab.svg" color="#ff4069">
		<link rel="shortcut icon" href="https://static.internetstiftelsen.se/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-config" content="https://static.internetstiftelsen.se/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<meta name="format-detection" content="telephone=no">
		<meta name="supported-color-schemes" content="light">

		<?php wp_head(); ?>
		<script type="text/javascript">
			document.querySelector('html').classList.remove('no-js');
			document.querySelector('html').className += 'js';
		</script>
	</head>

	<body <?php body_class(); ?>>
		<?php iis_styleguide_sprite(); ?>
		<div class="iis-start-site" id="site" data-namespace="iis-start-">
			<header class="iis-start-o-header">
				<div class="wrapper">
					<div class="row justify-content-between align-items-center flex-nowrap">
						<div class="grid-auto">
							<a href="/" class="u-link">
								<span>IIS Start</span>
								<span class="u-visuallyhidden">Till startsidan</span>
							</a>
						</div>
						<div class="grid">
							<nav class="iis-start-a-main-menu">
								<ul class="iis-start-a-main-menu__list">
									<li class="u-hidden-mobile">
										<a href="https://styleguide.internetstiftelsen.se" class="iis-start-a-main-menu__list__link">
											<span class="iis-start-a-main-menu__list__text">Styleguide documentation</span>
										</a>
									</li>
								</ul>
							</nav>

						</div>
					</div>
				</div>
			</header>

			<div class="iis-start-site__main" id="siteMain">

