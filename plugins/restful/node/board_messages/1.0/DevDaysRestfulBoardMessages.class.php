<?php

/**
 * @file
 * Contains DevDaysRestfulBoardMessages.
 */

class DevDaysRestfulBoardMessages extends RestfulEntityBaseNode {

  use AccountProcessTrait;

  /**
   * {@inheritdoc}
   */
  public function publicFieldsInfo() {
    $fields = parent::publicFieldsInfo();

    // We don't need to display the title in this case since only the body of
    // the message is important.
    unset($fields['label']);

    $fields['text'] = [
      'property' => 'body',
      'sub_property' => 'value',
    ];

    $fields['author'] = [
      'property' => 'author',
      'process_callbacks' => [
        [$this, 'CustomAuthor'],
      ],
    ];

    return $fields;
  }

}
