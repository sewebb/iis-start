<?php

get_header();
the_post();

$podcast = new Internetstiftelsen\Podcast\Podcast();

?>
<div class="iis-start-site__main__content">
	<?php $podcast->hero(); ?>
	<div class="iis-start-section iis-start-section--tight">
		<div class="wrapper">
			<h1>Senaste avsnittet</h1>
			<div class="row justify-content-center">
				<div class="grid-18 grid-lg-12">
					<?php $podcast->latest_episode(); ?>
					<?php $podcast->episodes_list(); ?>
					<?php $podcast->about(); ?>
				</div>
				<div class="grid-18 grid-lg-6">
					<aside class="<?php imns( 'sidebar' ); ?>">
						<?php $podcast->subscribe_widget(); ?>
						<?php the_content(); ?>
					</aside>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $podcast->player(); ?>
<?php get_footer(); ?>
