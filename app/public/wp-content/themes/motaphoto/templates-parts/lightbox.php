<div id="lightbox" class="lightbox">
    <button class="lightbox__close"><img
            src="<?php echo get_stylesheet_directory_uri(). '/assets/images/close.svg'; ?>" alt=""></button>
    <button class="lightbox__prev"><img
            src="<?php echo get_stylesheet_directory_uri(). '/assets/images/arrow-left.svg'; ?>" alt="">
        Précédent</button>
    <div class="lightbox__container">
        <img id="lightboxImg" class="lightbox__container__img" src="" alt="">
        <div class="lightbox__container__infos">
            <div id="lightboxRef" class="lightbox__container__infos__ref">
            </div>
            <div id="lightboxCatg" class="lightbox__container__infos__catg">
            </div>
        </div>
    </div>
    <button class="lightbox__next">Suivant<img
            src="<?php echo get_stylesheet_directory_uri(). '/assets/images/arrow-right.svg'; ?>" alt=""></button>
</div>