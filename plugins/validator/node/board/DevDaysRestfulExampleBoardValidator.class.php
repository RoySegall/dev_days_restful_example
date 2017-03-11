<?php

/**
 * @file
 * Contains DevDaysRestfulExampleBoardValidator.
 */

class DevDaysRestfulExampleBoardValidator extends EntityValidateBase {

  use DevDaysRestfulExampleValidatorTrait;

  /**
   * Overrides EntityValidateBase::publicFieldsInfo().
   */
  public function publicFieldsInfo() {
    $public_fields = parent::publicFieldsInfo();

    $public_fields['title']['validators'][] = array($this, 'TitleLengthValidation');

    $public_fields['body'] = [
      'required' => TRUE,
    ];

    return $public_fields;
  }

}
