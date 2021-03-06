<?php 
	$slider_display = get_theme_mod( 'muso_display_carousel_setting', 0);
	$slider_cat = get_theme_mod( 'muso_carousel_category_setting'); 
?>
	
<?php
//query posts
$args =	array(
	'offset'           => 0,
	'category_name'    => $slider_cat,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true
);

$the_query = new WP_Query( $args );

?>
<?php if($slider_display == 1){ ?> 
<div id="featured-post">
    <div class="flexslider carousel">
        
        <ul class="slides">
        <!-- items mirrored twice, total of 12 -->
        <?php if ($the_query->have_posts()) : ?>           
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?> 
                
                    <?php if(has_post_thumbnail()){ ?>
                        <li>
                            <div class="featured-post-thumbnail">
                                <a href="<?php the_permalink('') ?>">
                                    <?php the_post_thumbnail('muso-featured-thumbnail'); ?>
                                </a>
                            </div>
                        </li>
                    <?php }?>     
                    
            <?php endwhile; ?> 
        <?php endif; ?> 
    <?php wp_reset_postdata(); ?>
    
      </ul>
    
    </div>
</div>
<?php } ?>     
