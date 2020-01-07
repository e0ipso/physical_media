<?php

namespace Drupal\physical_media\WrappedEntities;

use Drupal\physical_media\Location;

interface FindableInterface {

  public function getLocation(): Location;

}
