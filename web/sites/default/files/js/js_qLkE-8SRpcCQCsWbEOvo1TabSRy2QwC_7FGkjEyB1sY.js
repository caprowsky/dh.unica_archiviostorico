/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, window) {
  function TableResponsive(table) {
    this.table = table;
    this.$table = $(table);
    this.showText = Drupal.t('Show all columns');
    this.hideText = Drupal.t('Hide lower priority columns');

    this.$headers = this.$table.find('th');

    this.$link = $('<button type="button" class="link tableresponsive-toggle"></button>').attr('title', Drupal.t('Show table cells that were hidden to make the table fit within a small screen.')).on('click', $.proxy(this, 'eventhandlerToggleColumns'));

    this.$table.before($('<div class="tableresponsive-toggle-columns"></div>').append(this.$link));

    $(window).on('resize.tableresponsive', $.proxy(this, 'eventhandlerEvaluateColumnVisibility')).trigger('resize.tableresponsive');
  }

  Drupal.behaviors.tableResponsive = {
    attach: function attach(context, settings) {
      var $tables = $(context).find('table.responsive-enabled').once('tableresponsive');
      if ($tables.length) {
        var il = $tables.length;
        for (var i = 0; i < il; i++) {
          TableResponsive.tables.push(new TableResponsive($tables[i]));
        }
      }
    }
  };

  $.extend(TableResponsive, {
    tables: []
  });

  $.extend(TableResponsive.prototype, {
    eventhandlerEvaluateColumnVisibility: function eventhandlerEvaluateColumnVisibility(e) {
      var pegged = parseInt(this.$link.data('pegged'), 10);
      var hiddenLength = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden').length;

      if (hiddenLength > 0) {
        this.$link.show().text(this.showText);
      }

      if (!pegged && hiddenLength === 0) {
        this.$link.hide().text(this.hideText);
      }
    },
    eventhandlerToggleColumns: function eventhandlerToggleColumns(e) {
      e.preventDefault();
      var self = this;
      var $hiddenHeaders = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden');
      this.$revealedCells = this.$revealedCells || $();

      if ($hiddenHeaders.length > 0) {
        $hiddenHeaders.each(function (index, element) {
          var $header = $(this);
          var position = $header.prevAll('th').length;
          self.$table.find('tbody tr').each(function () {
            var $cells = $(this).find('td').eq(position);
            $cells.show();

            self.$revealedCells = $().add(self.$revealedCells).add($cells);
          });
          $header.show();

          self.$revealedCells = $().add(self.$revealedCells).add($header);
        });
        this.$link.text(this.hideText).data('pegged', 1);
      } else {
          this.$revealedCells.hide();

          this.$revealedCells.each(function (index, element) {
            var $cell = $(this);
            var properties = $cell.attr('style').split(';');
            var newProps = [];

            var match = /^display\s*:\s*none$/;
            for (var i = 0; i < properties.length; i++) {
              var prop = properties[i];
              prop.trim();

              var isDisplayNone = match.exec(prop);
              if (isDisplayNone) {
                continue;
              }
              newProps.push(prop);
            }

            $cell.attr('style', newProps.join(';'));
          });
          this.$link.text(this.showText).data('pegged', 0);

          $(window).trigger('resize.tableresponsive');
        }
    }
  });

  Drupal.TableResponsive = TableResponsive;
})(jQuery, Drupal, window);;
// geo-location shim
// Source: https://gist.github.com/paulirish/366184

// Currently only serves lat/long
// depends on jQuery

(function(geolocation, $){
  if (geolocation) return;

  var cache;

  geolocation = window.navigator.geolocation = {};
  geolocation.getCurrentPosition = function(callback){

    if (cache) callback(cache);

    $.getScript('//www.google.com/jsapi',function(){

      cache = {
        coords : {
          "latitude": google.loader.ClientLocation.latitude,
          "longitude": google.loader.ClientLocation.longitude
        }
      };

      callback(cache);
    });

  };

  geolocation.watchPosition = geolocation.getCurrentPosition;

})(navigator.geolocation, jQuery);

(function ($) {
  Drupal.behaviors.geofieldGeolocation = {
    attach: function (context, settings) {

      // Callback for getCurrentPosition on geofield widget html5 geocode button
      function updateLocation(position) {
        $fields.find('.auto-geocode .geofield-lat').val(position.coords.latitude);
        $fields.find('.auto-geocode .geofield-lon').val(position.coords.longitude);
      }

      // Callback for getCurrentPosition on geofield proximity client position.
      function getClientOrigin(position) {
        var lat = position.coords.latitude.toFixed(6);
        var lon = position.coords.longitude.toFixed(6);
        latitudeInput.val(lat);
        longitudeInput.val(lon);
        latitudeSpan.text(lat);
        longitudeSpan.text(lon);
        return false;
      }

      // don't do anything if we're on field configuration
      if (!$(context).find("#edit-instance").length) {
        var $fields = $(context);
        // check that we have something to fill up
        // on multi values check only that the first one is em  pty
        if ($fields.find('.auto-geocode .geofield-lat').val() === '' && $fields.find('.auto-geocode .geofield-lon').val() === '') {
          // Check to see if we have geolocation support, either natively or through Google.
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(updateLocation);
          }
          else {
            console.log('Geolocation is not supported by this browser.');
          }
        }
      }

      // React on the geofield widget html5 geocode button click.
      $('input[name="geofield-html5-geocode-button"]').once('geofield_geolocation').click(function (e) {
        e.preventDefault();
        $fields = $(this).parents('.auto-geocode').parent();
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(updateLocation);
        }
        else {
          console.log('Geolocation is not supported by this browser.');
        }
      });

      var latitudeInput, longitudeInput, latitudeSpan, longitudeSpan = '';

      // React on the geofield proximity client location source.
      $('.proximity-origin-client').once('geofield_geolocation').each(function (e) {
        latitudeInput = $(this).find('.geofield-lat').first();
        longitudeInput = $(this).find('.geofield-lon').first();
        latitudeSpan = $(this).find('.geofield-lat-summary').first();
        longitudeSpan = $(this).find('.geofield-lon-summary').first();
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(getClientOrigin);
        }
        else {
          console.log('Geolocation is not supported by this browser.');
        }
      });
    }
  }

})(jQuery);
;
