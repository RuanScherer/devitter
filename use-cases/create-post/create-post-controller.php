<?php

include_once __DIR__ . "/../../repositories/maria-db/MariaDbPostRepository.php";
include_once __DIR__ . "/create-post-use-case.php";

class CreatePostController {
  static function handle($post) {
    $post_repository = new MariaDbPostRepository();
    $create_post_use_case = new CreatePostUseCase($post_repository);
    return $create_post_use_case->execute($post);
  }
}

?>