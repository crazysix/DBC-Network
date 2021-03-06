<?php

namespace Drupal\social_media_links_extras\Plugin\SocialMediaLinks\Platform;

use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Form\FormStateInterface;
use Drupal\social_media_links\PlatformBase;

/**
 * Provides 'dbcwallet' platform.
 *
 * @Platform(
 *   id = "wallet",
 *   name = @Translation("DBC Wallet"),
 * )
 */
class DbcWallet extends PlatformBase {

  /**
   * {@inheritdoc}
   */
  public static function validateValue(array &$element, FormStateInterface $form_state, array $form) {
    if (!empty($element['#value'])) {
      $default_protocol = 'http://';
      $new_value = $element['#value'];

      // Append the default protocol in case the user didn't add it.
      if (!preg_match('/^http(s)?:\/\//', $new_value)) {
        $new_value = $default_protocol . $new_value;
        $form_state->setValueForElement($element, $new_value);
      }

      if (!UrlHelper::isValid($new_value, TRUE)) {
        $form_state->setError($element, t('The wallet website must be a valid URL'));
      }
    }
  }

}
