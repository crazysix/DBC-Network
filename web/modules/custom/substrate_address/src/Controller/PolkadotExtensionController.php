<?php

namespace Drupal\substrate_address\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for polkadot extension.
 */
class PolkadotExtensionController extends ControllerBase {

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $currentUser;

  /**
   * Polkadot extension constructor.
   *
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   The current user service.
   */
  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user')
    );
  }

  /**
   * User page for managing addresses.
   */
  public function manageAddressesPage() {
    $page['some_content']['#markup'] = '<p>This is a test?</p>';
    $page['address_container'] = [
      '#type' => 'container',
      '#attributes' => [
        'class' => ['substrate-addresses-wrapper'],
      ],
    ];
    $page['address_container']['addresses'] = [
      '#theme' => 'substrate_address',
      '#addresses' => [
        [
          'address' => '5Fmpmf9jA41u4RyTL3MGJyft4W9aKN9JZhfv2HyPM8Tiq333',
          'identity' => [
            'name' => 'TEST ACCOUNT',
            'status' => 'good',
          ],
          'status' => 'available',
          'link_text' => 'Link',
        ],
      ],
      '#attributes' => [
        'width' => 64,
        'height' => 64,
      ],
    ];

    $page['form']['new_address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address to link'),
      '#description' => $this->t('Add a linked address to your account. Verification through deposit required.'),
      '#default_value' => '',
    ];
    $page['form']['add_new_address'] = [
      '#type' => 'button',
      '#value' => $this->t('Add address'),
    ];
    $page['#attached']['library'][] = 'substrate_address/web3-bundle';
    $page['#attached']['drupalSettings']['substrate_address']['substrate_addresses'] = [
      'accounts' => ['5Fmpmf9jA41u4RyTL3MGJyft4W9aKN9JZhfv2HyPM8Tiq333'],
    ];

    return $page;
  }

/**
 * Get new address data.
 *
 * @param string $encoded_addresses
 *   Encoded addresses to add.
 */
public function getNewSubstrateAddresses($encoded_addresses) {
  // Look into core/modules/system/tests/modules/ajax_test.
  $response = new AjaxResponse();
  $html = [
      '#theme' => 'substrate_address',
      '#addresses' => [
        [
          'address' => '5Fmpmf9jA41u4RyTL3MGJyft4W9aKN9JZhfv2HyPMhiii',
          'identity' => [
            'name' => 'TEST ACCOUNT',
            'status' => 'good',
          ],
          'status' => 'available',
          'link_text' => 'Link',
        ],
      ],
      '#attributes' => [
        'width' => 64,
        'height' => 64,
      ],
    ];
  $response->setContent($html);
  return $response;
}

}
