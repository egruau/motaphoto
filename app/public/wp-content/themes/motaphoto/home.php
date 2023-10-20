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

<div class="home__content">
    <div class="home__content__selection">
        <div class="home__content__selection__filters">
            <div class="home__content__selection__filters__categories">
                <ul name="categorie" id="categorie" class="home__content__selection__filters__categories__menu filter-label">
                    <li value="" selected class="home__content__selection__filters__categories__menu__title filters__titles">Catégorie
                    </li>
                    <?php 
                    $filterCategories = get_terms(array(
                        'taxonomy' => 'categories',
                        'hide_empty' => false,
                    ));
                
                    if (!empty($filterCategories)) {
                        foreach ($filterCategories as $filterCategory) {
                            echo '<li class="home__content__selection__filters__categories__menu__category home__content__selection__filters__content__option category-' . esc_html($filterCategory->name) . ' ">' . esc_html($filterCategory->name) . '</li>';
                        }
                }     
                ?>
                </ul>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 7.74408C5.26366 7.41864 4.73602 7.41864 4.41058 7.74408C4.08514 8.06951 4.08514 8.59715 4.41058 8.92259L9.41058 13.9226C9.73602 14.248 10.2637 14.248 10.5891 13.9226L15.5891 8.92259C15.9145 8.59715 15.9145 8.06951 15.5891 7.74408C15.2637 7.41864 14.736 7.41864 14.4106 7.74408L9.99984 12.1548L5.58909 7.74408Z" fill="#313144"/>
                </svg>
            </div>
            <div class="home__content__selection__filters__formats">
                <ul name="format" id="format" class="home__content__selection__filters__formats__menu filter-label">
                    <li value="" selected class="home__content__selection__filters__formats__menu__title filters__titles">Format</li>
                    <?php 
                $filterFormats = get_terms(array(
                    'taxonomy' => 'format',
                    'hide_empty' => false,
                ));
            
                if (!empty($filterFormats)) {
                    foreach ($filterFormats as $filterFormat) {
                        echo '<li class="home__content__selection__filters__formats__menu__format home__content__selection__filters__content__option format-' . esc_html($filterFormat->name) . ' ">' . esc_html($filterFormat->name) . '</li>';
                    }
                }     
                ?>
                </ul>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 7.74408C5.26366 7.41864 4.73602 7.41864 4.41058 7.74408C4.08514 8.06951 4.08514 8.59715 4.41058 8.92259L9.41058 13.9226C9.73602 14.248 10.2637 14.248 10.5891 13.9226L15.5891 8.92259C15.9145 8.59715 15.9145 8.06951 15.5891 7.74408C15.2637 7.41864 14.736 7.41864 14.4106 7.74408L9.99984 12.1548L5.58909 7.74408Z" fill="#313144"/>
                </svg>
            </div>
        </div>
        <div class="home__content__selection__sort">
            <ul id="date-post" class="home__content__selection__sort__menu filter-label">
                <li value="" selected class="home__content__selection__sort__menu__title filters__titles">Trier par</li>
                <li value="DESC" class="home__content__selection__sort__menu__newest home__content__selection__filters__content__option">Des plus récentes aux plus anciennes</li>
                <li value="ASC" class="home__content__selection__sort__menu__oldest home__content__selection__filters__content__option">Des plus anciennes aux plus récentes</li>
            </ul>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 7.74408C5.26366 7.41864 4.73602 7.41864 4.41058 7.74408C4.08514 8.06951 4.08514 8.59715 4.41058 8.92259L9.41058 13.9226C9.73602 14.248 10.2637 14.248 10.5891 13.9226L15.5891 8.92259C15.9145 8.59715 15.9145 8.06951 15.5891 7.74408C15.2637 7.41864 14.736 7.41864 14.4106 7.74408L9.99984 12.1548L5.58909 7.74408Z" fill="#313144"/>
                </svg>
        </div>
    </div>

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

    <div class="home__content__more">
        <button class="home__content__more__button submit-button">
            Chargez plus
        </button>
    </div>

</div>



<?php get_footer(); ?>