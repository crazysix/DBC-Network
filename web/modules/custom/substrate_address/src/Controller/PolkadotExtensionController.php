<?php

namespace Drupal\substrate_address\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for polkadot extension.
 */
class PolkadotExtensionController extends ControllerBase {

  public function basicTest() {
    $page['#markup'] = '<p>This is a test?</p><svg width="64" height="64" data-jdenticon-value="5EAbPj2LmbWood1DH6TFHjQYdVKWumGGTnz4D8SfxH79TyMi"></svg>';
    $page['#attached']['library'][] = 'substrate_address/web3-bundle';

    return $page;
  }

}
