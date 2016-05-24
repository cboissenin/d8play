<?php

/**
 * @file
 * Contains \Drupal\game_character\Plugin\QueueWorker\GameCharacterQueue
 */

namespace Drupal\game_character\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;

/**
 * Processes Entity Update Tasks for My Module.
 *
 * @QueueWorker(
 *   id = "game_character_queue_update",
 *   title = @Translation("My Module Tasks Worker: Entity Updates"),
 *   cron = {"time" = 60}
 * )
 */

class GameCharacterQueue extends QueueWorkerBase {
  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    // Process $data here.
    dpm('process item');
    dpm($data);
    \Drupal::logger('queue')->notice('Queue has been succesfuly run');
  }
}
