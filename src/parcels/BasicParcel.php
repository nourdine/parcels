<?php

namespace parcels;

class BasicParcel implements Exportable {

   protected $message = null;

   public function getMessage() {
      return $this->message;
   }

   public function setMessage($message) {
      $this->message = $message;
   }

   public function toArray() {
      return array(
         "message" => $this->message
      );
   }

   public function toJson() {
      return json_encode($this->toArray());
   }
}