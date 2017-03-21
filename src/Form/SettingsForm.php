<?php

namespace Drupal\sperez_maps_fields\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * SettingsForm.php
 */
class SettingsForm extends ConfigFormBase {

  const MODULE_NAME = 'sperez_maps_fields';

  public function getFormId() {
    return self::MODULE_NAME . '_settings';
  }

  protected function getEditableConfigNames() {
    return [
      self::MODULE_NAME . '.settings'
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config($this->getEditableConfigNames()[0]);

    $form['gmaps_api_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Google maps key'),
      '#default_value' => $config->get('gmaps_api_key')
    );

    // We need to call the parent function because ConfigFormBase does some things that we need,
    // such as adding the theme and submit buttons.
    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config($this->getEditableConfigNames()[0])
      ->set('gmaps_api_key', $form_state->getValue('gmaps_api_key'))
      ->save();

    // The parent function sets the success message.
    parent::submitForm($form, $form_state);
  }

}