console.log('test');

// MENU BURGER //
function openMenu() {
    document.querySelector('.header__nav').classList.add('header__nav__open');
    document.querySelector('.header__burger').classList.add('header__burger__icone');
}

function closeMenu() {
    document.querySelector('.header__nav').classList.remove('header__nav__open');
    document.querySelector('.header__burger').classList.remove('header__burger__icone');
}

let links = document.querySelectorAll('.header__nav__menu > li');
console.log(links);

links.forEach(link => {
  link.addEventListener("click", closeMenu);
});