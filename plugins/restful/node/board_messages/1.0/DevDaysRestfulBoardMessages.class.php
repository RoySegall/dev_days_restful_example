<?php

/**
 * @file
 * Contains DevDaysRestfulBoardMessages.
 */

class DevDaysRestfulBoardMessages extends RestfulEntityBaseNode {

  use DevDaysRestfulExampleTrait;

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

    $fields['board'] = [
      'property' => 'field_board_reference',
      'resource' => array(
        // The name of the bundle.
        'board' => array(
          // The name of the handler.
          'name' => 'boards',
        ),
      ),
    ];

    return $fields;
  }

}
