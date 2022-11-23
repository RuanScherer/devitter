<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";

class GetFollowedUsersPostsUseCase {
  private $post_repository;

  function __construct($post_repository) {
    $this->post_repository = $post_repository;
  }

  function execute($user_id) {
    if (!isset($this->post_repository)) {
      return null;
    }

    $posts = $this->post_repository->findFromFollowedUsers($user_id);
    return UseCaseResponse::success(null, $posts);
  }
}

?>