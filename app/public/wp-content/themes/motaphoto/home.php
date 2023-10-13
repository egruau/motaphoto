<?php get_header(); ?>

<?php 
$random_image = get_posts(array(
    'post_type' => 'photo', 
    'posts_per_page' => 1, 
    'orderby' => 'rand', 
));

if ($random_image) {
    $post = $random_image[0];
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full'); 
}
?>

<div class="home__hero hero-background" style="background-image: url('<?php echo $thumbnail_url ?>');"> 
    <h1 class="home__hero__title">Photographe Event</h1>
</div>

<div class="home__selection">
    <div class="home__selection__filters">
        <select name="categorie" id="categorie" class="home__selection__filters__categories filter-label">
            <option value="" disabled selected class="home__selection__filters__categories__title">Catégorie</option>
            <?php 
            $filterCategories = get_terms(array(
                'taxonomy' => 'categories',
                'hide_empty' => false,
            ));
        
            if (!empty($filterCategories)) {
                foreach ($filterCategories as $filterCategory) {
                    echo '<option class="home__selection__filters__categories__category category-' . esc_html($filterCategory->name) . ' ">' . esc_html($filterCategory->name) . '</option>';
                }
            }     
            ?>
        </select>
        <select name="format" id="format" class="home__selection__filters__formats filter-label">
            <option value="" disabled selected class="home__selection__filters__formats__title">Format</option>
            <?php 
            $filterFormats = get_terms(array(
                'taxonomy' => 'format',
                'hide_empty' => false,
            ));
        
            if (!empty($filterFormats)) {
                foreach ($filterFormats as $filterFormat) {
                    echo '<option class="home__selection__filters__formats__format format-' . esc_html($filterFormat->name) . ' ">' . esc_html($filterFormat->name) . '</option>';
                }
            }     
            ?>
        </select>
    </div>
    <select class="home__selection__sort filter-label">
        <option value="" disabled selected class="home__selection__sort__title">Trier par</option>
        <option value="" class="">Des plus récentes aux plus anciennes</option>
        <option value="" class="">Des plus anciennes aux plus récentes</option>
        <
        <!-- TRI -->
    </select>
</div>

<div class="home__content">
    <?php
$custom_query = new WP_Query([
                'post_type' => 'photo',
                'posts_per_page' => 12,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => 1,
            ]);
        
    ?>
    <div class="home__content__articles">
        <?php
        if ($custom_query->have_posts()) {
            while ($custom_query->have_posts()) {
                $custom_query->the_post();
                echo get_template_part('templates-parts/photo_block');
            }
            wp_reset_postdata();
        } else {
            echo "aucun article trouvé";
        }
        ?>

    </div>


    <button class="home__content__more submit-button">
        Chargez plus
    </button>

</div>


<?php get_footer(); ?>