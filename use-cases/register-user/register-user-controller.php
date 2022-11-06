<?php

include_once __DIR__ . "/register-user-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbUserRepository.php";

class RegisterUserController {
  static function handle($user) {
    $user_repository = new MariaDbUserRepository();
    $register_user_use_case = new RegisterUserUseCase($user_repository);
    return $register_user_use_case->execute($user);
  }
}

?>