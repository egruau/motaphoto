
$(document).ready(function () {

    function openLightbox() {
        $('.lightbox').css('display', 'flex');
    }

    $('window').on('load', '.photo-block-container', function() {
        const container = $('.photo-block-container');
        console.log(container);
        console.log('La fonction est chargée');

    });

    // Utilisez une délégation d'événements sur le body pour les éléments .photo-block__hover__fullscreen
    // $('body').on('click', '.photo-block__hover__fullscreen', function () {
    //     const container = $(this).closest('.photo-block-container');

    //     if (container.length > 0) {
    //         const imgSrc = container.find('.photo-block__picture__img').attr('src');
    //         const reference = container.find('.photo-block__hover__infos__ref').text();
    //         const categorie = container.find('.photo-block__hover__infos__categorie').text();

    //         $('.lightbox__container__img').attr('src', imgSrc);
    //         $('.lightbox__container__infos__ref').text(reference);
    //         $('.lightbox__container__infos__catg').text(categorie);

    //         openLightbox();
    //     }
    // });


});

function closeLightbox() {
    const closeBtn = $('.lightbox__close');

    closeBtn.click(function() {
        $('.lightbox').css('display', 'none');
    });
};
closeLightbox();
