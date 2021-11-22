<?php

namespace Drupal\substrate_address\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Substrate address configuration.
 *
 * @package Drupal\substrate_address\Form
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['substrate_address.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'substrate_address_config_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->configFactory->get('substrate_address.settings');

    $form['verfication_address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Verification Address'),
      '#description' => $this->t('DBC address used for verification of connected accounts.'),
      '#default_value' => $config->get('verfication_address'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory->getEditable('substrate_address.settings');
    $values = $form_state->getValues();

    $config->set('verfication_address', $values['verfication_address']);
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
