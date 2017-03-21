<?php

namespace Drupal\sperez_maps_fields;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * SperezMapsFieldsServiceProvider.php
 */
class SperezMapsFieldsServiceProvider extends ServiceProviderBase {
  public function alter(ContainerBuilder $container) {
    $definition = $container->getDefinition('library.discovery.parser');
    $definition->setClass('Drupal\sperez_maps_fields\Override\LibraryDiscoveryParserOverride');
  }
}