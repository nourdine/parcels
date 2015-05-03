<?php

namespace parcels\decorator;

use \RuntimeException;
use parcels\BasicParcel;
use parcels\Exportable;

class AuthenticationDecorator implements Exportable {

   protected $parcel = null;
   protected $authRequired = false;

   public static function wrap(BasicParcel $parcel) {
      return new self($parcel);
   }

   private function __construct(BasicParcel $parcel) {
      $this->parcel = $parcel;
   }

   /**
    * The toJson method of the wrapped Parcel is never invoked as this type already owns such method!
    */
   public function __call($methodName, $arguments) {
      if (method_exists($this->parcel, $methodName)) {
         return call_user_func_array(array($this->parcel, $methodName), $arguments);
      } else {
         throw new RuntimeException("The method {$methodName} does not exist!");
      }
   }

   public function isAuthRequired() {
      return $this->authRequired;
   }

   public function setAuthRequired($isAuthRequired) {
      $this->authRequired = $isAuthRequired;
   }

   public function toArray() {
      $array = $this->parcel->toArray();
      $array["auth_required"] = $this->authRequired;
      return $array;
   }

   public function toJson() {
      return json_encode($this->toArray());
   }
}