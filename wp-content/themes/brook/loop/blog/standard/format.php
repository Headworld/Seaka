<?php if ( has_post_thumbnail() ) { ?>
	<div class="post-feature post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php
			Brook_Image::the_post_thumbnail( array(
				'size' => '450x340',
			) );
			?>
		</a>
	</div>
<?php } ?>
