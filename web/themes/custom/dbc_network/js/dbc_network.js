(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.DbcNetworkBehavior = {
    attach: function (context, settings) {
      //
    }
  };
  $('aside nav.menu--wiki li.menu__item--has-children').find('a:first').each(function( index ) {
    if ($(this).parent().find('ul:first').css('display') == 'none') {
      $(this).addClass('closed');
    }
  });
  $('.region--highlighted nav.menu--wiki li.menu__item--has-children').find('a:first').each(function( index ) {
    if ($(this).parent().find('ul:first').css('display') == 'none') {
      $(this).addClass('closed');
    }
  });
  $('aside nav.menu--wiki li.menu__item--has-children').find('a:first').click(function(event){
    event.preventDefault();
    $(this).toggleClass('closed');
    $(this).parent().find('ul:first').slideToggle('fast');
  });
  $('.region--highlighted nav.menu--wiki li.menu__item--has-children').find('a:first').click(function(event){
    event.preventDefault();
    $(this).toggleClass('closed');
    $(this).parent().find('ul:first').slideToggle('fast');
  });
})(jQuery, Drupal, drupalSettings);
