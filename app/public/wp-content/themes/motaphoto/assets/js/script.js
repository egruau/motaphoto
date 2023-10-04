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
document.addEventListener('wpcf7submit', function(event) {
  // Code pour agrandir la modale à l'envoie du formulaire
  var modal = document.getElementById('modal-content');
  modal.style.height = '900px';
}, false);

// Get the modal
  let modal = document.querySelector('.modal');

let btnContact = document.querySelector('.contactLink');
btnContact.onclick = function() {
  modal.style.display = "block";
}

let btnContactPhoto = $('.single-post-content__footer__contact__button');
console.log(btnContactPhoto);
btnContactPhoto.click(function() {
  $(document).ready(function() {
    $("#form__ref-photo").val($('#reference-photo').text())
  })

  // Afficher la modal
  $('.modal').css('display', 'block');
});

window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
}

$(document).ready(function() {
  let previousArrow = $('.previous-icon-link');
  let nextArrow = $('.next-icon-link');
  let previousThumbnail = $('.previous-thumbnail');
  let nextThumbnail = $('.next-thumbnail');

  previousArrow.hover (
    function() {
      previousThumbnail.addClass('show-thumbnail');
    },
    function() {
      previousThumbnail.removeClass('show-thumbnail'); // Correction ici
    }
  );

  nextArrow.hover (
    function() {
      nextThumbnail.addClass('show-thumbnail');
    },
    function() {
      nextThumbnail.removeClass('show-thumbnail'); // Correction ici
    }
  );
});