(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.SubstrateAddressBehavior = {
    attach: function (context, settings) {
      jdenticon.updateSvg();
    }
  };
})(jQuery, Drupal, drupalSettings);
