<?php
/**
 * @file
 * Contains \Drupal\content_entity_example\ContactInterface.
 */

namespace Drupal\entity_character;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a Contact entity.
 * @ingroup content_entity_example
 */
interface CharacterInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
?>