<?php

include_once __DIR__ . "/get-user-posts-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbPostRepository.php";

class GetUserPostsController {
  static function handle($user_id) {
    $post_repository = new MariaDbPostRepository();
    $get_user_posts_use_case = new GetUserPostsUseCase($post_repository);
    return $get_user_posts_use_case->execute($user_id);
  }
}

?>