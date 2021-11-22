<?php

/**
 * @file
 * Functions to support DBC Network theme settings.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter() for system_theme_settings.
 */
function dbc_network_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {
  $form['olivero_settings']['olivero_utilities']['site_branding_bg_color']['#options']['dbc'] = t('DBC');
}
