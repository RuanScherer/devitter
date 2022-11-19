<?php

include_once __DIR__ . "/User.php";

class Post {
  private $id;
  private $content;
  private $created_at;
  private $user;
  private $commented_post;

  function __construct() {
    $this->created_at = date("c", time());
  }

  static function fromArray($array) {
    if (!isset($array)) {
      return null;
    }
    
    $post = new Post();
    $post->id = $array["id"];
    $post->content = $array["content"];
    $post->created_at = $array["created_at"];
    $post->user = User::fromArray(
      array(
        "id"=>$array["user_id"],
        "name"=>$array["user_name"],
        "username"=>null,
        "email"=>null,
        "password"=>null,
        "biography"=>null
      )
    );
    // $post->commented_post = Post::fromArray($array);
    
    return $post;
  }

  function &__get($name) {
    return $this->$name;
  }

  function __set($name, $value) {
    $this->$name = $value;
  }

  function hasPostRequiredData() {
    return isset($this->content) && isset($this->created_at);
  }

  function hasUserRequiredData() {
    return $this->user != null && $this->user->id != null;
  }

  function isComment() {
    return isset($this->commented_post);
  }

  function hasCommentedPostRequiredData() {
    return isset($this->commented_post) && isset($this->commented_post->id);
  }
}

?>