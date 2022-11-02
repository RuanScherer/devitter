<?php

class User {
  private $id;
  private $name;
  private $email;
  private $username;
  private $biography;
  private $password;

  function &__get($name) {
    return $this->$name;
  }

  function __set($name, $value) {
    $this->$name = $value;
  }
}

?>