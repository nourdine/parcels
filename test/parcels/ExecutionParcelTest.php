<?php

use parcels\ExecutionParcel;

class ExecutionParcelTest extends PHPUnit_Framework_TestCase {

   /**
    * @var parcels\ExecutionParcel 
    */
   private $parcel = null;

   public function setUp() {
      $this->parcel = new ExecutionParcel();
   }

   public function tearDown() {
      $this->parcel = null;
   }

   public function testFunctioning() {
      
      $this->parcel->setSuccess(false);
      $this->parcel->setException(new RuntimeException("za exception message"));
      $php = json_decode($this->parcel->toJson(), true);

      $this->assertEquals(false, $php["success"]);
      $this->assertEquals(true, $php["has_exception_been_thrown"]);
   }
}