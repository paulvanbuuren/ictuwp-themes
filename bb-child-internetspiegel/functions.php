<?php

/**
 * Internetspiegel (Beaver Builder Child Theme) - functions.php
 * ----------------------------------------------------------------------------------
 * Zonder functions geen functionaliteit, he?
 * ----------------------------------------------------------------------------------
 * @author  Paul van Buuren
 * @license GPL-2.0+
 * @package bb-child-internetspiegel
 * @version 1.0.19
 * @desc.   Hover-kleuren voor CTA aangescherpt.
 * @link    http://wbvb.nl/themes/bb-child-internetspiegel/
 */



// Defines
define( 'INSP_CHILD_THEME_DIR',       get_stylesheet_directory() );
define( 'INSP_CHILD_THEME_URL',       get_stylesheet_directory_uri() );
define( 'CHILD_THEME_VERSION',        '1.0.19' );
define( 'INSP_TWITTERACCOUNT',        'InternetSpiegel' );
define( 'INSP_PRINT_TRIGGER_KEY',     'style' );
define( 'INSP_PRINT_TRIGGER_VALUE',   'printsheet' );
define( 'INSP_CTA_LABEL',             'calltoaction' );
define( 'INSP_CHILD_THEME_ADMIN_CSS', 'insp-admin-css' );


//========================================================================================================

// Classes
require_once 'includes/class-fl-child-theme.php';
require_once 'includes/acf-definitions.php';

// Actions
add_action( 'fl_head', 'FLChildTheme::stylesheet' );

//========================================================================================================

add_theme_support( 'post-thumbnails' );

add_image_size( 'vierkante-plaatjes', 450, 450, true );

//========================================================================================================

load_theme_textdomain( 'insp-tranlate', get_stylesheet_directory() . '/languages' );

//========================================================================================================

add_action( 'fl_body_close', 'rhswp_trackercode');

