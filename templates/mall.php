<?php
/**
 * The template for displaying interactive 3D mall map
 *
 * @package Imm
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

  <?php
    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action( 'imm_before_main_content' );
  ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php imm_get_template_part( 'directory' ); ?>

    <?php endwhile; // end of the loop. ?>

  <?php
    /**
     * woocommerce_after_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'imm_after_main_content' );
  ?>

  <?php
    /**
     * woocommerce_sidebar hook.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    do_action( 'imm_sidebar' );
  ?>

<?php get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */