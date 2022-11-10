<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";
include_once __DIR__ . "/../../repositories/IUserRepository.php";

class AuthenticateUserUseCase {
  private $user_repository;

  function __construct($user_repository) {
    $this->user_repository = $user_repository;
  }

  function execute($userEmail, $userPassword) {
    if (!isset($this->user_repository)) {
      return null;
    }

    $existentUser = $this->user_repository->findOneByEmail($userEmail);
    
    if(!isset($existentUser)) {
      return UseCaseResponse::error("Email ou senha está incorreto");
    }

    if ($userPassword !== $existentUser->password) {
        return UseCaseResponse::error("Email ou senha está incorreto");
    }


    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['user'] = serialize($existentUser);
    return UseCaseResponse::success();
  }
}

?>