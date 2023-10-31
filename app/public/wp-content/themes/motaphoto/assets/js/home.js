(function ($) {
    $(document).ready(function () {
        console.log('le script home est chargé');
    
        let isMouseDown = false; // variable pour le clic maintenu

        const filterContents = document.querySelectorAll('.home__filter'); //Recupère les containers des filtres

        let currentPage = 1; // Definie la page actuelle, initialement sur la page 1

        function getFiltersValues() {
            dateOrderSelected = document.getElementById('selectDateOrderValue').getAttribute('value');
            catgSelected = document.getElementById('selectCategoryValue').getAttribute('value');
            formatSelected = document.getElementById('selectFormatValue').getAttribute('value');
        }

        // Fonction pour charger les articles initiaux
        function loadInitialArticles() {
            getFiltersValues();
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_initial_articles',
                    dateOrderSelected: dateOrderSelected,
                    catgSelected: catgSelected,
                    formatSelected: formatSelected,
                },
                success: function (res) {
                    $('.home__content__articles').empty();
                    $('.home__content__articles').append(res.html);
                    currentPage = 1;
                    if (currentPage >= res.max) {
                        $('.home__content__more').hide();
                    } else {
                        $('.home__content__more').show();
                    }
                }
            });
        }
        loadInitialArticles(); // On apelle la fonction pour charger les articles par défauts

        // Fonction pour charger plus d'articles
        function loadMoreArticles() {
            getFiltersValues();
            currentPage++;
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_more_articles',
                    paged: currentPage,
                    dateOrderSelected: dateOrderSelected,
                    catgSelected: catgSelected,
                    formatSelected: formatSelected,
                },
                success: function (res) {
                    if (currentPage >= res.max) {
                        $('.home__content__more').hide();
                    }
                    $('.home__content__articles').append(res.html);
                }
            });
        }

        // On appelle la fonction pour charger plus d'article au clic sur le bouton "chargez plus"
        $('.home__content__more__button').on('click',loadMoreArticles);

        // Ferme la liste des filtres //
        function closeSelect() {
            filterContents.forEach(filterContent => {
                filterContent.classList.remove('home__filter-open');
            });
        }

        // permet d'ouvrir et fermer les filtres en cliquand sur le container// 
        function onFilterContentsClick(event) {
            event.stopPropagation();
            const isOpen = event.currentTarget.classList.contains('home__filter-open');

            closeSelect();

            if (!isOpen) {
                event.currentTarget.classList.add('home__filter-open');
            }
        }


        // Récupère l'option sur laquelle on a cliqué pour la mettre dans la balise span// 
        function onFilterOptionClick(event) {
            event.stopPropagation();
            const filterOption = event.currentTarget;
            const filterOptionValue = filterOption.getAttribute('value');
            const selectValue = filterOption.closest('.home__filter').querySelector('.home__filter__selected-option');

            selectValue.textContent = filterOption.querySelector('strong').textContent;
            selectValue.setAttribute('value', filterOptionValue);
            const dataUnselectedElements = filterOption.closest('.home__filter__content__list').querySelectorAll('.home__filter__content__list__option');

            dataUnselectedElements.forEach(dataUnselectedElement => {
                if (selectValue.textContent === dataUnselectedElement.textContent) {
                    dataUnselectedElement.classList.add('selected');
                } else {
                    dataUnselectedElement.classList.remove('selected');
                }
            });
                loadInitialArticles();
        }


        // Gere lebackground-color sur le mouvement du clic maintenu // 
        function onMouseMoveHighlight(event) {
            if (isMouseDown) {
                const filterOption = event.target;
                const parentFilterOption = filterOption.parentNode;

                if (filterOption.classList.contains('home__filter__content__list__option') || parentFilterOption.classList.contains('home__filter__content__list__option')) {
                    filterOption.classList.add('clicked-option');
                    parentFilterOption.classList.add('clicked-option');
                } else {
                    filterOption.classList.remove('clicked-option');
                    parentFilterOption.classList.remove('clicked-option');
                }
            }
        }



        // Vérifie si un filtre est ouvert et écoute les evenement des options du filtre//
        filterContents.forEach(filterContent => {
            filterContent.addEventListener('click', onFilterContentsClick); // On vérifie si le filtre est ouvert

            const filterOptions = filterContent.querySelectorAll('.home__filter__content__list__option'); // On récupère les options du filtre ouvert
            filterOptions.forEach(filterOption => {

                filterOption.addEventListener('mousedown', function () { //On ajoute un background spécifique si l'utilisateur reste appuyé au clic de la souris
                    isMouseDown = true;
                    this.classList.add('clicked-option');
                });

                filterOption.addEventListener('mouseup', function () { // On réinitialise le backgroud si l'utilisateur relache le clic de sa souris
                    isMouseDown = false;
                    this.classList.remove('clicked-option');
                });

                filterOption.addEventListener('mouseup', onFilterOptionClick); // On met à jour les filtres après le relachement du clic

                filterOption.addEventListener('mousemove', onMouseMoveHighlight); // Permet au background au clic enfoncé de suivre le mouvement de la souris tant que le clic est maintenu

                filterOption.addEventListener('mouseout', function () { // Permet d'enlever le background du clic enfoncé si la souris enfoncée à changer d'option
                    if (isMouseDown) {
                        this.classList.remove('clicked-option');
                    }
                });
            });
        });

        // Ferme les filtres quand on clique en dehors de la liste// 
        document.body.addEventListener('click', closeSelect);

    });
})(jQuery);
