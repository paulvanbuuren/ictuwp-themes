<?php

/**
 * Internetspiegel (Beaver Builder Child Theme) - comments.php
 * ----------------------------------------------------------------------------------
 * code for comments
 * ----------------------------------------------------------------------------------
 * @author  Paul van Buuren
 * @license GPL-2.0+
 * @package bb-child-internetspiegel
 * @version 1.0.12
 * @desc.   POT and PO added for translations. Temp. disabled new menu style (css and js).
 * @link    http://wbvb.nl/themes/bb-child-internetspiegel/
 */



if(!comments_open() && '0' == get_comments_number()) {
	return;
}
if(post_password_required()) {
	return;
}

?>
<div class="fl-comments">
	
	<?php do_action( 'fl_comments_open' ); ?>

	<?php if(have_comments()) : ?>
	<div class="fl-comments-list">

		<h3 class="fl-comments-list-title"><?php

			if ( $num_comments = get_comments_number() ) {

				printf(
					_nx( '1 Comment', '%d Comments', get_comments_number(), 'Comments list title.', 'insp-tranlate' ),
					number_format_i18n( $num_comments )
				);

			} else {

				_e( 'No Comments', 'insp-tranlate' );

			}

		?></h3>

		<ol id="comments">
		<?php wp_list_comments(array('callback' => 'FLTheme::display_comment')); ?>
		</ol>

		<?php if(get_comment_pages_count() > 1) : ?>
		<nav class="fl-comments-list-nav clearfix">
			<div class="fl-comments-list-prev"><?php previous_comments_link() ?></div>
			<div class="fl-comments-list-next"><?php next_comments_link() ?></div>
		</nav>
		<?php endif; ?>

	</div>
	<?php endif; ?>
	<?php 
	
	comment_form( array(
		'id_form'               => 'fl-comment-form',
		'class_form'            => 'fl-comment-form',
		'id_submit'             => 'fl-comment-form-submit',
		'class_submit'          => 'btn btn-primary',
		'name_submit'           => 'submit',
		'label_submit'          => __( 'Submit Comment', 'insp-tranlate' ),
		'title_reply'           => _x( 'Leave a Comment', 'Respond form title.', 'insp-tranlate' ),
		'title_reply_to'        => __( 'Leave a Reply', 'insp-tranlate' ),
		'cancel_reply_link'     => __( 'Cancel Reply', 'insp-tranlate' ),
		'format'                => 'xhtml',
		'comment_notes_before'  => '',
		'comment_notes_after'   => '',
		
		'comment_field'         => '<label for="comment_message">' . _x( 'Comment', 'Comment form label: comment content.', 'insp-tranlate' ) . '</label>
									<textarea name="comment" id="comment_message" class="form-control" cols="60" rows="8"></textarea><br />',
									
		'must_log_in'           => '<p>' . sprintf(
										_x( 'You must be <a%s>logged in</a> to post a comment.', 'Please, keep the HTML tags.', 'insp-tranlate' ),
										' href="' . esc_url( home_url( '/wp-login.php' ) ) . '?redirect_to=' . urlencode( get_permalink() ) . '"'
									) . '</p>',
									
		'logged_in_as'          => '<p>' . sprintf( 
										__( 'Logged in as %s.', 'insp-tranlate' ), 
										'<a href="' . esc_url( home_url( '/wp-admin/profile.php' ) ) . '">' . $user_identity . '</a>' 
									) . ' <a href="' . wp_logout_url( get_permalink() ) . '" title="' . __( 'Log out of this account', 'insp-tranlate' ) . '">' . __( 'Log out &raquo;', 'insp-tranlate' ) . '</a></p>',
									
		'fields'                => apply_filters( 'comment_form_default_fields', array(
			
			'author'                 => '<label for="comment_author">' . _x( 'Name', 'Comment form label: comment author name.', 'insp-tranlate' ) . ( $req ? __( ' (required)', 'insp-tranlate' ) : '' ) . '</label>
										<input type="text" name="author" id="comment_author" class="form-control" value="' . $comment_author . '"' . ( $req ? ' aria-required="true"' : '' ) . ' /><br />',
			
			'email'                  => '<label for="comment_email">' . _x( 'Email (will not be published)', 'Comment form label: comment author email.', 'insp-tranlate' ) . ( $req ? __( ' (required)', 'insp-tranlate' ) : '' ) . '</label>
										<input type="text" name="email" id="comment_email" class="form-control" value="' . $comment_author_email . '"' . ( $req ? ' aria-required="true"' : '' ) . ' /><br />',
			
			'url'                    => '<label for="comment_url">' . _x( 'Website', 'Comment form label: comment author website.', 'insp-tranlate' ) . '</label>
										<input type="text" name="url" id="comment_url" class="form-control" value="' . $comment_author_url . '" /><br />'
		) ),
	) ); 
	
	?>
	<?php do_action( 'fl_comments_close' ); ?>
</div>