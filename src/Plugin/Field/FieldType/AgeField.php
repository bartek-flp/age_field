<?php

namespace Drupal\age_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Implementation of the AgeField field type.
 *
 * @FieldType(
 *   id = "AgeField",
 *   label = @Translation("Age Field"),
 *   description = @Translation(""),
 *   category = @Translation("Age Field"),
 *   default_widget = "AgeFieldDefaultWidget",
 *   default_formatter = "AgeFieldDefaultFormatter"
 * )
 */
class AgeField extends FieldItemBase {

  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];

    $properties['birthday_date'] = DataDefinition::create('string')
      ->setLabel(t('Birthday Date'));

    return $properties;
  }

  public static function schema(StorageDefinition $storage) {

    $columns = [];

    $columns['birthday_date'] = [
      'type' => 'varchar',
      'length' => 255,
    ];

    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * Define when the field type is empty.
   * This method is important and used internally by Drupal.
   */
  public function isEmpty() {
    $isEmpty = FALSE;
    $birthday_date = $this->get('birthday_date')->getValue();

    if (empty($birthday_date)) {
      $isEmpty = TRUE;
    };

    return $isEmpty;
  }
}
