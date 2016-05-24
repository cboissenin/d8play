<?php

/**
 * @file
 * Contains Drupal\game_character\CharacterInfoService.
 */

namespace Drupal\game_character;

use Drupal\Core\Url;
use Drupal\Core\Link;

class CharacterInfoService {

  protected $config;
  protected $account;
  protected $level;
  protected $gold;
  protected $character;
  protected $xp;

  public function __construct() {
    $this->config = \Drupal::service('game_character.game_config');
    $current_user = \Drupal::currentUser();
    $this->account = entity_load('user', $current_user->id());
    $this->character = entity_load('node', $this->account->field_ref_character->target_id);
    $this->level = $this->character->field_level->value;
    $this->xp = $this->character->field_experience->value;
  }


  public function getRemainingXp() {
    $required = $this->config->getXpRequired($this->level);

    return $required - $this->xp;
  }


  public function getInfos() {
//    $character_link = Link::fromTextAndUrl($this->character->getTitle(), $this->character->toUrl()->toString());

    $info = array(
      'name' => $this->character->getTitle(),
      'level' => $this->level,
      'xp' => $this->xp,
      'remaining_xp' => $this->getRemainingXp(),
      'gold' => 0,
    );

    return $info;
  }



}