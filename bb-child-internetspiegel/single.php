<?php

/**
 * Internetspiegel (Beaver Builder Child Theme) - single.php
 * ----------------------------------------------------------------------------------
 * used for display blog posts
 * ----------------------------------------------------------------------------------
 * @author  Paul van Buuren
 * @license GPL-2.0+
 * @package bb-child-internetspiegel
 * @version 1.0.4
 * @desc.   ACF capsulated
 * @link    http://wbvb.nl/themes/bb-child-internetspiegel/
 */

?>
  
<?php get_header(); 

$show_thumbs = FLTheme::get_setting('fl-posts-show-thumbs');

if(has_post_thumbnail() && !empty($show_thumbs)) : 
  if($show_thumbs == 'above-title') : 
  
?>

<div class="spread">
	<div class="homepage-hero-module">
	    <div class="video-container">
	        <div class="poster">
      			<?php the_post_thumbnail('large', array('itemprop' => 'image')); ?>
	        </div>
	    </div>
	</div>
	<?php 

  if ( function_exists( 'get_field' ) ) {
  	
  	$single_inleiding     = get_field('single_inleiding');
  	$single_citaat        = get_field('single_citaat');
  	$single_citaat_auteur = get_field('single_citaat_auteur');
  	
  	if ( $single_inleiding ) {
    	?>
    	<section>
      	<div>
          <?php echo get_the_category_list() ?>
          <?php
          if ( $single_citaat ) {
            if ( $single_citaat_auteur ) {
              echo '<p class="auteur">' . $single_citaat_auteur . '</p>';
            }
            echo '<h2><q>' . $single_citaat . '</q></h2>';
          }
          if ( $single_inleiding ) {
        		echo '<p class="inleiding">' . $single_inleiding .'</p>';
          }
          ?>    	
      	</div>
    	</section>
    	<?php
  	}
	}
  ?>
</div>

<?php    
  
  endif;
endif;

?>

<div class="fl-content-full container">
	<div class="row">
		<div class="fl-content col-md-12">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'single'); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>