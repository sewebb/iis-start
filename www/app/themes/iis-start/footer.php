<?php do_action( 'iis_pre_footer' ); ?>
		</div>

		<?php
		if ( class_exists( 'Iis_Footer' ) ) :
			do_action( 'iis_footer' );
		endif;
		?>

		<?php wp_footer(); ?>
	</body>
</html>
