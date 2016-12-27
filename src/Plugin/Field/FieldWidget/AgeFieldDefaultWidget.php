<?php

namespace Drupal\age_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'AgeFieldDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "AgeFieldDefaultWidget",
 *   label = @Translation("Age Field"),
 *   field_types = {
 *     "AgeField"
 *   }
 * )
 */
class AgeFieldDefaultWidget extends WidgetBase {

  public function formElement(FieldItemListInterface $items, $delta, Array $element, Array &$form, FormStateInterface $formState) {

    $element['birthday_date'] = [
      '#type' => 'date',
      '#title' => t('Birthday Date'),
      '#default_value' => isset($items[$delta]->birthday_date) ?
        $items[$delta]->birthday_date : null,
      '#empty_value' => '',
    ];

    return $element;
  }

}
