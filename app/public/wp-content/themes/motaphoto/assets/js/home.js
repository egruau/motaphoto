// (function ($) {
//     $(document).ready(function () {

//         let currentPage = 1;
//         $('.home__content__more').on('click', function () {
//             currentPage++;
//             console.log("Clic sur le bouton chargez plus");

//             $.ajax({
//                 type: 'POST',
//                 url: '/wp-admin/admin-ajax.php',
//                 dataType: 'json',
//                 data: {
//                     action: 'load_more_articles',
//                     paged: currentPage,
//                 },
//                 success: function (res) {
//                     if (currentPage >= res.max) {
//                         $('.home__content__more').hide();
//                     }
//                     $('.home__content__articles').append(res.html);
//                 }
//             });
//         });
//     });
// })(jQuery);

// (function ($) {
//     $(document).ready(function () {
//         $('.home__selection__sort').on('change', function() {
            

//             let sortingOption = $(this).val();
//             console.log(sortingOption);

//             $.ajax({
//                 type: 'POST',
//                 url:'/wp-admin/admin-ajax.php',
//                 dataType: 'json',
//                 data: {
//                     action: 'load_posts',
//                     sorting: sortingOption,
//                 },
//                 success: function(res) {
//                     $('.home__content__articles').empty();
//                     $('.home__content__articles').append(res.html);
//                 }
//             });

//         });
//     });
// })(jQuery);

// (function ($) {
//     $(document).ready(function () {
//         $('.home__selection__filters__categories').on('change', function() {
            

//             let catgOption = $(this).val();
//             console.log(catgOption);

//             $.ajax({
//                 type: 'POST',
//                 url:'/wp-admin/admin-ajax.php',
//                 dataType: 'json',
//                 data: {
//                     action: 'load_posts',
//                     catgOption: catgOption,
//                 },
//                 success: function(res) {
//                     $('.home__content__articles').empty();
//                     $('.home__content__articles').append(res.html);
//                 }
//             });

//         });
//     });
// })(jQuery);

// (function ($) {
//     $(document).ready(function () {
//         $('.home__selection__filters__formats').on('change', function() {
            

//             let formatOption = $(this).val();
//             console.log(formatOption);

//             $.ajax({
//                 type: 'POST',
//                 url:'/wp-admin/admin-ajax.php',
//                 dataType: 'json',
//                 data: {
//                     action: 'load_posts',
//                     formatOption: formatOption,
//                 },
//                 success: function(res) {
//                     $('.home__content__articles').empty();
//                     $('.home__content__articles').append(res.html);
//                 }
//             });

//         });
//     });
// })(jQuery);

(function ($) {
    $(document).ready(function () {
        // Écoutez les changements dans les sélecteurs de tri, catégorie et format.
        $('.home__selection__sort, .home__selection__filters__categories, .home__selection__filters__formats').on('change', function() {
            // Récupérez les valeurs des filtres.
            // let sortingOption = $('.home__selection__sort').val();
            // if (sortingOption === null) {
            //     sortingOption = 'DESC';
            // }
            // let catgOption = $('.home__selection__filters__categories').val();
            // if (catgOption === null) {
            //     catgOption = '';
            // }
            // let formatOption = $('.home__selection__filters__formats').val();
            // if (formatOption === null) {
            //     formatOption = '';
            // }
            let sortingOption = $('.home__selection__sort').val() || 'DESC';
            let catgOption = $('.home__selection__filters__categories').val() || '';
            let formatOption = $('.home__selection__filters__formats').val() || '';
            console.log(sortingOption);
            console.log(catgOption);
            console.log(formatOption);

            // Effectuez une requête AJAX pour charger les publications filtrées.
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_posts', // Utilisez la nouvelle action.
                    sorting: sortingOption,
                    catgOption: catgOption,
                    formatOption: formatOption,
                },
                success: function(res) {
                    // Mettez à jour le contenu de la zone d'affichage avec les nouvelles publications.
                    $('.home__content__articles').empty();
                    console.log(res);
                    $('.home__content__articles').append(res.html);
                }
            });
        });
    });
})(jQuery);


// (function ($) {
//     $(document).ready(function () {
//         // Créez un objet pour stocker les valeurs des filtres avec des valeurs par défaut.
//         let sorting = 'DESC'; // Tri par défaut
//         let catgOption = ''; // Catégorie par défaut (vide)
//         let formatOption = ''; // Format par défaut (vide)

//         // Écoutez les changements dans le sélecteur de tri.
//         $('.home__selection__sort').on('change', function() {
//             sorting = $(this).val();
//             updateFilteredContent();
//         });

//         // Écoutez les changements dans le sélecteur de catégorie.
//         $('.home__selection__filters__categories').on('change', function() {
//             catgOption = $(this).val();
//             updateFilteredContent();
//         });

//         // Écoutez les changements dans le sélecteur de format.
//         $('.home__selection__filters__formats').on('change', function() {
//             formatOption = $(this).val();
//             updateFilteredContent();
//         });

//         // Appel initial pour charger les articles avec les valeurs par défaut.
//         updateFilteredContent();
//     });

//     function updateFilteredContent() {
//         // Effectuez une requête AJAX pour charger les publications filtrées.
//         $.ajax({
//             type: 'POST',
//             url: '/wp-admin/admin-ajax.php',
//             dataType: 'json',
//             data: {
//                 action: 'load_posts',
//                 sorting: sorting,
//                 catgOption: catgOption,
//                 formatOption: formatOption,
//             },
//             success: function(res) {
//                 // Mettez à jour le contenu de la zone d'affichage avec les nouvelles publications.
//                 $('.home__content__articles').empty();
//                 $('.home__content__articles').append(res.html);
//             }
//         });
//     }
// })(jQuery);