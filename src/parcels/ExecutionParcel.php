<?php

namespace parcels;

use \Exception;
use parcels\DataParcel;

class ExecutionParcel extends DataParcel {

   protected $success = true;
   protected $exception = null;

   public function getSuccess() {
      return $this->success;
   }

   public function setSuccess($success) {
      $this->success = $success;
   }

   public function getException() {
      return $this->exception;
   }

   public function setException(Exception $exception) {
      $this->exception = $exception;
   }

   public function hasExceptionBeenThrown() {
      return $this->exception !== null;
   }

   public function toArray() {
      $thrown = $this->hasExceptionBeenThrown();
      $array = parent::toArray();
      $array["success"] = $this->success;
      $array["has_exception_been_thrown"] = $thrown;
      if ($thrown) {
         $array["exception_message"] = $this->getException()->getMessage();
      }
      return $array;
   }

   public function toJson() {
      return json_encode($this->toArray());
   }
}