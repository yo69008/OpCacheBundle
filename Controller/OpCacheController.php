<?php

namespace OpCacheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use OpCacheBundle\Entity\OpCache;
use Symfony\Component\HttpFoundation\Response;

/**
 * OpCacheController
 */
class OpCacheController extends Controller
{

    private
        /**
         * @var bool opcache enable
         */
        $enable,
        /**
         * @var array $script
         */
        $script,
        /**
         * @var string date
         */
        $date;

    /**
     * @Route("/opcache/delete", name="opcache_delete")
     */
    public function deleteAction()
    {
        if (function_exists("opcache_reset")) {
            opcache_reset();
        }
        return $this->redirectToRoute("opcache");
    }

    /**
     * @Route("/opcache/{date}", name="opcache_date")
     */
    public function readDateAction($date)
    {
        $this->enable = false;
        $this->date = $date;
        if (!($entity = $this->readEntity())) {
            return $this->redirectToRoute("opcache");
        }
        $this->enable = true;
        return $this->getResponse($entity);
    }

    /**
     * @Route("/opcache", name="opcache")
     */
    public function readAction()
    {
        $this->enable = false;
        $this->script = [];
        $this->date = date("Y-m-d");
        if (!($entity = $this->readEntity())) {
            $entity = new OpCache;
            $this->buildEntity($entity);
            if ($entity->getDate()) {
                $this->getDoctrine()->getManager()->persist($entity);
            }
        } else if ($entity) {
            $this->buildEntity($entity);
        }
        $this->getDoctrine()->getManager()->flush();
        $entity->setScript($this->script);
        return $this->getResponse($entity);
    }


    /**
     * Build entity
     *
     * @param Opcache $entity
     * @param string $date
     */
    protected function buildEntity(OpCache $entity)
    {
        if (!function_exists("opcache_get_status")
         || !($status = opcache_get_status())) {
            return $entity;
        }
        $this->enable = (bool) $status["opcache_enabled"];
        $entity->setDate($this->date);
        $entity->setMemoryUsed(
            round($status["memory_usage"]["used_memory"] / 1000 / 1000, 2));
        $entity->setMemoryFree(
            round( $status["memory_usage"]["free_memory"] / 1000 / 1000, 2));
        $entity->setMemoryWasted(
            round($status["memory_usage"]["wasted_memory"]/ 1000 / 1000,2));
        $entity->setRestartLast(
            $status["opcache_statistics"]["last_restart_time"]);
        $entity->setRestartManual(
            $status["opcache_statistics"]["manual_restarts"]);
        $entity->setKeyMax($status["opcache_statistics"]["max_cached_keys"]);
        $entity->setKeyCached($status["opcache_statistics"]["num_cached_keys"]);
        $entity->setScriptCached(
            $status["opcache_statistics"]["num_cached_scripts"]);
        $entity->setHitHits($status["opcache_statistics"]["hits"]);
        $entity->setHitMisses($status["opcache_statistics"]["misses"]);
        if (array_key_exists("scripts", $status)) {
            $this->script = $status["scripts"];
        }
        $entity->setScript(count($this->script));
        return $entity;
    }

    /**
     * Read entity date
     *
     * @return array $entity date
     */
    protected function readEntityDate()
    {
        $date = [];
        $entities = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository(OpCache::class)
        ->findAll();
        if ($entities) {
            foreach ($entities as $entity) {
                $date[] = $entity->getDate();
            }
            rsort($date);
        }
        return $date;
    }

    /**
     * Read entity
     * 
     * @return Opcache|null $entity
     */
    protected function readEntity ()
    {
        return $this
        ->getDoctrine()
        ->getManager()
        ->getRepository(OpCache::class)
        ->findOneBy(["date" => $this->date]);
    }

    /**
     * Get response
     * 
     * @param Opcache $entity
     * @return Response
     */
    protected function getResponse(OpCache $entity): Response
    {
        $memory = !$this->enable ? 1 : $entity->getMemoryFree()
                                     + $entity->getMemoryUsed()
                                     + $entity->getMemoryWasted();
        $key = !$this->enable ? 1 :($entity->getKeyMax()
                                  - $entity->getKeyCached())
                                  + $entity->getKeyCached()
                                  + ($entity->getKeyCached()
                                  - $entity->getScriptCached());
        $hit = !$this->enable ? 1 : $entity->getHitMisses()
                                  + $entity->getHitHits();
        return $this->render(
            '@OpCacheBundle/Resources/views/opcache.html.twig', [
                "opcache" => $entity,
                "enable" => $this->enable,
                "php_version" => phpversion(),
                "time" => time(),
                "date" => $this->readEntityDate(),
                "free_memory" => round(
                    $entity->getMemoryFree() / $memory * 100, 2),
                "used_memory" => round(
                    $entity->getMemoryUsed() / $memory * 100, 2),
                "wasted_memory" => round(
                    $entity->getMemoryWasted() / $memory * 100, 2) ,
                "free_key" => round(
                    ($entity->getKeyMax() - $entity->getKeyCached())
                    / $key * 100, 2),
                "used_key" => round(
                    $entity->getKeyCached() / $key * 100, 2),
                "wasted_key" => round(
                    ($entity->getKeyCached() - $entity->getScriptCached())
                    / $key * 100, 2),
                "hits_hit" => round(
                    $entity->getHitHits() / $hit * 100, 2),
                "misses_hit" => round(
                    $entity->getHitMisses() / $hit * 100, 2),
                "scripts" => is_array($entity->getScript())
                          ? count($entity->getScript())
                          : $entity->getScript() ,
            ]
        );
    }

}
