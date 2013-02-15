// Style tooltips
// IIFE to ensure safe use of $
(function( $ ) {
  $.fn.tooltips = function(el) {
    var $tooltip,
      $body = $('body'),
      $el;
    return this.each(function(i, el) {
      $el = $(el).attr("data-tooltip", i);
      var $tooltip = $('<div class="tooltip" data-tooltip="' + i + '">' + $el.attr('title') + '<div class="arrow"></div></div>').insertAfter(this);
      var linkPosition = $el.position();
      $tooltip.css({
        top: linkPosition.top - $tooltip.outerHeight() - 18,
        left: linkPosition.left - ($tooltip.width()/2) + ($el.width()/2)
      });
      $el.removeAttr("title")
      .hover(function() {
        $el = $(this);
        $tooltip = $('div[data-tooltip=' + $el.data('tooltip') + ']');                  
        var linkPosition = $el.position();
        $tooltip.css({
          top: linkPosition.top - $tooltip.outerHeight() - 18,
          left: linkPosition.left - ($tooltip.width()/2) + ($el.width()/2)
        });
        $tooltip.addClass("active");
      }, function() {
        $el = $(this);
        $tooltip = $('div[data-tooltip=' + $el.data('tooltip') + ']').addClass("out");
        setTimeout(function() {
          $tooltip.removeClass("active").removeClass("out");
          }, 300);
        });
      });
    }
})(jQuery);