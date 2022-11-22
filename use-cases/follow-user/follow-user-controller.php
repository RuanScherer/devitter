<?php

include_once __DIR__ . "/follow-user-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbFollowRepository.php";

class FollowUserController {
  static function handle($follower_id, $followed_id) {
    $follow_repository = new MariaDbFollowRepository();
    $follow_user_use_case = new FollowUserUseCase($follow_repository);
    return $follow_user_use_case->execute($follower_id, $followed_id);
  }
}

?>