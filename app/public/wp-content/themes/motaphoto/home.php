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

<div id="home" class="home__hero hero-background" style="background-image: url('<?php echo $thumbnail_url ?>');">
    <h1 class="home__hero__title">Photographe Event</h1>
</div>

<div class="home__content">
<div class="home__content__selection">
        <div class="home__content__selection__filters">
            <div class="home__filter">
                <span id="selectCategoryValue" class="home__filter__selected-option" value="">
                    Catégorie
                </span>
                <div class="no-select home__filter__content">
                    <ul  id="selectByCategory" class="home__filter__content__list" role="listbox" aria-labelledby="filter-dropdown">
                    <?php 
                        $filterCategories = get_terms(array(
                            'taxonomy' => 'categories',
                            'hide_empty' => false,
                        ));
                        $itemCountCategories = count($filterCategories);
                    
                        if (!empty($filterCategories)) {
                            $positionCategory = 1;
                            foreach ($filterCategories as $filterCategory) {
                                echo '<li class="home__filter__content__list__option" role="option" value="' . esc_html($filterCategory->name) . '" aria-posinset="' . $positionCategory . '" aria-setsize="' . $itemCountCategories . '"><strong>' . esc_html($filterCategory->name) . '</strong></li>';
                            }
                        }     
                        ?>
                    </ul>
                </div>
            </div>
            <div class="home__filter">
                <span id="selectFormatValue" class="home__filter__selected-option" value="">
                    Format
                </span>
                <div class="no-select home__filter__content">
                    <ul id="selectByFormat" class="home__filter__content__list" role="listbox" aria-labelledby="filter-dropdown">
                        <?php 
                        $filterFormats = get_terms(array(
                            'taxonomy' => 'format',
                            'hide_empty' => false,
                        ));
                        $itemCountFormats = count($filterFormats);
                    
                        if (!empty($filterFormats)) {
                            $positionFormat = 1;
                            foreach ($filterFormats as $filterFormat) {
                                echo '<li class="home__filter__content__list__option" role="option" value="' . esc_html($filterFormat->name) . '" aria-posinset="' . $positionFormat . '" aria-setsize="' . $itemCountFormats . '"><strong>' . esc_html($filterFormat->name) . '</strong></li>';
                            }
                        }     
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="home__content__selection__date">
            <div class="home__filter">
                <span id="selectDateOrderValue" class="home__filter__selected-option" value="ASC">Trier par</span>
                <div class="no-select home__filter__content">
                    <ul id="selectByDate" class="home__filter__content__list" role="listbox" aria-labelledby="filter-dropdown">
                        <li class="home__filter__content__list__option" role="option" value="DESC" aria-posinset="1" aria-setsize="2">
                            <strong>Des plus récentes aux plus anciennes</strong>
                        </li>
                        <li class="home__filter__content__list__option" role="option" value="ASC" aria-posinset="2" aria-setsize="2">
                            <strong>Des plus anciennes aux plus récentes</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>


    <div class="home__content__articles">
    </div>

    <div class="home__content__more">
        <button class="home__content__more__button submit-button">
            Chargez plus
        </button>
    </div>

</div>



<?php get_footer(); ?>