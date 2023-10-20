(function ($) {
    $(document).ready(function () {

        let currentPage = 1;

        // Fonction pour charger les articles initiaux
        function loadInitialArticles(sortingOption, catgOption, formatOption) {
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_initial_articles',
                    sorting: sortingOption,
                    catgOption: catgOption,
                    formatOption: formatOption,
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

        // Fonction pour charger plus d'articles
        function loadMoreArticles(sortingOption, catgOption, formatOption) {
            currentPage++;
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_more_articles',
                    paged: currentPage,
                    sorting: sortingOption,
                    catgOption: catgOption,
                    formatOption: formatOption,
                },
                success: function (res) {
                    if (currentPage >= res.max) {
                        $('.home__content__more').hide();
                    }
                    $('.home__content__articles').append(res.html);
                }
            });
        }

        // Charger les articles initiaux lorsque la page se charge
        loadInitialArticles('ASC', '', '');

        // Gestion du clic sur le bouton "load-more"
        $('.home__content__more__button').on('click', function () {
            let sortingOption = $('.home__content__selection__sort').val() || 'ASC';
            let catgOption = $('.home__content__selection__filters__categories').val() || '';
            let formatOption = $('.home__content__selection__filters__formats').val() || '';

            loadMoreArticles(sortingOption, catgOption, formatOption);
        });

        // Gestion des changements de filtres
        $('.home__content__selection__sort, .home__content__selection__filters__categories, .home__content__selection__filters__formats').on('change', function () {
            let sortingOption = $('.home__content__selection__sort').val() || 'ASC';
            let catgOption = $('.home__content__selection__filters__categories').val() || '';
            let formatOption = $('.home__content__selection__filters__formats').val() || '';

            loadInitialArticles(sortingOption, catgOption, formatOption);
        });
    });
})(jQuery);


// FILTRES 