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
      'latitude' => [
        '#type' =>'hidden'
      ],
      'longitude' => [
        '#type' => 'hidden'
      ]
    ];
    return $elements_array;
  }
}