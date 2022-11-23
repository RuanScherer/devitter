<?php

include_once __DIR__ . "/update-user-profile-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbUserRepository.php";

class UpdateUserProfileController {
  static function handle($user) {
    $user_repository = new MariaDbUserRepository();
    $update_user_profile = new UpdateUserProfileUseCase($user_repository);
    return $update_user_profile->execute($user);
  }
}

?>