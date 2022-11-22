<?php

include_once __DIR__ . "/check-is-following-user-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbFollowRepository.php";

class CheckIsFollowingUserController {
  static function handle($follower_id, $followed_id) {
    $follow_repository = new MariaDbFollowRepository();
    $check_is_following_user_use_case = new CheckIsFollowingUserUseCase($follow_repository);
    return $check_is_following_user_use_case->execute($follower_id, $followed_id);
  }
}

?>