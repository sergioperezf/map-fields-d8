<?php

namespace Drupal\sperez_maps_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Class PointFormatter
 * @package Drupal\sperez_maps_fields\Plugin\Field\FieldFormatter
 *
 * @FieldFormatter(
 *   id = "sperez_maps_point_formatter",
 *   module = "sperez_maps_fields",
 *   label = @Translation("Point formatter"),
 *   field_types = {
 *     "sperez_map_point"
 *   }
 * )
 */
class PointFormatter extends FormatterBase {

  /**
   * Builds a renderable array for a field value.
   *
   * @param \Drupal\Core\Field\FieldItemListInterface $items
   *   The field values to be rendered.
   * @param string $langcode
   *   The language that should be used to render the field.
   *
   * @return array
   *   A renderable array for $items, as an array of child elements keyed by
   *   consecutive numeric indexes starting from 0.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        // We create a render array to produce the desired markup,
        // "<p style="color: #hexcolor">The color code ... #hexcolor</p>".
        // See theme_html_tag().
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $this->t('Latitude: @lat, Longitude: @lon', [
          '@lat' => $item->latitude,
          '@lon' => $item->longitude
        ]),
      );
    }

    return $elements;
  }

}