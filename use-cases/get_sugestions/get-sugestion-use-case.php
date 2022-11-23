<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";

class GetSugestionUseCase {
  private $sugestion_repository;

  function __construct($sugestion_repository) {
    $this->sugestion_repository = $sugestion_repository;
  }

  function execute($user_id, $user_type) {
    if (!isset($this->sugestion_repository)) {
      return null;
    }

    $sugestion = $this->sugestion_repository->findAllByUser($user_id, $user_type);
    return UseCaseResponse::success(null, $sugestion);
  }
}

?>