<?php

/**
 * @file
 * Contains Drupal\game_character\GameConfigService.
 */

namespace Drupal\game_character;

class GameConfigService {

  protected $data;

  public function __construct() {
    $this->data = \Drupal::config('game.configuration');;
  }

  public function getXpRequired(int $level) {
    $values = $this->data->get('xp_required');

    return $values[$level];
  }

  public function getGeneratedGold(int $level) {
    $values = $this->data->get('gold');

    return $values[$level];
  }



}