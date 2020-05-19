<?php get_header(); the_post(); ?>
<div class="iis-start-site__main__content">
	<div class="wrapper">
		<div class="row justify-content-center">
			<div class="grid-18 wp-blocks-wrapper">
				<div class="iis-start-section">
					<div class="iis-start-article wp-blocks-content">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
