<?php
/*
 * Search Template File
 */
get_header(); ?>
<section>
    <!--Breadcrumb  Part Start-->
    <div class="breadcumb-bg">
        <div class="webpage-container container">
            <div class="site-breadcumb">
                <h1><?php esc_html_e('Search results for', 'advent');
echo ' : ' . get_search_query(); ?></h1>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li>
<?php if (function_exists('advent_custom_breadcrumbs')) advent_custom_breadcrumbs(); ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>    
    <!--Breadcrumb Part End-->
    <!-- Blog start -->
    <div class="webpage-container">
        <div class="blog-main"> 
            <div class="col-md-9 col-sm-8">
                <?php if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                        <div class="blog-details ">
                            <div class="blog-head">
                                <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a>
                                <ul><?php advent_entry_meta(); ?></ul>
                            </div>
                                <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail( 'large', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?></a>
                               <?php endif; ?>
                            <div class="blog-info">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords', 'advent'); ?>.</p>
                    <div class="row">
                        <div class="col-sm-12 search-formmain">
    <?php get_search_form(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="post-pagination col-md-12 no-padding">
                    <div class="page-links">
                        <?php // Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => __('Previous', 'advent'),
                            'next_text' => '&nbsp;&nbsp;' . __(' Next', 'advent')
                        )); ?></div>
                </div>
            </div>	
<?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!-- Blog End -->
</section>
<?php get_footer(); ?>