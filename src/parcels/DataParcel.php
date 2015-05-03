<?php

namespace parcels;

use parcels\BasicParcel;
use InvalidArgumentException;

class DataParcel extends BasicParcel {

   protected $data = array();

   public function getData($key = null) {
      if ($key === null) {
         return $this->data;
      } else if (is_string($key)) {
         if (key_exists($key, $this->data)) {
            return $this->data[$key];
         }
      }
   }

   public function setData($key, $value) {
      if (is_string($key)) {
         $this->data[$key] = $value;
      } else {
         throw new InvalidArgumentException("Key must be a string");
      }
   }

   public function toArray() {
      $array = parent::toArray();
      $array["data"] = $this->data;
      return $array;
   }

   public function toJson() {
      $array = parent::toArray();
      $array["data"] = $this->data;
      return json_encode($array);
   }

   public function import(array $data) {
      foreach ($data as $key => $value) {
         $this->setData($key, $value);
      }
   }
}