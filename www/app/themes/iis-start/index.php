<?php

get_header();
the_post();

?>
<div class="iis-start-site__main__content">
	<div class="iis-start-section u-m-t-0">
		<div class="wrapper">
			<div class="row justify-content-center">
				<div class="grid-18">
					<div class="iis-start-article">
						<?php if ( ! iis_has_hero() ) : ?>
						<h1 class="u-m-t-4"><?php the_title(); ?></h1>
						<?php endif; ?>
						<div class="iis-start-article__content">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
