<?php
/**
 * The template for displaying Comments
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<div class="comment-area">
			<h2 class="comments-title">
				<?php
					printf( _nx( '1 comment', '%1$s comments', get_comments_number(), '', '' ),
						number_format_i18n( get_comments_number() ), '' );
				?>
			</h2>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'       => 'li',
						'short_ping'  => true,
						'avatar_size' => 74,
						'callback'    => 'mytheme_comment'
					) );
				?>
			</ol><!-- .comment-list -->

			<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<nav class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'kichu' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'kichu' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'kichu' ) ); ?></div>
			</nav><!-- .comment-navigation -->
			<?php endif; // Check for comment navigation ?>
		</div>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<?php if ( is_single() ) : ?>
				<p class="no-comments"><?php _e( 'Comments are closed.' , 'kichu' ); ?></p>
			<?php elseif ( is_page() ) : ?>
			<?php endif; ?>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
<!-- extra style for link on page that has comment -->
<style>
	a {
		color: #A3BE8C;
	}
	a:hover {
		color: #719A6A;
	}
</style>
