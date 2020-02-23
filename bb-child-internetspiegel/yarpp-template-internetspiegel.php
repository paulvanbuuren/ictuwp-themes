<?php

/**
 * Internetspiegel (Beaver Builder Child Theme) - yarpp-template-internetspiegel.php
 * ----------------------------------------------------------------------------------
 * Layout voor YARPP (gerelateerde berichten)
 * ----------------------------------------------------------------------------------
 * @author  Paul van Buuren
 * @license GPL-2.0+
 * @package bb-child-internetspiegel
 * @version 1.0.14
 * @desc.   Translation bugs.
 * @link    http://wbvb.nl/themes/bb-child-internetspiegel/
 */

/*
YARPP Template: Internetspiegel related links
Author: Paul van Buuren
Description: Opmaak voor gerelateerde links voor internetspiegel.nl
*/

if (have_posts()):
  echo '<div class="related-posts"><h2>' . _x( 'Zie ook', 'gerelateerde berichten', "insp-tranlate" ) . ':</h2>';
  echo '<div class="related-posts-list">';
	while (have_posts()) : the_post();
  	echo yaarplink( $post );
	endwhile; 
  echo '</div>';
  echo '</div>';
endif; ?>
