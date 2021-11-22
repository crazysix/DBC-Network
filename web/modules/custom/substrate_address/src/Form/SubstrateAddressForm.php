<?php

namespace Drupal\substrate_address\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountProxy;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Account connection form.
 *
 * @package Drupal\substrate_address\Form
 */
class SubstrateAddressForm extends FormBase {

  /**
   * The config factory interface.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Drupal\Core\Session\AccountProxy definition.
   *
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $currentUser;

  /**
   * Constructs a \Drupal\substrate_address\Form\SubstrateAddressForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Session\AccountProxy $current_user
   *   The current user object.
   */
  public function __construct(ConfigFactoryInterface $config_factory, AccountProxy $current_user) {
    $this->configFactory = $config_factory;
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('current_user')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'substrate_address_connector';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->configFactory->get('substrate_address.settings');
    $verfication_address = $config->get('verfication_address');
    
    $form['new_address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address to link'),
      '#description' => $this->t('Add a linked address to your account. Verification through deposit required.'),
      '#default_value' => '',
    ];
    $form['add_new_address'] = [
      '#type' => 'button',
      '#value' => $this->t('Add address'),
    ];

    $form['add_addresses_polkadot_ext'] = [
      '#type' => 'button',
      '#value' => $this->t('Add Addresses from Polkadot Extension'),
    ];

    $form['link_addresses'] = [
      '#type' => 'hidden',
      '#value' => '',
    ];
    $form['add_addresses'] = [
      '#type' => 'hidden',
      '#value' => '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Form should not be submitted.
  }

}
