<?php

/**
 * @file
 * Contains \Drupal\game_character\Plugin\Block\CharacterInfoBlock.
 */

namespace Drupal\game_character\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Example: empty block' block.
 *
 * @Block(
 *   id = "character_info",
 *   admin_label = @Translation("Character: info")
 * )
 */
class CharacterInfoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_user = \Drupal::currentUser();
//    $renderer = \Drupal::service('renderer');
//    $node = \Drupal\node\Entity\Node::load(13);
//    dpm($node);
    dpm('hello build');
    // We return an empty array on purpose. The block will thus not be rendered
    // on the site. See BlockExampleTest::testBlockExampleBasic().
    $build = array(
      '#theme' => 'character_info',
//      '#character' => $info,
      '#pre_render' => array('game_character_info_pre_render'),
//      '#cache' => array(
//        'keys' => array('character-info'),
//        'tags' => array('node:12'),
//      ),
    );

    unset($build['#cache']['contexts']);
    dpm($build);

//    $renderer->addCacheableDependency($build, \Drupal\node\Entity\Node::load(13));

    return $build;
  }

}
