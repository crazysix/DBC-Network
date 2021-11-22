(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.DbcNetworkBehavior = {
    attach: function (context, settings) {
      jdenticon.updateSvg();
    }
  };
})(jQuery, Drupal, drupalSettings);
