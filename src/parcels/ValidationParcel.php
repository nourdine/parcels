<?php


namespace parcels;

use parcels\DataParcel;

class ValidationParcel extends DataParcel {

   protected $valid = true;

   public function isValid() {
      return $this->valid;
   }

   public function setValid($valid) {
      $this->valid = $valid;
   }

   public function toArray() {
      $array = parent::toArray();
      $array["valid"] = $this->valid;
      return $array;
   }

   public function toJson() {
      return json_encode($this->toArray());
   }
}