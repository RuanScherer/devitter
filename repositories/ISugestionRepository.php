<?php

interface ISugestionRepository {
  public function findAllByUser($user_id, $user_categories);
}

?>