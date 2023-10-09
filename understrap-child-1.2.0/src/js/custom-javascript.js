// Add your JS customizations here

jQuery(document).ready(function($) {
    // Hero slick slider
    $( '.slick-slider' ).slick( {
        autoplay: true,
        arrows : false,
        dots: true,
        autoplaySpeed: 5500,
        slidesToShow: 1,
        slidesToScroll: 1,
    } );

    let page = <?php echo $paged; ?>;
    let maxPages = <?php echo $query->max_num_pages; ?>;

    function loadPosts(newPage) {
        $.ajax({
            url: 'admin-ajax.php',
            type: 'POST',
            data: {
                action: 'load_posts',
                page: newPage,
            },
            success: function (response) {
                if (response) {
                    $('.ajax-posts-container').html(response);
                }
            },
        });
    }

    // Click event for "OLDER POST" button
    $('.pagination-prev-custom').on('click', function (e) {
        e.preventDefault();
        if (page > 1) {
            page--;
            loadPosts(page);
        }
    });

    // Click event for "NEXT POST" button
    $('.pagination-next-custom').on('click', function (e) {
        e.preventDefault();
        if (page < maxPages) {
            page++;
            loadPosts(page);
        }
    });

    // Click event for "PREVIOUS" button
    $('.prev-page-button').on('click', function (e) {
        e.preventDefault();
        if (page > 1) {
            page--;
            loadPosts(page);
        }
    });

    // Click event for "NEXT" button
    $('.next-page-button').on('click', function (e) {
        e.preventDefault();
        if (page < maxPages) {
            page++;
            loadPosts(page);
        }
    });
});

