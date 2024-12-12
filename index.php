<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @link       https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    Arke
 * @copyright  Copyright (c) 2018, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php get_template_part("header") ?>

	<div class="site-content">
		<div id="content-area" class="content-area">
			<?php

			$args = [
				'post_type' => 'post',
				'posts_per_page' => -1,
				'orderby' => 'date',
				'order' => 'ASC',
			];

			$query = new WP_Query($args);

			if ($query->have_posts()):

				while ($query->have_posts()):

					$query->the_post();
					
					get_template_part('content');

					// Comments
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;

				endwhile;

			else:
				get_template_part('content', 'none');
			endif;
			?>

		</div><!-- .content-area -->
	</div><!-- .site-content -->

	<?php if (get_page_by_path('archives')): ?>
		<footer class="site-footer">
			<a href="<?php echo esc_url(site_url('archives')); ?>"><?php esc_html_e('View All Posts &rarr;', 'arke'); ?></a>
		</footer>
	<?php else: ?>
		<?php arke_the_posts_navigation(); ?>
	<?php endif; ?>

	<?php wp_footer(); ?>

</body>

</html>