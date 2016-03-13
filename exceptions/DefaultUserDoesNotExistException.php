<?php


class DefaultUserDoesNotExistException extends Exception  {
      // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0) {
        parent::__construct($message, $code);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "User Does Not Exist\n";
    }
}
