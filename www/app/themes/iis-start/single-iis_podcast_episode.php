<?php

get_header();
the_post();

$episode = new Internetstiftelsen\Podcast\Episode();

?>
<div class="iis-start-site__main__content">
	<?php $episode->hero(); ?>
	<div class="iis-start-section iis-start-section--tight">
		<div class="wrapper">
			<div class="row justify-content-center">
				<div class="grid-18">
					<div class="iis-start-article">
						<div class="iis-start-article__content">
							<?php the_content(); ?>
							<?php $episode->podcast->about(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $episode->podcast->player(); ?>
<?php get_footer(); ?>
