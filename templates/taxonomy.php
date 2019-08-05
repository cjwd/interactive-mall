<?php
/**
 * The template for displaying store taxonomy
 *
 * @package Imm
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

  <?php
    /**
     * imm_before_main_content hook.
     *
     * @hooked imm_output_content_wrapper - 10 (outputs opening divs for the content)
     */
    do_action( 'imm_before_main_content' );
  ?>

    <?php if( have_posts() ) : ?>
      <header class="page-header">
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
      </header>
    <?php endif; ?>

    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          ?>
        </header>

        <?php if ( '' !== get_the_post_thumbnail() ) : ?>
          <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('thumbnail'); ?>
            </a>
          </div><!-- .post-thumbnail -->
        <?php endif; ?>

        <div class="entry-content">
          <?php
          /* translators: %s: Name of current post */
          the_content(
            sprintf(
              __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'imm' ),
              get_the_title()
            )
          );
          ?>
        </div><!-- .entry-content -->
      </article>


    <?php endwhile; // end of the loop.
      posts_pagination();
    ?>

  <?php
    /**
     * imm_after_main_content hook.
     *
     * @hooked imm_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'imm_after_main_content' );
  ?>

<?php get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */