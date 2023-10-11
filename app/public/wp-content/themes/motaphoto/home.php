<?php get_header(); ?>

<?php 
$random_image = get_posts(array(
    'post_type' => 'photo', // Vous pouvez spécifier un autre type de publication si nécessaire
    'posts_per_page' => 1, // Récupérer un seul article au hasard
    'orderby' => 'rand', // Ordonner aléatoirement
));

if ($random_image) {
    $post = $random_image[0];
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full'); // 'full' peut être remplacé par d'autres tailles d'image
    // echo '<img src="' . $thumbnail_url . '" alt="' . esc_attr($post->post_title) . '" />';
}
?>

<div class="home-hero hero-background" style="background-image: url('<?php echo $thumbnail_url ?>');"> 
    <h1 class="home-hero__title">Photographe Event</h1>
</div>


<?php get_footer(); ?>