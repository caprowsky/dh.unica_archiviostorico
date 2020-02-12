/**
 * @file
 * Provides base widget behaviours.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Handles "facets_filter" event and triggers "facets_filtering".
   *
   * The facets module will listend and trigger defined events on elements with
   * class: "js-facets-widget".
   *
   * Events are doing following:
   * "facets_filter" - widget should trigger this event. The facets module will
   *   handle it accordingly in case of AJAX and Non-AJAX views.
   * "facets_filtering" - The facets module will trigger this event before
   *   filter is executed.
   *
   * This is an example how to trigger "facets_filter" event for your widget:
   *   $('.my-custom-widget.js-facets-widget')
   *     .once('my-custom-widget-on-change')
   *     .on('change', function () {
   *       // In this example $(this).val() will provide needed URL.
   *       $(this).trigger('facets_filter', [ $(this).val() ]);
   *     });
   *
   * The facets module will trigger "facets_filtering" before filter is
   * executed. Widgets can listen on "facets_filtering" event and react before
   * filter is executed. Most common use case is to disable widget. When you
   * disable widget, a user will not be able to trigger new "facets_filter"
   * event before initial filter request is finished.
   *
   * This is an example how to handle "facets_filtering":
   *   $('.my-custom-widget.js-facets-widget')
   *     .once('my-custom-widget-on-facets-filtering')
   *     .on('facets_filtering.my_widget_module', function () {
   *       // Let's say, that widget can be simply disabled (fe. select).
   *       $(this).prop('disabled', true);
   *     });
   *
   * You should namespace events for your module widgets. With namespaced events
   * you have better control on your handlers and if it's needed, you can easier
   * register/deregister them.
   */
  Drupal.behaviors.facetsFilter = {
    attach: function (context) {
      $('.js-facets-widget', context)
        .once('js-facet-filter')
        .on('facets_filter.facets', function (event, url) {
          $('.js-facets-widget').trigger('facets_filtering');

          window.location = url;
        });
    }
  };

})(jQuery, Drupal);
;
/**
 * @file
 * Facets views Link widgets handling.
 */

(function ($, Drupal) {
  'use strict';

  /**
   * Handle link widgets.
   */
  Drupal.behaviors.facetsLinkWidget = {
    attach: function (context) {
      var $linkFacets = $('.js-facets-links', context)
        .once('js-facets-link-on-click');

      // We are using list wrapper element for Facet JS API.
      if ($linkFacets.length > 0) {
        $linkFacets
          .each(function (index, widget) {
            var $widget = $(widget);
            var $widgetLinks = $widget.find('.facet-item > a');

            // Click on link will call Facets JS API on widget element.
            var clickHandler = function (e) {
              e.preventDefault();

              $widget.trigger('facets_filter', [$(this).attr('href')]);
            };

            // Add correct CSS selector for the widget. The Facets JS API will
            // register handlers on that element.
            $widget.addClass('js-facets-widget');

            // Add handler for clicks on widget links.
            $widgetLinks.on('click', clickHandler);
          });

        // We have to trigger attaching of behaviours, so that Facets JS API can
        // register handlers on link widgets.
        Drupal.attachBehaviors(context, Drupal.settings);
      }
    }
  };

})(jQuery, Drupal);
;
