<?php

include_once __DIR__ . "/../IPostRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";
include_once __DIR__ . "/../../entities/Post.php";

class MariaDbPostRepository implements IPostRepository {
  function create($post) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "INSERT INTO Post (content, created_at, user_id, commented_post_id) VALUES (?, ?, ?, ?);"
    );
    $commented_post_id = $post->commented_post != null ? $post->commented_post->id : null;
    $created_at = substr($post->created_at, 0, 10);
    $statement->bind_param(
      "ssii",
      $post->content,
      $created_at,
      $post->user->id,
      $commented_post_id
    );
    $statement->execute();
  }

  function findByUserId($user_id) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "SELECT p.*, u.id AS user_id, u.name AS user_name FROM Post p, User u WHERE p.user_id = ? AND p.user_id = u.id ORDER BY p.created_at, p.id DESC;"
    );
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $result = $statement->get_result();
    $posts = [];
    while ($row = $result->fetch_assoc()) {
      array_push($posts, Post::fromArray($row));
    }
    return $posts;
  }

  function findFromFollowedUsers($user_id) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "SELECT U.id AS user_id, U.name AS name, P.id AS post_id, P.content AS content, P.created_at AS created_at FROM follow F LEFT JOIN user U ON U.id = F.follower_id LEFT JOIN post P ON P.user_id = F.follower_id WHERE F.followed_id = ? ORDER BY P.created_at DESC"
    );
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $result = $statement->get_result();
    $posts = [];
    while ($row = $result->fetch_assoc()) {
      array_push($posts, Post::fromArray($row));
    }
    return $posts;
  }
}

?>