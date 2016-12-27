<?php

namespace Drupal\age_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'AgeFieldDefaultFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "AgeFieldDefaultFormatter",
 *   label = @Translation("Age Field"),
 *   field_types = {
 *     "AgeField"
 *   }
 * )
 */
class AgeFieldDefaultFormatter extends FormatterBase {

  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = [];
    foreach ($items as $delta => $item) {
      $from = new \DateTime($item->birthday_date);
      $today   = new \DateTime();
      $age = $today->diff($from);
      $markup = t('Your age is - ') . t(' Years: ') . $age->y . t(' Months: ') . $age->m . t(' Days: ') . $age->d;
      if ($from > $today) {
        $markup = t('WELCOME THE UNBORN');
      }
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $markup,
      ];
    }

    return $elements;
  }

}
