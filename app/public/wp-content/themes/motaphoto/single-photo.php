<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Motaphoto
 * @since Motaphoto 1.0
 */

get_header();

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="single-post-content">
    <div class="single-post-content__photo">
        <div class="single-post-content__photo__infos">
            <h2 class="single-post-content__photo__infos__title"> <?php the_title()?></h2>
            <p class="single-post-content__photo__infos__txt"> référence : <span id="reference-photo"><?php echo get_field('reference'); ?></span></p>
            <p class="single-post-content__photo__infos__txt"> catégorie : <?php
                    $categories = get_the_terms(get_the_ID(), 'categories');
                    if ($categories) {
                        foreach ($categories as $category) {
                            echo esc_html($category->name);
                        }
                    }
                ?></p>
            <p class="single-post-content__photo__infos__txt"> format : <?php
                    $formats = get_the_terms(get_the_ID(), 'format');
                    if ($formats) {
                        foreach ($formats as $format) {
                            echo esc_html($format->name);
                        }
                    }
                ?></p>
            <p class="single-post-content__photo__infos__txt"> type : <?php echo get_field('type'); ?></p>
            <p class="single-post-content__photo__infos__txt"> année : <?php echo get_the_time('Y'); ?></p>
        </div>
        <div class="single-post-content__photo__picture">
            <img class="single-post-content__photo__picture__img" src="<?php the_post_thumbnail_url(); ?>" alt="">
        </div>
    </div>
    <div class="single-post-content__footer">
        <div class="single-post-content__footer__contact">
            <p> Cette photo vous intéresse ?</p>
            <button class="single-post-content__footer__contact__button submit-button">
                Contact
            </button>
        </div>
        <div class="single-post-content__footer__nav">
            Navigation 
        </div>
    </div>
</div>
<?php endwhile;
endif; ?>
<?php 
get_footer() ?>