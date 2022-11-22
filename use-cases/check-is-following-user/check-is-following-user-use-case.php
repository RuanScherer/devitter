<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";

class CheckIsFollowingUserUseCase {
  private $follow_repository;

  function __construct($follow_repository) {
    $this->follow_repository = $follow_repository;
  }

  function execute($follower_id, $followed_id) {
    if (!isset($this->follow_repository)) {
      return null;
    }

    $isFollowing = $this->follow_repository->findFollowedUser($follower_id, $followed_id);
    return UseCaseResponse::success(null, $isFollowing);
  }
}

?>