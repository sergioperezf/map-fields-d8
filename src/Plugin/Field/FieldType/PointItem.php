<?php

namespace Drupal\sperez_maps_fields\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\TypedData\MapDataDefinition;
use Drupal\Core\Url;
use Drupal\link\LinkItemInterface;

/**
 * Plugin implementation of the 'link' field type.
 *
 * @FieldType(
 *   id = "sperez_map_point",
 *   label = @Translation("Point in map"),
 *   description = @Translation("Stores "),
 *   default_widget = "sperez_gmaps_point",
 * )
 */
class PointItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['latitude'] = DataDefinition::create('string')
      ->setLabel(t('Latitude'));

    $properties['longitude'] = DataDefinition::create('string')
      ->setLabel(t('Longitude'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'latitude' => array(
          'description' => 'The Latitude of the point.',
          'type' => 'varchar',
          'length' => 2048,
        ),
        'longitude' => array(
          'description' => 'The Longitude of the point.',
          'type' => 'varchar',
          'length' => 2048,
        )
      )
    );
  }
}
