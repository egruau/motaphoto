// MENU BURGER //
function openMenu() {
    document.querySelector('.header__nav').classList.add('header__nav__open');
    document.querySelector('.header__burger').classList.add('header__burger__icone');
}

function closeMenu() {
    document.querySelector('.header__nav').classList.remove('header__nav__open');
    document.querySelector('.header__burger').classList.remove('header__burger__icone');
}

// let links = document.querySelectorAll('.header__nav__menu > li');
// console.log(links);

// links.forEach(link => {
//   link.addEventListener("click", closeMenu);
// });

// GESTION DE LA MODALE //
document.addEventListener('wpcf7submit', function(event) {
  // Code pour agrandir la modale en cas d'erreur
  var modal = document.getElementById('modal-content');
  modal.style.height = '900px';
  console.log("La modale est plus grande")
}, false);

// Get the modal
// Votre code ici
  let modal = document.querySelector('.modal');
console.log(modal);

let btnContact = document.querySelector('.contactLink');
console.log(btnContact);
btnContact.onclick = function() {
  modal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
}



// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// When the user clicks on the button, open the modal
// btn.onclick = function() {
//     modal.style.display = "block";
// }

// When the user clicks anywhere outside of the modal, close it
