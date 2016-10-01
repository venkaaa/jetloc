<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php if ( comments_open() ) : ?><div id="reviews"><?php

	echo '<div id="comments">';

	$title_reply = '';

	if ( have_comments() ) :

		echo '<ol class="commentlist">';

		wp_list_comments( array( 'callback' => 'woocommerce_comments' ) );

		echo '</ol>';

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Previous', GETTEXT_DOMAIN ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Next <span class="meta-nav">&rarr;</span>', GETTEXT_DOMAIN ) ); ?></div>
			</div>
		<?php endif;

		echo '<p class="add_review"><a href="#review_form" class="inline show_review_form btn btn-default btn-sm title="' . __( 'Add Your Review', GETTEXT_DOMAIN ) . '"><span class="halflings paperclip halflings-icon"></span>' . __( 'Add Review', GETTEXT_DOMAIN ) . '</a></p>';

		$title_reply = __( 'Add a review', GETTEXT_DOMAIN );

	else :

		$title_reply = __( 'Be the first to review', GETTEXT_DOMAIN ).' &ldquo;'.$post->post_title.'&rdquo;';

		echo '<p class="noreviews">'.__( 'There are no reviews yet, would you like to <a href="#review_form" class="inline show_review_form">submit yours</a>?', GETTEXT_DOMAIN ).'</p>';

	endif;

	$commenter = wp_get_current_commenter();

	echo '</div><div id="review_form_wrapper"><div id="review_form">';

	$comment_form = array(
		'title_reply' => $title_reply,
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => array(
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', GETTEXT_DOMAIN ) . '</label> ' . '<span class="required">*</span>' .
			            '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', GETTEXT_DOMAIN ) . '</label> ' . '<span class="required">*</span>' .
			            '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
		),
		'label_submit' => __( 'Submit Review', GETTEXT_DOMAIN ),
		'logged_in_as' => '',
		'comment_field' => ''
	);

	if ( get_option('woocommerce_enable_review_rating') == 'yes' ) {

		$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Rating', GETTEXT_DOMAIN ) .'</label><select name="rating" id="rating">
			<option value="">'.__( 'Rate&hellip;', GETTEXT_DOMAIN ).'</option>
			<option value="5">'.__( 'Perfect', GETTEXT_DOMAIN ).'</option>
			<option value="4">'.__( 'Good', GETTEXT_DOMAIN ).'</option>
			<option value="3">'.__( 'Average', GETTEXT_DOMAIN ).'</option>
			<option value="2">'.__( 'Not that bad', GETTEXT_DOMAIN ).'</option>
			<option value="1">'.__( 'Very Poor', GETTEXT_DOMAIN ).'</option>
		</select></p>';

	}

	$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', GETTEXT_DOMAIN ) . '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>' . $woocommerce->nonce_field('comment_rating', true, false);

	comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );

	echo '</div></div>';

?><div class="clear"></div></div>
<?php endif; ?>