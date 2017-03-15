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
    $elements_array = [
      '#title' => t('Select a point'),
      '#type' => 'fieldset',
      'latitude' => [
        '#type' =>'hidden'
      ],
      'longitude' => [
        '#type' => 'hidden'
      ],
      'map' => [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#attributes' => [
          'class' => 'gmaps_container',
        ]
      ],
      '#attached' => [
        'library' => [
          'sperez_maps_fields/select_point_form'
        ]
      ]
    ];
    return $elements_array;
  }
}