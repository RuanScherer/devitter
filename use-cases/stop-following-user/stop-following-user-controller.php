<?php

include_once __DIR__ . "/stop-following-user-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbFollowRepository.php";

class StopFollowingUserController {
  static function handle($follower_id, $followed_id) {
    $follow_repository = new MariaDbFollowRepository();
    $stop_following_user_use_case = new StopFollowingUserUseCase($follow_repository);
    return $stop_following_user_use_case->execute($follower_id, $followed_id);
  }
}

?>