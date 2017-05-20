<?php

namespace OpCacheBundle\Tests\Controller;

use OpCacheBundle\Controller\OpCacheController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ReflectionClass;

/**
 * OpCacheControllerTest
 */
class OpCacheControllerTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Get OpCacheController
     *
     * @return OpCacheController
     */
   private function getOpCacheController(): OpCacheController
   {
       return (new ReflectionClass(OpCacheController::class))
       ->newInstanceArgs([]);
   }

   /**
    * Test instanceof controller
    */
   public function testInstanceOfController()
   {
       $this->assertTrue($this->getOpCacheController() instanceof Controller);
   }

   /**
    * Test methods
    */
   public function testMethods()
   {
       $mock = $this->getOpCacheController();
       $this->assertTrue(
           method_exists($mock, "deleteAction")
        && method_exists($mock, "readDateAction")
        && method_exists($mock, "readAction")
       );
   }

}
