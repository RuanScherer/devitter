<?php

include_once __DIR__ . "/../../shared/UseCaseResponse.php";

class CreatePostUseCase {
  private $post_repository;

  function __construct($post_repository) {
    $this->post_repository = $post_repository;
  }

  function execute($post) {
    if (!isset($this->post_repository)) return UseCaseResponse::error();

    $error_message = $this->validatePost($post);
    if (isset($error_message)) return UseCaseResponse::error($error_message);

    $this->post_repository->create($post);
    return UseCaseResponse::success();
  }

  private function validatePost($post) {
    $error_message = null;
    if (!isset($post) || !$post->hasPostRequiredData()) {
      $error_message = "É necessário informar os dados do post.";
    }

    if (!$post->hasUserRequiredData()) $error_message = "É necessário informar o autor do post.";

    if ($post->isComment() && !$post->hasCommentedPostRequiredData()) {
      $error_message = "É necessário informar os dados do post comentado.";
    }
    
    if (isset($error_message)) return $error_message;
  }
}

?>