<?php

include_once __DIR__ . "/../IPostRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";
include_once __DIR__ . "/../../entities/Post.php";

class MariaDbPostRepository implements IPostRepository {
  function create($post) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "INSERT INTO Post (content, created_at, user_id) VALUES (?, ?, ?);"
    );
    $created_at = substr($post->created_at, 0, 10);
    $statement->bind_param(
      "ssi",
      $post->content,
      $created_at,
      $post->user->id
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
      "SELECT P.*, U.id AS user_id, U.name AS user_name
      FROM Post P
      INNER JOIN User U
      ON U.id = P.user_id
      LEFT JOIN Follow F
      ON P.user_id = F.followed_id
      WHERE F.follower_id = ?
      OR P.user_id = ?
      GROUP BY P.id
      ORDER BY P.created_at, P.id DESC"
    );
    $statement->bind_param("ii", $user_id, $user_id);
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