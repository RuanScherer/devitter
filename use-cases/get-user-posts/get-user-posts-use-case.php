<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";
include_once __DIR__ . "/../../repositories/IUserRepository.php";

class GetUserPostsUseCase {
  private $post_repository;

  function __construct($post_repository) {
    $this->post_repository = $post_repository;
  }

  function execute($user_id) {
    if (!isset($this->post_repository)) {
      return null;
    }

    $posts = $this->post_repository->findByUserId($user_id);
    return UseCaseResponse::success(null, $posts);
  }
}

?>