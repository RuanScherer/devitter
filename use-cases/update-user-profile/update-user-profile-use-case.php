<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";

if(!isset($_SESSION)) {
  session_start();   
}

class UpdateUserProfileUseCase {
  private $user_repository;

  function __construct($user_repository) {
    $this->user_repository = $user_repository;
  }

  function execute($user) {
    if (!isset($this->user_repository)) {
      return null;
    }

    $this->user_repository->updateBiographyAndDevType($user);
    $_SESSION["user"] = serialize($user);
    return UseCaseResponse::success();
  }
}

?>