function rhswp_trackercode() {
  if ( 'www.internetspiegel.nl' == $_SERVER["HTTP_HOST"] || 'internetspiegel.nl' == $_SERVER["HTTP_HOST"] ) { 
        echo '<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["enableLinkTracking"]);
  _paq.push(["setLinkTrackingTimer", 750]);
  _paq.push(["enableHeartBeatTimer"]);
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);
  (function() {
    var u="//statistiek.rijksoverheid.nl/piwik/";
    _paq.push(["setTrackerUrl", u+"js/tracker.php"]);
    _paq.push(["setSiteId", 635]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0];
    g.type="text/javascript"; g.async=true; g.defer=true; g.src=u+"js/tracker.php"; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->';
    }
    else {
        if ( WP_DEBUG ) {
          echo '<!-- Geen Piwik: ' . $_SERVER["HTTP_HOST"] . '-->';
        }
    }
}

//========================================================================================================

//Social Buttons

function rhswp_socialbuttons( $post_info ) {
	
    $thelink    = urlencode(get_permalink($post_info->ID));
    $thetitle   = urlencode($post_info->post_title);
    $sitetitle  = urlencode(get_bloginfo('name'));
    $summary    = urlencode($post_info->post_excerpt);
    $comment    = '';
        

    $thetag     = 'a';
    $hrefattr   = 'href';
    $popup      = ' onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"';

    $mailshare  = _x('E-mail', 'share buttons', "insp-tranlate" );
    $mail_alt   = _x('Deel dit via e-mail', 'share buttons', "insp-tranlate" );
    $mailbody   = _x('Bekijk deze pagina eens', 'share buttons', "insp-tranlate" );

    $print      = '';


    $mail       = "<script type=\"text/javascript\">
<!-- Begin
function isPPC() {
if (navigator.appVersion.indexOf(\"PPC\") != -1) return true;
else return false;
}
if(isPPC()) {
document.write('<a class=\"mail\" HREF=\\\"mailto:\?subject\=" . $mailbody . ", ' + document.title + '?body=Link: ' + window.location + '\" onMouseOver=\"window.status=\'" . $mail_alt . "\'; return true\" title=\"" . $mail_alt . "\"><span class=\"visuallyhidden\">" . $mailshare . "<\/span><\/a>');
}
else { 
document.write('<a class=\"mail\" HREF=\\\"mailto:\?body\=" . $mailbody . ": ' + document.title + '. Link: ' + window.location + '\\\" onMouseOver=\"window.status=\\'" . $mail_alt . "\\'; return true\" title=\"" . $mail_alt . "\" rel=\"nofollow\"><span class=\"visuallyhidden\">" . $mailshare . "<\/span><\/a>');
}
// End -->
</script>";

  $print = '<a href="' . get_permalink($post_info->ID) . '?' . INSP_PRINT_TRIGGER_KEY . '=' . INSP_PRINT_TRIGGER_VALUE . '" target="_blank" class="print" onclick="window.print();return false;"><span class="visuallyhidden">print</span></a>';


  $share = '<li><' . $thetag . ' ' . $hrefattr . '="https://twitter.com/share?url=' . $thelink . '&via=' . INSP_TWITTERACCOUNT . '&text=' . $thetitle . '" class="twitter" data-url="' . $thelink . '" data-text="' . $thetitle . '" data-via="' . INSP_TWITTERACCOUNT . '"' . $popup . '><span class="visuallyhidden">' . _x('Deel op Twitter', 'share buttons', "insp-tranlate") . '</span></' . $thetag . '></li>
        <li><' . $thetag . ' class="linkedin" ' . $hrefattr . '="http://www.linkedin.com/shareArticle?mini=true&url=' . $thelink . '&title=' . $thetitle . '&summary=' . $summary . '&source=' . $sitetitle . '"' . $popup . '><span class="visuallyhidden">' . _x('Deel op LinkedIn', 'share buttons', "insp-tranlate") . '</span></' . $thetag . '></li>';
    
    if ( $thelink ) {
      return $comment . '<ul class="social-media share-buttons">' .$share . '<li>' .$mail . '</li><li>' .$print . '</li></ul>';    
            
    }
}


//========================================================================================================

// related posts

function rhswp_relatedposts( $post_info ) {

  global $post;

  if ( function_exists( 'get_field' ) ) {
  	
  	$related_posts_truefalse     = get_field('related_posts_truefalse');
  	
  	if ( 'ja' == $related_posts_truefalse ) {

    	$related_posts_list = get_field('related_posts_list');

      if( $related_posts_list ) {
        echo '<div class="related-posts"><h2>' . _x( 'Zie ook', 'gerelateerde berichten', "insp-tranlate" ) . '</h2>';
        echo '<div class="related-posts-list">';
        foreach( $related_posts_list as $p ): 
          if ( $post_info->ID == $p->ID ) {
          }
          else {
          	echo yaarplink( $p );
          }
        endforeach; 
        echo '</div>';
        echo '</div>';
      }
      else {
        echo '<div class="related-posts"><h2>' . _x( 'Geen gerelateerde berichten gevonden', 'gerelateerde berichten', "insp-tranlate" ) . '</h2></div>';
      }
  	}
  	elseif ( 'nee' !== $related_posts_truefalse ) {
    	// default waarde is leeg, dus alleen 'nee' indien de gebruiker dit expliciet heeft aangegeven.
      related_posts();
  	}
	}
}

//========================================================================================================

add_action( 'admin_footer', 'insp_adminfooter', 11 );

/**
 * Append the call to action content content button to the admin pages
 */
function insp_adminfooter() {

  global $pagenow;
  global $post;

  if ( ! is_admin() ) {
    return '';
  }
  if ( ! isset( $post->ID ) ) {
    return '';
  }

  wp_enqueue_style( INSP_CHILD_THEME_ADMIN_CSS, INSP_CHILD_THEME_URL . '/css/admin-css.css', false, CHILD_THEME_VERSION );
  do_action( INSP_CHILD_THEME_ADMIN_CSS );

  $my_saved_attachment_post_id = $post->ID;

  // Only run in post/page creation and edit screens
  if ( in_array( $pagenow, array( 'post.php', 'page.php', 'post-new.php', 'post-edit.php' ) ) ) {
    ?>
    <script type="text/javascript">
      jQuery(document).ready(function() {


			// Select files
			var file_frame;
			var wp_media_post_id  = wp.media.model.settings.post.id; // Store the old id
			var set_to_post_id    = <?php echo $my_saved_attachment_post_id; ?>; // Set this

			jQuery('#select_pdf_button').on('click', function( event ){

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					// Set the post ID to what we want
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
					// Open frame
					file_frame.open();
					return;
				} else {
					// Set the wp.media post id so the uploader grabs the ID we want when initialised
					wp.media.model.settings.post.id = set_to_post_id;
				}

				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: '<?php echo _x( 'Selecteer of upload een PDF', 'CTA knop', "insp-tranlate" ) ?>',
					button: {
						text: '<?php echo _x( 'Link naar dit bestand', 'CTA knop', "insp-tranlate" ) ?>',
					},
					multiple: false	// Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();

					// Do something with attachment.id and/or attachment.url here
					jQuery( '#insp_cta_url' ).val( attachment.url );

					// Restore the main post ID
					wp.media.model.settings.post.id = wp_media_post_id;
				});

					// Finally, open the modal
					file_frame.open();
			});

			// Restore the main ID when the add media button is pressed
			jQuery( 'a.add_media' ).on( 'click', function() {
  			console.log( ' click add_media ' + wp_media_post_id );
				wp.media.model.settings.post.id = wp_media_post_id;
			});

		    			
        
        jQuery('#insert_cta').on('click', function() {
          var insp_cta_titel    = jQuery('#insp_cta_titel').val();
          var insp_cta_tekst    = jQuery('#insp_cta_tekst').val();
          var insp_cta_url      = jQuery('#insp_cta_url').val();
          var insp_cta_url_text = jQuery('#insp_cta_url_text').val();

          jQuery( '#insert_cta_form_errormessages' ).text('');
          jQuery( '#insert_cta_form_errormessages' ).removeClass('error');
          jQuery( '#insp_cta_titel' ).removeClass('error');
          jQuery( '#insp_cta_tekst' ).removeClass('error');
          jQuery( '#insp_cta_url' ).removeClass('error');
          jQuery( '#insp_cta_url_text' ).removeClass('error');
          
          if (  ( insp_cta_titel === '' ) ||  ( insp_cta_titel == null ) ) {
            jQuery( '#insert_cta_form_errormessages' ).append('<?php echo _x( 'Voer een titel in', 'CTA errors', "insp-tranlate" ) ?>');
            jQuery( '#insert_cta_form_errormessages' ).addClass('error');
            jQuery( '#insp_cta_titel' ).addClass('error');
            return false;
          } 
          if (  ( insp_cta_tekst === '' ) ||  ( insp_cta_tekst == null ) ) {
            jQuery( '#insert_cta_form_errormessages' ).append('<?php echo _x( 'Voer tekst in', 'CTA errors', "insp-tranlate" ) ?>');
            jQuery( '#insert_cta_form_errormessages' ).addClass('error');
            jQuery( '#insp_cta_tekst' ).addClass('error');
            return false;
          } 
          if (  ( insp_cta_url === '' ) ||  ( insp_cta_url == null ) ) {
            jQuery( '#insert_cta_form_errormessages' ).append('<?php echo _x( 'Selecteer een bestand of voer een URL in', 'CTA errors', "insp-tranlate" ) ?>');
            jQuery( '#insert_cta_form_errormessages' ).addClass('error');
            jQuery( '#insp_cta_url' ).addClass('error');
            return false;
          } 
          if (  ( insp_cta_url_text === '' ) ||  ( insp_cta_url_text == null ) ) {
            jQuery( '#insert_cta_form_errormessages' ).append('<?php echo _x( 'Voer een tekst in voor de CTA-knop', 'CTA errors', "insp-tranlate" ) ?>');
            jQuery( '#insert_cta_form_errormessages' ).addClass('error');
            jQuery( '#insp_cta_url_text' ).addClass('error');
            return false;
          } 
          
          window.send_to_editor('<div class="<?php echo INSP_CTA_LABEL ?> fl-cta-wrap fl-cta-inline"><div class="fl-cta-text"><h3 class="fl-cta-title">' + insp_cta_titel + '</h3><p class="fl-cta-text-content">' + insp_cta_tekst + '</p></div><div class="fl-cta-button"><div class="fl-button-wrap fl-button-width-full"><a href="' + insp_cta_url + '" target="_blank" class="fl-button" role="button"><span class="fl-button-text">' + insp_cta_url_text + '</span></a></div></div></div>');
          tb_remove();
        })
      });
    </script>
    
    <div id="insert_cta_form" style="display: none;">
    <div class="wrap">
    <?php
    
    echo "<h3>" . _x( "Gegevens voor je call-to-action button", 'CTA knop', "insp-tranlate" ) . "</h3>";
    echo '<div class="divider" id="insert_cta_form_errormessages" role="alert">';
    echo "</div>";
    echo "<div class='divider'>";
    echo "<label for='insp_cta_titel'>" . _x( "Titel", 'CTA knop', "insp-tranlate" ) . "</label>";
    echo "<input type='text' id='insp_cta_titel' name='insp_cta_titel' value='Wilt u meer weten?'>";
    echo "</div>";
    echo "<div class='divider'>";
    echo "<label for='insp_cta_tekst'>" . _x( "Tekst", 'CTA knop', "insp-tranlate" ) . "</label>";
    echo "<textarea id='insp_cta_tekst' name='insp_cta_tekst' rows='8'></textarea>";
    echo "</div>";
    echo "<div class='divider'>";
    echo "<label for='insp_cta_url'>" . _x( "Link voor de CTA", 'CTA knop', "insp-tranlate" ) . "</label>";
    echo '<input type="text" name="insp_cta_url" id="insp_cta_url" value="">';
    echo '<input id="select_pdf_button" type="button" class="button" value="' . _x( "Selecteer een PDF", 'CTA knop', "insp-tranlate" ) . '" />';
    echo "<small>" . _x( "Je kunt een link invoegen of met de knop een PDF uit de mediabibliotheek selecteren.", 'CTA knop', "insp-tranlate" ) . "</small>";
    echo "</div>";
    echo "<div class='divider'>";
    echo "<label for='insp_cta_url_text'>" . _x( "Tekst voor de CTA-link", 'CTA knop', "insp-tranlate" ) . "</label>";
    echo "<input type='text' id='insp_cta_url_text' name='insp_cta_url_text' value='Download whitepaper'>";
    echo "</div>";
    echo "<button class='button primary' id='insert_cta'>" . _x( "Voeg CTA in", 'CTA knop', "insp-tranlate" ) . "</button>";

    ?>
    </div>
    </div>
    
    <?php
  }

}

