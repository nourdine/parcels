<?php

use parcels\BasicParcel;

class BasicParcelTest extends PHPUnit_Framework_TestCase {

   /**
    * @var parcels\BasicParcel 
    */
   private $parcel = null;

   public function setUp() {
      $this->parcel = new BasicParcel();
   }

   public function tearDown() {
      $this->parcel = null;
   }

   public function testFunctioning() {
      
      $this->parcel->setMessage("za message");
      $php = json_decode($this->parcel->toJson(), true);
      
      $this->assertEquals("za message", $php["message"]);
   }
}