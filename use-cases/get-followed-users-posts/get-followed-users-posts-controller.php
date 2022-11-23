<?php

include_once __DIR__ . "/get-followed-users-posts-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbPostRepository.php";

class GetFollowedUsersPostsController {
  static function handle($user_id) {
    $post_repository = new MariaDbPostRepository();
    $get_followed_users_posts_use_case = new GetFollowedUsersPostsUseCase($post_repository);
    return $get_followed_users_posts_use_case->execute($user_id);
  }
}

?>