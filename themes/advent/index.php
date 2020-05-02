<?php
/**
 * The main template file
 * */
get_header();
$advent_options = get_option('advent_theme_options'); ?>
<section>
    <!--Breadcrumb  Part Start-->
    <div class="breadcumb-bg">
        <div class="webpage-container container">
            <div class="site-breadcumb">
                <h1><?php esc_html_e('Blog', 'advent'); ?></h1>
            </div>
        </div>
    </div>    
    <!--Breadcrumb Part End-->
    <!-- Blog Posts start -->
    <div class="webpage-container">
        <div class="blog-main">
            <div class="col-md-9 col-sm-8">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="blog-details ">
                        <div class="blog-head">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a>
                            <ul><?php advent_entry_meta(); ?></ul>
                        </div>
                        <?php if ( has_post_thumbnail() ) : ?>
							<div class="blog-img">
								<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail( 'large', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?></a>
							</div>
						<?php endif; ?>
                        <div class="blog-info">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php endwhile; ?> 
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
<!-- Blog Posts End -->
</section>
<?php get_footer(); ?>