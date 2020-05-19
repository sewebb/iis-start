<?php

get_header();
the_post();

?>
<div class="iis-start-site__main__content">
	<div class="iis-start-section<?php echo ( iis_has_hero() ) ? ' u-m-t-0' : ''; ?>">
		<div class="wrapper">
			<div class="row justify-content-center">
				<div class="grid-18">
					<div class="iis-start-article">
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
