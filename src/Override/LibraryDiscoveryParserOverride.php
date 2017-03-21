<?php

namespace Drupal\sperez_maps_fields\Override;

use Drupal\Core\Asset\LibraryDiscoveryParser;

/**
 * LibraryDiscoveryParserOverride.php
 */
class LibraryDiscoveryParserOverride extends LibraryDiscoveryParser
{
  protected function parseLibraryInfo($extension, $path) {
    $libraries = parent::parseLibraryInfo($extension, $path);
    if ($extension == 'sperez_maps_fields') {

      $googleMapsApiKey = \Drupal::config('sperez_maps_fields.settings')->get('gmaps_api_key'); // todo we should inject the config service instead of using this.
      $libraries['google.gmaps-lib']['js']['https://maps.googleapis.com/maps/api/js?key=' . $googleMapsApiKey] = $libraries['google.gmaps-lib']['js']['https://maps.googleapis.com/maps/api/js'];
      unset($libraries['google.gmaps-lib']['js']['https://maps.googleapis.com/maps/api/js']);
      //var_export($libraries);
      if (!$googleMapsApiKey) {
        \Drupal\Core\Form\drupal_set_message(t('The Google Maps API Key is not set.'));
      }
    }
    return $libraries;
  }
}