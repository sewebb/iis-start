<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>
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

