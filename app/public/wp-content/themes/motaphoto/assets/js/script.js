// MENU BURGER //

const headerNav = document.querySelector('.header__nav');
const bodyContent = document.querySelector('body');
const logo = document.querySelector('.header__logo__desktop');


function openMenu() {
  headerNav.classList.add('header__nav__open');
  headerNav.classList.remove('header__nav__closed');
  bodyContent.classList.add('overlay-animation');
  bodyContent.classList.remove('overlay-animation__closed');
  logo.classList.add('opacity-animation');
  logo.classList.remove('opacity-animation__closed');
}

function closeMenu() {
  headerNav.classList.remove('header__nav__open');
  headerNav.classList.add('header__nav__closed');
  bodyContent.classList.remove('overlay-animation');
  bodyContent.classList.add('overlay-animation__closed');
  logo.classList.remove('opacity-animation');
  logo.classList.add('opacity-animation__closed');
}


// GESTION DE LA MODALE //
$(document).ready(function () {

  const modal = document.getElementById('contactModal');
  const modalForm = document.querySelector('.wpcf7-form');
  const modalContent = document.getElementById('modal-content');

  document.addEventListener('wpcf7submit', function (event) {
    modalContent.classList.add('modal-submit');
  }, false);

  let btnContact = document.querySelector('.contactLink');
  btnContact.onclick = function () {
    modal.classList.add('modal-open');
  }
  // Intégrer la référence photo //
  let btnContactPhoto = $('.single-post-content__footer__contact__button');
  btnContactPhoto.click(function () {
    $("#form__ref-photo").val($('#reference-photo').text())

    // Afficher la modale
    modal.classList.add('modal-open');
  });

  window.onclick = function (event) {
    if (event.target == modal) {
      closeModal();
    }
  }

  function closeModal() {
    modal.classList.remove('modal-open');
    modalContent.classList.remove('modal-submit');
    modalForm.reset();
  }

  document.addEventListener('wpcf7mailsent', function(event) {
    const delay = 1500; 
    setTimeout(function() {
      closeModal();
    }, delay)
  })
})

// NAVIGATION HOVER SINGLE PAGE //
$(document).ready(function () {
  let previousArrow = $('.previous-icon-link');
  let nextArrow = $('.next-icon-link');
  let previousThumbnail = $('.previous-thumbnail');
  let nextThumbnail = $('.next-thumbnail');

  previousArrow.hover(
    function () {
      previousThumbnail.addClass('show-thumbnail');
    },
    function () {
      previousThumbnail.removeClass('show-thumbnail');
    }
  );

  nextArrow.hover(
    function () {
      nextThumbnail.addClass('show-thumbnail');
    },
    function () {
      nextThumbnail.removeClass('show-thumbnail');
    }
  );
});