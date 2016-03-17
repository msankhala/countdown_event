<?php

/**
 * @file
 * Contains \Drupal\countdown_event\Plugin\Block\CountDownBlock.
 */

namespace Drupal\countdown_event\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'CountDownBlock' block.
 *
 * @Block(
 *  id = "countdown_event",
 *  admin_label = @Translation("Countdown Event"),
 *  category = @Translation("Block"),
 * )
 */
class CountDownBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['countdown_event_date'] = array(
      '#type' => 'select',
      '#title' => $this->t('Event date'),
      '#description' => $this->t('Select event date.'),
      '#options' => array('1' => $this->t('1'), '2' => $this->t('2'), '3' => $this->t('3')),
      '#default_value' => isset($this->configuration['countdown_event_date']) ? $this->configuration['countdown_event_date'] : '1',
      '#weight' => '0',
    );
    $form['countdown_event_label_msg'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Enter your label message'),
      '#description' => $this->t(''),
      '#default_value' => isset($this->configuration['countdown_event_label_msg']) ? $this->configuration['countdown_event_label_msg'] : '',
      '#maxlength' => 37,
      '#size' => 37,
      '#weight' => '0',
    );
    $form['countdown_event_label_color'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Enter your label color here in #hex or html name format'),
      '#description' => $this->t(''),
      '#default_value' => isset($this->configuration['countdown_event_label_color']) ? $this->configuration['countdown_event_label_color'] : '',
      '#maxlength' => 7,
      '#size' => 7,
      '#weight' => '0',
    );
    $form['countdown_event_background_color'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Enter your background color in #hex or html name format'),
      '#description' => $this->t(''),
      '#default_value' => isset($this->configuration['countdown_event_background_color']) ? $this->configuration['countdown_event_background_color'] : '',
      '#maxlength' => 7,
      '#size' => 7,
      '#weight' => '0',
    );
    $form['countdown_event_text_color'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Enter your digit color in #hex or html name format'),
      '#description' => $this->t(''),
      '#default_value' => isset($this->configuration['countdown_event_text_color']) ? $this->configuration['countdown_event_text_color'] : '',
      '#maxlength' => 7,
      '#size' => 7,
      '#weight' => '0',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['countdown_event_date'] = $form_state->getValue('countdown_event_date');
    $this->configuration['countdown_event_label_msg'] = $form_state->getValue('countdown_event_label_msg');
    $this->configuration['countdown_event_label_color'] = $form_state->getValue('countdown_event_label_color');
    $this->configuration['countdown_event_background_color'] = $form_state->getValue('countdown_event_background_color');
    $this->configuration['countdown_event_text_color'] = $form_state->getValue('countdown_event_text_color');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['countdown_event_countdown_event_date']['#markup'] = '<p>' . $this->configuration['countdown_event_date'] . '</p>';
    $build['countdown_event_countdown_event_label_msg']['#markup'] = '<p>' . $this->configuration['countdown_event_label_msg'] . '</p>';
    $build['countdown_event_countdown_event_label_color']['#markup'] = '<p>' . $this->configuration['countdown_event_label_color'] . '</p>';
    $build['countdown_event_countdown_event_background_color']['#markup'] = '<p>' . $this->configuration['countdown_event_background_color'] . '</p>';
    $build['countdown_event_countdown_event_text_color']['#markup'] = '<p>' . $this->configuration['countdown_event_text_color'] . '</p>';

    return $build;
  }

}
