jQuery(document).ready(function ($) {
  $('.nav-search-icon').on('click', function () {
      var $overlay = $('<div/>', { 'class': 'full-page-overlay fade', 'tabindex': '-1', 'role': 'dialog' }),
          // $closeBtn = $('<a/>', { 'class': 'overlay-close', 'text': 'x', 'href': 'javascript:void(0);' }),
          $closeBtn = $('<a/>', { 'class': 'overlay-close', 'href': 'javascript:void(0);' }),
          $formInput = $('<input/>', { 'class': 'overlay-input', 'type': 'text', 'placeholder': 'SEARCH' }),
          $searchIcon = $('<span/>', { 'class': 'far fa-search' }),
          $clearBtn = $('<a/>', { 'class': 'overlay-clear', 'text': 'clear', 'href': 'javascript:void(0);' }),
          $searchResultPanel = $('<div/>', { 'class': 'search-results-panel' }),
          $searchResultList = $('<div/>', { 'class': 'search-result-list' });
      $overlay.append($closeBtn).append($('<form/>').append($searchIcon).append($formInput).append($clearBtn)).append($searchResultPanel.append($searchResultList));

      //Append Test Search Results
      var $searchResultItem = createSearchResultItem({
          header: 'Test Search Result 1',
          content: 'Loresm ipsem dolorLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat neque eu lacus feugiat, eget tempus velit sodales. Nulla vel elit sed ligula. quet'
      });

      $searchResultList.append($searchResultItem);
      $overlay.appendTo($('body'));

      $formInput.on('keyup', function () {
          var $formEle = $formInput.parent();
          var searchInput = $.trim($formInput.val());
          if (searchInput != '') {
              $('.search-result-list').html('');
              crawlSearch(searchInput);
              $searchResultPanel.slideDown();
          }
          else {
              $formEle.removeClass('filled-in');
              $searchResultPanel.slideUp();
          }
      })

      function crawlSearch(input) {
          var $formEle = $formInput.parent();
          var request = $.ajax({
            url: "http://v8bn-mskh.accessdomain.com:8101/easypower/search",
            method: "GET",
            data: { q : input },
            dataType: "jsonp"
          });

          request.done(function( response ) {
            if (response.results.length > 0) {
                for (var i = 0; i < response.results.length; i++) {
                    $searchResultItem = createSearchResultItem({
                        header: response.results[i].Title,
                        content: response.results[i].Description,
                        url: response.results[i].Url
                    });
                    $searchResultList.append($searchResultItem);
                }
                $formEle.addClass('filled-in');
            } else {
                $searchResultList.html('<div class="search-result-item"><p class="search-result-header">No Found Results For "'+input+'"</p></div>');
            }
          });

          request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
          });
      }

      $clearBtn.on('click', function () {
          $formInput.val('');
          $(this).closest('form').removeClass('filled-in');
          $searchResultPanel.slideUp();
      });

      setTimeout(function () {
          //use bootstrap modal for better overlay handling
          $closeBtn.one('click', function () {
              $overlay.modal('hide');
          });
          $overlay.modal({ 'backdrop': false });
          $overlay.one('hidden.bs.modal', function (e) {
              $overlay.remove();
          })
      }, 0)
  });

  function createSearchResultItem(obj) {
    return $searchResultItem = $('<div/>', { 'class': 'search-result-item' })
    // .append($('<p/>', { 'class': 'search-result-header', 'text': obj.header }))
    .append('<a href='+obj.url+'><p class="search-result-header">'+obj.header+'</p></a>')
    .append($('<p/>', { 'class': 'search-result-content', 'text': obj.content }));
  }
});
