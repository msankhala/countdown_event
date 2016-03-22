<?php

/**
 * @file
 * Contains \Drupal\countdown_event\Plugin\Block\CountDownBlock.
 */

namespace Drupal\countdown_event\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Datetime;

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
    $current_time = date('Y-m-d h:i:s', time());
//    if(isset($this->configuration['countdown_event_date'])) { var_dump($this->configuration['countdown_event_date']);}
    $form['countdown_event_date'] = array(
      '#type' => 'datelist',
      '#title' => $this->t('Event date'),
      '#description' => $this->t('Select event date.'),
      '#default_value' => isset($this->configuration['countdown_event_date']) ? new \Drupal\Core\Datetime\DrupalDateTime($this->configuration['countdown_event_date']) : new \Drupal\Core\Datetime\DrupalDateTime($current_time),
      '#date_part_order' => array('year', 'month', 'day', 'hour', 'minute'),
      '#date_year_range' => '2010:2020',
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
  public function blockValidate($form, FormStateInterface $form_state) {
    parent::blockValidate($form, $form_state);
    dpm($form_state);
//    $date_time = $form_state->getValue('countdown_event_date');
//    var_dump($date_time);
//    die;
//    if ($date_time->hasError()) {
//      $form_state->setErrorByName('countdown_event_date', t('Dude do not be so smart.'));
//    }
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['countdown_event_date'] = $form_state->getValue('countdown_event_date')->format('Y-m-d h:i:s');
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
