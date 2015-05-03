<?php

use parcels\decorator\AuthenticationDecorator;
use parcels\BasicParcel;
use parcels\DataParcel;

class AuthenticationDecoratorTest extends PHPUnit_Framework_TestCase {

   /**
    * @var parcels\decorator\AuthenticationDecorator
    */
   private $decoratedParcel = null;

   public function setUp() {
      
   }

   public function tearDown() {
      $this->decoratedParcel = null;
   }

   public function testWithBaseClass() {

      $this->decoratedParcel = AuthenticationDecorator::wrap(new BasicParcel());
      $this->decoratedParcel->setMessage("ciao");
      $this->decoratedParcel->setAuthRequired(true);

      $this->assertTrue($this->decoratedParcel->isAuthRequired());
      $php = json_decode($this->decoratedParcel->toJson(), true);
      $this->assertEquals("ciao", $php["message"]);
      $this->assertTrue($php["auth_required"]);
   }

   public function testWithSubClass() {

      $this->decoratedParcel = AuthenticationDecorator::wrap(new DataParcel());
      $this->decoratedParcel->setMessage("ciao");
      $this->decoratedParcel->setAuthRequired(true);
      $php = json_decode($this->decoratedParcel->toJson(), true);

      $this->assertTrue($this->decoratedParcel->isAuthRequired());
      $this->assertEquals("ciao", $php["message"]);
      $this->assertTrue($php["auth_required"]);
   }

   /**
    * @expectedException     RuntimeException
    */
   public function testCallToNonExistingMethod() {
      $this->decoratedParcel = AuthenticationDecorator::wrap(new DataParcel());
      $this->decoratedParcel->not();
   }
}