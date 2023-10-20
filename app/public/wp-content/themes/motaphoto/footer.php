
</main>
<footer class="footer">
   <?php get_template_part('templates-parts/modale', 'contact'); ?>
   <?php get_template_part('templates-parts/lightbox', 'lightbox'); ?>
    <?php
 if ( has_nav_menu( 'footer-menu' ) ) : ?>
    <?php 
 wp_nav_menu ( array (
 'theme_location' => 'footer-menu' ,
 'menu_class' => 'footer__nav',
 'container' => 'nav',
 ) ); ?>
    <?php endif;
 ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>