//========================================================================================================

// related posts

function yaarplink( $post_info ) {
  
  global $post;
  
  $currentexcerpt = get_the_excerpt( $post );
  
  $size = 'thumbnail';
  
  if ( has_post_thumbnail( $post_info ) ) {
    $image = get_the_post_thumbnail( $post_info->ID, $size );
  }
  else {
    $image = '<img width="150" height="150" src="' . INSP_CHILD_THEME_URL . '/images/default-thumb.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="">';
  }
  
  $theexcerpt = get_the_excerpt( $post_info );
  if ( $theexcerpt === $currentexcerpt ) {
    $theexcerpt  = get_words( wp_strip_all_tags( $post_info->post_content ), 40 ) . ' [...]';
  }

  return '<div class="related-post"><a href="' . get_permalink( $post_info->ID ) . '"><div class="post-thumbnail">' . $image . '</div><div class="post-excerpt"><h4>' . get_the_title( $post_info->ID ) . '</h4><p>' . $theexcerpt . '</p></a></div></div>';
}

//========================================================================================================

add_action( 'wp_print_styles', 'tj_deregister_yarpp_header_styles' );

function tj_deregister_yarpp_header_styles() {
   wp_dequeue_style('yarppWidgetCss');
   // Next line is required if the related.css is loaded in header when disabled in footer.
   wp_deregister_style('yarppRelatedCss'); 
}

