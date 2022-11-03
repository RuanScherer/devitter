<?php

class RegisterUserUseCase {
  private $user_repository;

  function __construct($user_repository) {
    $this->user_repository = $user_repository;
  }

  function execute($user) {
    if (isset($this->user_repository)) {
      $this->user_repository->create($user);
    }
  }
}

?>