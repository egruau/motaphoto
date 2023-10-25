<div class="photo-block-container">
    <div class="photo-block"> 
        <div class="photo-block__picture">
            <img src="<?php the_post_thumbnail_url(); ?>" class="photo-block__picture__img">
        </div>
        <?php get_template_part('templates-parts/photo-hover', 'hover');?>
    </div>
</div>