// Java script to manage burger menu

const BurgerIcon = document.querySelector('.burger_icon');
const CrossIcon = document.querySelector('.cross_icon');
const MenuBurger = document.querySelector('.menu_mobile'); // page of menu


/* Burger page showing */
BurgerIcon.addEventListener('click', () => {
    MenuBurger.classList.add('show'); // display page of menu
    CrossIcon.classList.add('show'); // display cross
    BurgerIcon.classList.remove('show');// remove burger
    BurgerIcon.classList.add('noshow');// remove forcing because displayed first by default from css
});

/* Burger page close with cross click */
CrossIcon.addEventListener('click', () => {
    MenuBurger.classList.remove('show'); // remove page of menu
    CrossIcon.classList.remove('show'); // remove cross
    BurgerIcon.classList.add('show');// display burger
    BurgerIcon.classList.remove('noshow');// reset forcing burger
});
    
/* Burger page close when click on one link */
const MenuLinks = document.querySelectorAll('.burger_menu li a');

MenuLinks.forEach(link => {
    link.addEventListener('click', () => {
        MenuBurger.classList.remove('show'); // remove page of menu
        CrossIcon.classList.remove('show'); // remove cross
        BurgerIcon.classList.add('show');// display burger
        BurgerIcon.classList.remove('noshow');// dreset forcing burger
     })
});
            