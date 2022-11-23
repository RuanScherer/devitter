<?php

class User {
  private $id;
  private $name;
  private $email;
  private $username;
  private $biography;
  private $password;
  private $dev_type;

  static function fromArray($array) {
    if (!isset($array)) {
      return null;
    }
    
    $user = new User();
    $user->id = $array["id"];
    $user->name = $array["name"];
    $user->email = $array["email"];
    $user->username = $array["username"];
    $user->biography = $array["biography"];
    $user->password = $array["password"];
    $user->dev_type = $array["dev_type"];
    return $user;
  }

  function &__get($name) {
    return $this->$name;
  }

  function __set($name, $value) {
    $this->$name = $value;
  }
}

?>