$(document).ready(function () {

    const lightbox = document.querySelector('.lightbox');
    const lightboxImg = document.querySelector('.lightbox__container__img');
    const lightboxCatg = document.getElementById('lightboxCatg');
    const lightboxRef = document.getElementById('lightboxRef');
    const arrowPrev = document.querySelector('.lightbox__prev');
    const arrowNext = document.querySelector('.lightbox__next');

    index = 0;
    let data = null;

    function closeLightbox() {
        const closeBtn = document.querySelector('.lightbox__close');
        closeBtn.addEventListener('click', function () {
            lightbox.classList.remove('lightbox-open');
        });
    };
    closeLightbox();

    function openLightbox() {
        lightbox.classList.add('lightbox-open');
    }

    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('photo-block__hover__fullscreen') || event.target.closest('.photo-block__hover__fullscreen')) {
            event.preventDefault();
            const target = event.target;
            console.log(target);
            const links = Array.from(document.querySelectorAll('.photo-block__hover'));
            data = links.map(link => {
                const imgFullscreen = link.querySelector('.photo-block__hover__fullscreen');
                const imgSrc = link.querySelector('.photo-block__hover__fullscreen').getAttribute('href');
                const imgRef = link.querySelector('.photo-block__hover__infos__ref').textContent;
                const imgCatg = link.querySelector('.photo-block__hover__infos__categorie').textContent;

                return {
                    imgFullscreen,
                    imgSrc,
                    imgRef,
                    imgCatg
                };
            });

            index = data.findIndex(item => item.imgFullscreen === target);
            updateLightbox();
        }

    });


    function updateLightbox() {
        updateIndex();
        lightboxImg.setAttribute('src', data[index].imgSrc);
        lightboxRef.innerHTML = data[index].imgRef;
        lightboxCatg.innerHTML = data[index].imgCatg;
        console.log(lightbox.innerHTML);
        openLightbox();
    }

    function updateIndex() {
        if (index === 0) {
            arrowPrev.classList.add('hide');
        } else {
            arrowPrev.classList.remove('hide');
        }

        if (index === data.length - 1) {
            arrowNext.classList.add('hide');
        } else {
            arrowNext.classList.remove('hide');
        }
    }

        arrowPrev.addEventListener('click', () => {
            index--;
            updateLightbox();
        });
        arrowNext.addEventListener('click', ()=> {
            index++;
            updateLightbox();
        });
        
    

});