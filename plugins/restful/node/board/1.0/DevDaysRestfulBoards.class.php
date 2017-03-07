<?php

/**
 * @file
 * Contains RestfulExampleArticlesResource.
 */

class DevDaysRestfulBoards extends RestfulEntityBaseNode {

  public function publicFieldsInfo() {
    $fields = parent::publicFieldsInfo();

    $fields['description'] = [
      'property' => 'body',
      'sub_property' => 'value',
    ];

    return $fields;
  }

}
