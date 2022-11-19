<?php

include_once __DIR__ . "/../IPostRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";
include_once __DIR__ . "/../../entities/Post.php";

class MariaDbPostRepository implements IPostRepository {
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
}

?>