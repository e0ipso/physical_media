<?php

namespace Drupal\physical_media\WrappedEntities;

use Drupal\Core\Access\AccessibleInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\physical_media\Location;
use Drupal\typed_entity\WrappedEntities\WrappedEntityBase;

class Book extends WrappedEntityBase implements LoanableInterface, PhysicalMediaInterface, FindableInterface, AccessibleInterface {

  const FIELD_NAME_ISBN = 'field_isbn';
  const FIELD_NAME_LOCATION = 'field_physical_location';

  // From PhysicalMediaInterface.
  public function isbn(): string {
    return $this->getEntity()->get(static::FIELD_NAME_ISBN)->value;
  }

  // From FindableInterface.
  public function getLocation(): Location {
    $location = $this->getEntity()->get(static::FIELD_NAME_LOCATION)->value;
    return new Location(
      $location['building'],
      $location['floor'],
      $location['aile'],
      $location['section']
    );
  }

  // From AccessibleInterface.
  public function access($operation, AccountInterface $account = NULL, $return_as_object = FALSE) {
    $location = $this->getLocation();
    if ($location->getBuilding() === 'area51') {
      return AccessResult::forbidden('Nothing to see.');
    }
    return AccessResult::neutral();
  }

}
