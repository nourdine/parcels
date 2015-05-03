<?php

use parcels\ValidationParcel;

class ValidationParcelTest extends PHPUnit_Framework_TestCase {

   /**
    * @var parcels\ValidationParcel 
    */
   private $parcel = null;

   public function setUp() {
      $this->parcel = new ValidationParcel();
   }

   public function tearDown() {
      $this->parcel = null;
   }

   public function testFunctioning() {
      
      $this->parcel->setMessage("za message");
      $this->parcel->setValid(false);
      $this->parcel->setData("name", "valid");
      $this->parcel->setData("email", "invalid");
      $php = json_decode($this->parcel->toJson(), true);
      
      $this->assertEquals("za message", $php["message"]);
      $this->assertEquals("valid", $php["data"]["name"]);
      $this->assertEquals("invalid", $php["data"]["email"]);
      $this->assertFalse($php["valid"]);
   }
}