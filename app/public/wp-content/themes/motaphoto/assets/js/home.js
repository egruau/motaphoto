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