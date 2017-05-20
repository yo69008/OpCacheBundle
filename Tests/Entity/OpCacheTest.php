<?php

namespace OpCacheBundle\Tests\Controller;

use OpCacheBundle\Entity\OpCache;
use ReflectionClass;

/**
 * OpCacheTest
 */
class OpCacheTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Get getOpCache
     *
     * @return OpCache
     */
   private function getOpCache(): OpCache
   {
       return (new ReflectionClass(OpCache::class))
       ->newInstanceArgs([]);
   }

   /**
    * Test methods
    * @dataProvider methodProvider
    */
   public function testMethod($method)
   {
       $this->assertTrue(
           method_exists($this->getOpCache(), $method)
       );
   }

   /**
    * Method provider
    */
   public function methodProvider()
   {
       return [
           ["setDate"],
           ["getDate"],
           ["setMemoryUsed"],
           ["getMemoryUsed"],
           ["setMemoryFree"],
           ["getMemoryFree"],
           ["setMemoryWasted"],
           ["getMemoryWasted"],
           ["getMemoryWasted"],
           ["setRestartLast"],
           ["getRestartLast"],
           ["setRestartManual"],
           ["getRestartManual"],
           ["setKeyMax"],
           ["getKeyCached"],
           ["setScriptCached"],
           ["getScriptCached"],
           ["setHitHits"],
           ["getHitHits"],
           ["setHitMisses"],
           ["getHitMisses"],
           ["setScript"],
           ["getScript"],
       ];
   }

}
