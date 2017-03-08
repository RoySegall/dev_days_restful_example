<?php

/**
 * @file
 * Contains DevDaysRestfulBoards.
 */

class DevDaysRestfulBoards extends RestfulEntityBaseNode {

  /**
   * {@inheritdoc}
   */
  public function publicFieldsInfo() {
    $fields = parent::publicFieldsInfo();

    $fields['description'] = [
      'property' => 'body',
      'sub_property' => 'value',
    ];

    $fields['dummy_field'] = [
      'callback' => [$this, 'DummyField'],
    ];

    $fields['author'] = [
      'property' => 'author',
      'process_callbacks' => [
        [$this, 'CustomAuthor'],
      ],
    ];

    return $fields;
  }

  /**
   * Just dummy field.
   *
   * @param EntityDrupalWrapper $wrapper
   *   The wrapper object.
   *
   * @return string
   *   What to display in the dummy field.
   */
  public function DummyField(EntityDrupalWrapper $wrapper) {
    return t('Dummy field or the title: @title', ['@title' => $wrapper->label()]);
  }

  /**
   * Return a custom author formatting.
   *
   * @param stdClass $account
   *   The account author.
   * @return null|string
   *   The name of the author.
   */
  public function CustomAuthor(stdClass $account) {
    // We are using this API function and not the global user because there
    // might be an option that the plugin uses another authentication than
    // cookies, i.e access token. In that case, the global user will be
    // anonymous.
    $author = $this->getAccount();

    return $author->uid == $account->uid ? t('You') : $account->name;
  }

}
