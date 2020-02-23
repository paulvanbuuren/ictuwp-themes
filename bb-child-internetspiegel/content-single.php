<?php

/**
 * Internetspiegel (Beaver Builder Child Theme) - content-single.php
 * ----------------------------------------------------------------------------------
 * content part for single posts
 * ----------------------------------------------------------------------------------
 * @author  Paul van Buuren
 * @license GPL-2.0+
 * @package bb-child-internetspiegel
 * @version 1.0.12
 * @desc.   POT and PO added for translations. Temp. disabled new menu style (css and js).
 * @link    http://wbvb.nl/themes/bb-child-internetspiegel/
 */

    
$show_thumbs = FLTheme::get_setting('fl-posts-show-thumbs');

global $post;

?>


<article <?php post_class( 'fl-post' ); ?> id="fl-post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/BlogPosting">


	<header class="fl-post-header">
		<h1 class="fl-post-title" itemprop="headline">
			<?php the_title(); ?>
			<?php edit_post_link( _x( 'Edit', 'Edit post link text.', 'insp-tranlate' ) ); ?>
		</h1>
		<?php FLTheme::post_top_meta(); ?>
		<?php echo rhswp_socialbuttons( $post ); ?>


	</header><!-- .fl-post-header -->

	<?php if(has_post_thumbnail() && !empty($show_thumbs)) : ?>
		<?php if($show_thumbs == 'above') : ?>
		<div class="fl-post-thumb">
			<?php the_post_thumbnail('large'); ?>
		</div>
		<?php endif; ?>

		<?php if($show_thumbs == 'beside') : ?>
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<div class="fl-post-thumb">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
			</div>
			<div class="col-md-9 col-sm-9">
		<?php endif; ?>
	<?php endif; ?>
	<div class="fl-post-content clearfix fl-row-fixed-width" itemprop="text">
		<?php

		the_content();



		wp_link_pages( array(
			'before'         => '<div class="fl-post-page-nav">' . _x( 'Pages:', 'Text before page links on paginated post.', 'insp-tranlate' ),
			'after'          => '</div>',
			'next_or_number' => 'number'
		) );

		?>
	</div><!-- .fl-post-content -->

	<?php if(has_post_thumbnail() && $show_thumbs == 'beside') : ?>
		</div>
	</div>
	<?php endif; ?>
<div style="overflow: hidden; clear: both;">
	<?php echo rhswp_socialbuttons( $post ); ?>
	<?php FLTheme::post_bottom_meta(); ?>
</div>	
	<?php echo rhswp_relatedposts( $post ); ?>
	<?php FLTheme::post_navigation(); ?>
	<?php comments_template(); ?>


</article>
<!-- .fl-post -->

