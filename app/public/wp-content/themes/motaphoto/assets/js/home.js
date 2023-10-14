(function ($) {
    $(document).ready(function () {

        let currentPage = 1;
        $('.home__content__more').on('click', function () {
            currentPage++;
            console.log("Clic sur le bouton chargez plus");

            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_more_articles',
                    paged: currentPage,
                },
                success: function (res) {
                    if (currentPage >= res.max) {
                        $('.home__content__more').hide();
                    }
                    $('.home__content__articles').append(res.html);
                }
            });
        });
    });
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $('.home__selection__sort').on('change', function() {
            

            let sortingOption = $(this).val();
            console.log(sortingOption);

            $.ajax({
                type: 'POST',
                url:'/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_custom_posts',
                    sorting: sortingOption,
                },
                success: function(res) {
                    $('.home__content__articles').empty();
                    $('.home__content__articles').append(res.html);
                }
            });

        });
    });
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $('.home__selection__filters__categories').on('change', function() {
            

            let catgOption = $(this).val();
            console.log(catgOption);

            $.ajax({
                type: 'POST',
                url:'/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_categories_posts',
                    catgOption: catgOption,
                },
                success: function(res) {
                    $('.home__content__articles').empty();
                    $('.home__content__articles').append(res.html);
                }
            });

        });
    });
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $('.home__selection__filters__formats').on('change', function() {
            

            let formatOption = $(this).val();
            console.log(formatOption);

            $.ajax({
                type: 'POST',
                url:'/wp-admin/admin-ajax.php',
                dataType: 'json',
                data: {
                    action: 'load_format_posts',
                    formatOption: formatOption,
                },
                success: function(res) {
                    $('.home__content__articles').empty();
                    $('.home__content__articles').append(res.html);
                }
            });

        });
    });
})(jQuery);