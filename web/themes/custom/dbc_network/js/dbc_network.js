(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.DbcNetworkBehavior = {
    attach: function (context, settings) {
      //
    }
  };
  $('aside nav.menu--wiki li.menu__item--has-children').find('a').click(function(event){
    event.preventDefault();
    $(this).parent().find('ul').slideToggle('fast');
  });
  $('.region--highlighted nav.menu--wiki li.menu__item--has-children').find('a').click(function(event){
    event.preventDefault();
    $(this).parent().find('ul').slideToggle('fast');
  });
})(jQuery, Drupal, drupalSettings);
