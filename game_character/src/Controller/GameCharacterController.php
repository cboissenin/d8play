<?php

/**
 * @file
 * Contains \Drupal\page_example\Controller\SimplePageController.
 */

namespace Drupal\game_character\Controller;

use Drupal\Core\Controller\ControllerBase;
// use Drupal\Core\Url;
// use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Controller routines for page example routes.
 */
class GameCharacterController extends ControllerBase {
  /**
   * [page description]
   * @return [type] [description]
   */
  public function page() {

    $query = \Drupal::entityQuery('node')
      ->condition('status', 1);

    $nids = $query->execute();


    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
//    $nodes = entity_load_multiple('node', $nids);

    // Node
    $render_a_nodes = entity_view_multiple($nodes, 'teaser');
    // Form
    $form = \Drupal::formBuilder()->getForm('Drupal\simple_page\Form\ExampleForm');
    dpm($form);
    // View
    $embed_view = views_embed_view('files');



    $build = array(
      '#theme' => 'simple_page_listing',
      '#description' => drupal_render($nodes),
      'form' => $embed_view,
      // 'listing' => $nodes,
      // 'view_embed' => $embed_view,
    );


    return $build;

  }

  /**
   * Edit Profile
   */
  public function add() {
    $node = $this->entityManager()->getStorage('node')->create(array(
      'type' => 'character',
    ));

    $form = $this->entityFormBuilder()->getForm($node);

    return $form;
  }
}


