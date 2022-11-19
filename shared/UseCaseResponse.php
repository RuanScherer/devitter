<?php

class UseCaseResponse {
  private $status;
  private $message;
  private $data;

  private function __construct($status, $message, $data) {
    $this->status = $status;
    $this->message = $message;
    $this->data = $data;
  }

  static function error($message = "", $data = null) {
    return new UseCaseResponse("error", $message, $data);
  }

  static function success($message = "", $data = null) {
    return new UseCaseResponse("success", $message, $data);
  }

  function __get($name) {
    return $this->$name;
  }

  function isSuccess() {
    return $this->status == "success";
  }
}

?>