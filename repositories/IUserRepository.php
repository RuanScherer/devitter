<?php

interface IUserRepository {
  public function create(User $user): void;
  public function findOneByEmailOrUsername(User $user): ?User;
}

?>