<?php

class UseCaseResponse {
  private $status;
  private $message;

  private function __construct($status, $message = "") {
    $this->status = $status;
    $this->message = $message;
  }

  static function error($message = "") {
    return new UseCaseResponse("error", $message);
  }

  static function success($message = "") {
    return new UseCaseResponse("success", $message);
  }

  function __get($name) {
    return $this->$name;
  }
}

?>