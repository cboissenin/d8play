<?php
/**
 * @file
 * Contains \Drupal\example\Form\ExampleForm.
 */

namespace Drupal\game_profil\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an example form.
 */
class EditProfileForm extends FormBase {

  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'edit_profile';
  }

  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $current_user = \Drupal::currentUser();
    $account = entity_load('user', $current_user->id());
//    kint($account->field_profil_name->value);
//    kint('hello world');
    $form['uid'] = array(
      '#type' => 'hidden',
      'value' => $current_user->id(),
    );

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your profile name'),
      '#default_value' => $account->field_profil_name->value,
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
//    if (strlen($form_state->getValue('phone_number')) < 3) {
//      $form_state->setErrorByName('phone_number', $this->t('The phone number is too short. Please enter a full phone number.'));
//    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $current_user = \Drupal::currentUser();
    $account = entity_load('user', $current_user->id());
    if ($account) {
      $account->field_profil_name->setValue($form_state->getValue('name'));
      $account->save();

      drupal_set_message($this->t('Profile saved'));
    }
  }

}
