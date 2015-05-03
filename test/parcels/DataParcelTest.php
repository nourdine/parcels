<?php

use parcels\DataParcel;

class DataParcelTest extends PHPUnit_Framework_TestCase {

   /**
    * @var parcels\DataParcel 
    */
   private $parcel = null;

   public function setUp() {
      $this->parcel = new DataParcel();
   }

   public function tearDown() {
      $this->parcel = null;
   }

   public function testFunctioning() {

      $this->parcel->setMessage("za message");
      $this->parcel->setData("a", 1);
      $this->parcel->setData("b", 2);
      $php = json_decode($this->parcel->toJson(), true);

      $this->assertEquals(1, $this->parcel->getData("a"));
      $this->assertEquals(2, $this->parcel->getData("b"));
      $this->assertEquals("za message", $php["message"]);
      $this->assertEquals(1, $php["data"]["a"]);
      $this->assertEquals(2, $php["data"]["b"]);
   }

   public function testImport() {
      $this->parcel->import(array("a" => 1, "b" => 2));
      $php = json_decode($this->parcel->toJson(), true);
      $this->assertEquals(1, $php["data"]["a"]);
      $this->assertEquals(2, $php["data"]["b"]);
   }
}