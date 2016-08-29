/**
 * Jquery Ajax Loading Mask
 * Author: Kevin Sakhuja
 *
 * Usage: $(element).loadingMask({ stop: true });
 *
 */

(function($) {
  $.fn.ajaxMask = function(options) {

    return this.each(function() {
        var settings = $.extend({
              stop: false,
            }, options);

        if (!settings.stop) {
          var loadingDiv = $('<div class="ajax-mask"><div class="loading"><img src="assets/image/loading-spinner-grey.gif"/>&nbsp;&nbsp;<span>' + 'Please wait...' + '</span></div></div>')
            .css({
              'position': 'absolute',
              'top': 0,
              'left':0,
              'width':'100%',
              'height':'100%',
            });

          $(this).css({ 'position':'relative' }).append(loadingDiv);
        } else {
          $('.ajax-mask').remove();
        }
    });

  }
})(jQuery);
