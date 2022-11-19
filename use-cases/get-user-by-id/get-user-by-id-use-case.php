<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";

class GetUserByIdUseCase {
  private $user_repository;

  function __construct($user_repository) {
    $this->user_repository = $user_repository;
  }

  function execute($user_id) {
    if (!isset($this->user_repository)) {
      return null;
    }

    $user = $this->user_repository->findOneById($user_id);
    if ($user == null) return UseCaseResponse::error("Usuário não encontrado.");
    return UseCaseResponse::success(null, $user);
  }
}

?>