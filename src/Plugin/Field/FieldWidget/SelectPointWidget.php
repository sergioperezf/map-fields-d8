<?php

namespace Drupal\sperez_maps_fields\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'sperez_gmaps_point' widget.
 *
 * @FieldWidget(
 *   id = "sperez_gmaps_select",
 *   module = "sperez_maps_fields",
 *   label = @Translation("Select a point in the map"),
 *   field_types = {
 *     "sperez_map_point"
 *   }
 * )
 */
class SelectPointWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $default_latitude = isset($items[$delta]->latitude) ? $items[$delta]->latitude : '';
    $default_longitude = isset($items[$delta]->longitude) ? $items[$delta]->longitude : '';
    $elements_array = [
      '#title' => $element['#title'],
      '#description' => t('Click on the map to select a point'),
      '#type' => 'fieldset',
      'latitude' => [
        '#type' =>'hidden',
        '#attributes' => [
          'class' => ['gmaps-select-point-widget-lat']
        ],
        '#default_value' => $default_latitude
      ],
      'longitude' => [
        '#type' => 'hidden',
        '#attributes' => [
          'class' => ['gmaps-select-point-widget-lng']
        ],
        '#default_value' => $default_longitude
      ],
      'map' => [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#attributes' => [
          'class' => ['gmaps-container'],
        ]
      ],
      '#attached' => [
        'library' => [
          'sperez_maps_fields/select_point_form'
        ]
      ],
      '#attributes' => [
        'class' => ['gmaps-wrapper']
      ]
    ];
    return $elements_array;
  }
}