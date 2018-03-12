jQuery(document).ready(function ($) {
    if (!kinesis.isInitialized)
        kinesis.initialize();

    var breakPoint = 480;

    var $grid = $('.gallery-image-container'),
        origImageCnt = $grid.find('.gallery-image').length;

    var galleryUrl = '/wp-json/wp/v2/gallery',
        page = 1, perPage = origImageCnt ? origImageCnt : 20, uploadPostID = 351, totalPage = 9999, hasInit = origImageCnt ? false : true;

    var buildImageItem = function (title, fullUrl, thumbUrl) {
        var $wrap = $('<a/>', { 'class': 'gallery-image', 'href': 'javascript:void(0);', 'data-full-img': fullUrl }),
            $img = $('<img/>', { 'src': thumbUrl, 'alt': title ? title : 'Image' });
        if (Math.random() > 0.75) $wrap.addClass('double-sized');
        return $wrap.append($img);
    };

    var resetParams = function () {
        page = 1;
        totalPage = 9999;
    }

    var masonryOption = {
        itemSelector: '.gallery-image',
        columnWidth: 200,
        isFitWidth: true,
        gutter: 20
    }, masonryReady = false;

    var doLoad = function () {
        if (page > totalPage) return;
        var postData = {
            page: page,
            per_page: perPage,
            exclude: uploadPostID
        };
        var typeOfWheel = $('.filter-collection-select').val();
        var wheelStyle = $('.filter-style-select').val();
        if (typeOfWheel.toLowerCase() != 'all') postData['type_of_wheel'] = typeOfWheel;
        if (wheelStyle.toLowerCase() != 'all') postData['wheel_style'] = wheelStyle;
        $.ajax({
            url: galleryUrl,
            data: postData
        }).done(function (data, textStatus, jqXHR) {
            $grid.find('.loader-center-middle').remove();
            if ($('body').find('.gallery-load-more').length)
                $('body').find('.gallery-load-more').removeClass('k-loading');
            totalPage = jqXHR.getResponseHeader('X-WP-TotalPages');
            if (page == 1 && !data.length) {
                $('<div/>', { 'class': 'text-center coming-soon-wrap' }).css({ 'margin-top': '20px' }).append($('<span/>', { 'class': 'alert alert-danger', 'text': 'Images Coming Soon...', 'role': 'alert' })).insertBefore($grid);
                return;
            }
            if (data.length) {
                var windowWidth = kinesis.utils.getViewport().width;
                if (hasInit) {
                    for (var i = 0; i < data.length; i++) {
                        var thisData = data[i];
                        if (thisData.acf) {
                            var thisTitle = thisData.title.rendered,
                                thisFullUrl = thisData.acf.gallery_image,
                                thisThumbUrl = thisData.acf.gallery_image;

                            var $thisObj = buildImageItem(thisTitle, thisFullUrl, thisThumbUrl);
                            $grid.append($thisObj)

                            if (masonryReady && windowWidth >= breakPoint) {
                                $grid.masonry('appended', $thisObj).imagesLoaded().progress(function () {
                                    $grid.masonry('layout');
                                });
                            }
                        }
                    }
                }
                else hasInit = true;

                if (!masonryReady && windowWidth >= breakPoint) {
                    $grid.masonry(masonryOption);
                    $grid.imagesLoaded().progress(function () {
                        $grid.masonry('layout');
                    });
                    masonryReady = true;
                }
            }
            if (page == 1 && page < totalPage) {
                $loadMoreWrap = $('<p/>', { 'class': 'text-center load-more-wrap' }),
                    $loadMoreBtn = $('<a/>', { 'href': 'javascript:void(0);', 'text': 'Load More', 'class': 'gallery-load-more btn k-btn-transparent k-btn-extra-long text-uppercase k-btn-red' });
                $loadMoreBtn.prepend($('<img />', { 'class': 'ajax-loading-icon', 'src': '/wp-content/themes/kinesismotorsport/icons/spinning-circles-red.svg' }));
                $loadMoreWrap.append($loadMoreBtn).insertAfter($grid);
            }
            if (page > 1 && page == totalPage) {
                var $noMore = $('<span/>', { 'class': 'alert alert-info', 'text': 'No More Images', 'role': 'alert' });
                $('body').find('.gallery-load-more').replaceWith($noMore);
                setTimeout(function () {
                    $('body').find('.load-more-wrap').fadeOut(300, function () {
                        $(this).remove();
                    })
                }, 2000);
            }
            page++;
        })
    };

    doLoad();

    /*Binding events*/
    $('body').on('click', '.gallery-load-more', function () {
        $(this).addClass('k-loading');
        doLoad();
    });

    $('.filter-block-wrap .filter-select').on('change', function () {
        var $that = $(this);
        var typeOfWheel = $that.val();
        if (masonryReady) {
            $grid.empty().masonry('destroy');
        }
        $grid.append($('<img />', { 'src': '/wp-content/themes/kinesismotorsport/icons/spinning-circles-red.svg', 'class': 'loader-center-middle' }));
        masonryReady = false;
        $('body').find('.load-more-wrap, .coming-soon-wrap').remove();
        resetParams();
        doLoad();
    });

    setTimeout(function () { $('.filter-select').chosen({ 'disable_search': true }) }, 600);

    $('body').on('click', '.gallery-image', function () {
        var $that = $(this),
            imgUrl = $that.data('full-img'),
            $modalBody = $('.gallery-modal').find('.modal-body');
        $modalBody.find('.modal-gallery-image').remove();
        $('.gallery-modal').modal('show');
        $modalBody.prepend($('<img/>', { 'class': 'modal-gallery-image', 'src': imgUrl }));
        $modalBody.find('.modal-image-loader').show();
        $modalBody.find('.modal-gallery-image').imagesLoaded().progress(function () {
            $modalBody.find('.modal-image-loader').hide();
        });
    });

    // Widow resize and rotation
    $(window).on("resize orientationchange", function () {
        var windowWidth = kinesis.utils.getViewport().width;
        if (windowWidth < breakPoint) {
            if (masonryReady) {
                $grid.masonry('destroy');
                masonryReady = false;
            }
        }
        else if (!masonryReady) {
            $grid.masonry(masonryOption);
            $grid.imagesLoaded().progress(function () {
                $grid.masonry('layout');
            });
            masonryReady = true;
        }
    });
});

function collectionFilter() {
    jQuery('.filter-style-select option:gt(0)').remove();
    var collection = jQuery('.filter-collection-select').val();
    if (collection === 'all') {
        Object.keys(options).forEach(function (key) {
            options[key].forEach(function (option) {
                jQuery('.filter-style-select').append('<option value="' + option + '">' + option + '</option>');
            });
        });
    } else {
        var styles = options[collection];
        for (var i = 0; i < styles.length; i++) {
            jQuery('.filter-style-select').append('<option value="' + styles[i] + '">' + styles[i] + '</option>');
        }
    }
    jQuery(".filter-style-select").trigger("chosen:updated");
}

function styleFilter() {
    var style = jQuery('.filter-style-select').val();
    if (style != 'all') {
        for (var key in options) {
            var index = getKeyByValue(options[key], style);
            if (index) {
                var collection = key;
                console.log(collection);
                break;
            }
        }
        jQuery('.filter-collection-select option[value=' + collection + ']').attr('selected', 'selected');
    }
    jQuery(".filter-collection-select").trigger("chosen:updated");
}

function getKeyByValue(obj, value) {
    return Object.keys(obj)[Object.values(obj).indexOf(value)];
}
