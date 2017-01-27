<?php

namespace Drupal\sperez_maps_fields\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'sperez_gmaps_point' widget.
 *
 * @FieldWidget(
 *   id = "sperez_gmaps_point",
 *   module = "sperez_maps_fields",
 *   label = @Translation("Specified lat and long"),
 *   field_types = {
 *     "sperez_map_point"
 *   }
 * )
 */
class SinglePointWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $default_latitude = isset($items[$delta]->latitude) ? $items[$delta]->latitude : '';
    $default_longitude = isset($items[$delta]->longitude) ? $items[$delta]->longitude : '';
    return $element + array(
      'latitude' => [
        '#type' => 'textfield',
        '#title' => $this->t('Latitude'),
        '#default_value' => $default_latitude
      ],
      'longitude' => [
        '#type' => 'textfield',
        '#title' => $this->t('Longitude'),
        '#default_value' => $default_longitude
      ]
    );
  }

}
