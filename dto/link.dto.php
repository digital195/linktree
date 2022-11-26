<?php

  class LinkDto {
    use \GetSetGo\SetterGetter;

    public $id;

    public $title;
    public $link;
    public $icon;

    public $createdAt;
    public $updatedAt;

    public function __construct($id, $title, $link, $icon, $createdAt, $updatedAt) {
      // parent::__construct();
      $this->id = Security::sanitize($id);

      $this->title = Security::sanitize($title);
      $this->link = Security::sanitize($link);
      $this->icon = Security::sanitize($icon);

      $this->createdAt = date("Y-m-d H:i:s", strtotime(Security::sanitize($createdAt)));
      $this->updatedAt = date("Y-m-d H:i:s", strtotime(Security::sanitize($updatedAt)));
    }

  }

?>
