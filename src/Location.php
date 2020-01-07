<?php

namespace Drupal\physical_media;

class Location {

  /**
   * @var string
   */
  private $building;

  /**
   * @var string
   */
  private $floor;

  /**
   * @var string
   */
  private $aile;

  /**
   * @var string
   */
  private $section;

  /**
   * Location constructor.
   *
   * @param string $building
   * @param string $floor
   * @param string $aile
   * @param string $section
   */
  public function __construct(string $building, string $floor, string $aile, string $section) {
    $this->building = $building;
    $this->floor = $floor;
    $this->aile = $aile;
    $this->section = $section;
  }

  /**
   * @return string
   */
  public function getBuilding(): string {
    return $this->building;
  }

  /**
   * @return string
   */
  public function getFloor(): string {
    return $this->floor;
  }

  /**
   * @return string
   */
  public function getAile(): string {
    return $this->aile;
  }

  /**
   * @return string
   */
  public function getSection(): string {
    return $this->section;
  }

}
