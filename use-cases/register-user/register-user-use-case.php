<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";
include_once __DIR__ . "/../../repositories/IUserRepository.php";

class RegisterUserUseCase {
  private $user_repository;

  function __construct($user_repository) {
    $this->user_repository = $user_repository;
  }

  function execute($user) {
    if (!isset($this->user_repository)) {
      return null;
    }

    $existentUser = $this->user_repository->findOneByEmailOrUsername($user);
    if(isset($existentUser)) {
      return UseCaseResponse::error("Já existe um usuário com esse username ou email cadastrado.");
    }

    $this->user_repository->create($user);
    return UseCaseResponse::success();
  }
}

?>