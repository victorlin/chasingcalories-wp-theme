<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Template Name: Page - Home
 *
 * Full width page template without sidebar or page header.
 *
 * This is the template for full width pages with no sidebar, no container, and
 * no page header. This page truly stretches the full width of the browser window. 
 * You should set a <div class="container"> before your content to keep it in line 
 * with the rest of the site content.
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<?php //get_template_part( 'content', 'header' ); ?>

<div id="primary" class="content-area-wide">
    <main id="main" class="site-main" role="main">
    
        <?php /* DISPLAY THE PAGE CONTENT FIRST */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php //get_template_part( 'content', 'page-fullwidth' ); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-content">

                    <?php the_content(); ?>
        
                    <?php get_template_part( 'content', 'recent-posts' ); ?>

                    <?php get_template_part( 'content', 'page-nav' ); ?>

                    <?php
                        $myposts = get_posts();
                        foreach($myposts as $thepost) :
                            ?>

                         <?php endforeach; ?>

                    <?php edit_post_link( __( '<span class="glyphicon glyphicon-edit"></span> Edit', 'flat-bootstrap' ), '<div class="container"><footer class="entry-meta"><div class="edit-link">', '</div></div></footer>' ); ?>

                </div><!-- .entry-content -->
    
            </article><!-- #post-## -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() ) :
            ?>
                <div class="comments-wrap">
                <div class="container">
                <?php comments_template(); ?>
                </div><!-- .container -->
                </div><!-- .comments-wrap" -->
            <?php endif; ?>

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>

<?php get_footer(); ?>

<script>
$('.dropdown-menu').on('click', function(event) {
    $(this).parent().toggleClass('open');
});

$(document).on('click', function (e) {
    if (!$('.dropdown-menu').is(e.target) && $('.dropdown-menu').has(e.target).length === 0 && $('.open').has(e.target).length === 0) {
        $('.dropdown-menu').removeClass('open');
    }
});