//========================================================================================================

add_action( 'wp_footer', 'tj_deregister_yarpp_footer_styles' );

function tj_deregister_yarpp_footer_styles() {
   wp_dequeue_style('yarppRelatedCss');
}  

//========================================================================================================

function admin_append_editor_styles() {
  add_editor_style(INSP_CHILD_THEME_URL . '/css/admin-css.css?v=' . CHILD_THEME_VERSION);
}

add_action( 'init', 'admin_append_editor_styles' );

//========================================================================================================

add_filter( 'media_buttons_context', 'admin_insert_cta_button' );

/**
 * Append the 'Add video' button to selected admin pages
 */
function admin_insert_cta_button( $context ) {

  if ( ! current_user_can( 'edit_others_posts' ) ) {
    return $context;
  }
  
  global $pagenow;
  
  $posttype = 'post';
  
  if ( isset( $_GET['post'] ) ) {
    $posttype = get_post_type( $_GET['post'] );
  }
  if ( isset( $_GET['post_type'] ) ) {
    $posttype = $_GET['post_type'];
  }
  
  $available_post_types = get_post_types();
  $allowed_post_types   = array();
  
  foreach ( $available_post_types as $available_post_type ) {
    array_push( $allowed_post_types, $available_post_type );
  }
  
  if ( ( in_array( $pagenow, array( 'post.php', 'page.php', 'post-new.php', 'post-edit.php' ) ) ) && ( in_array( $posttype, $allowed_post_types ) ) ) {
    $context .= '<a href="#TB_inline?&inlineId=insert_cta_form" class="thickbox button" title="' .
    _x( "Gegevens voor je call-to-action button", 'CTA knop', "insp-tranlate" )  .
    '"><span class="wp-media-buttons-icon" style="color: white; font-weight: bold; background: #00850b url(' . INSP_CHILD_THEME_URL . '/images/internetspiegel-cta.svg); background-repeat: no-repeat; background-size: 16px 16px; background-position: center center;"></span> ' .
    _x( "Voeg Call To Action toe", 'CTA knop', "insp-tranlate" ) . '</a>';
  }
  
  return $context;


}

//========================================================================================================

function get_words($sentence, $count = 10) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}

//========================================================================================================


/**
 * Dequeue the jQuery UI script.
 *
 * Hooked to the wp_print_scripts action, with a late priority (100),
 * so that it is after the script was enqueued.
 */
function wpdocs_dequeue_script() {

   wp_dequeue_script( 'fl-automator' );

$timestamp = time();

   wp_enqueue_script('fl-automator-insp', INSP_CHILD_THEME_URL . '/js/min/bb-theme-internetspiegel-min.js', array(), CHILD_THEME_VERSION, true);
//   wp_enqueue_script('fl-automator-insp', INSP_CHILD_THEME_URL . '/js/bb-theme-internetspiegel.js', array(), CHILD_THEME_VERSION . '-' . $timestamp, true);

}

// disabled for now: v1.0.19
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );


//========================================================================================================

