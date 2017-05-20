<?php

namespace OpCacheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opcache
 *
 * @ORM\Table(name="opcache")
 * @ORM\Entity
 */
class OpCache
{
    /**
     * @var integer
     *
     * @ORM\Column(name="memory_used", type="bigint", nullable=false)
     */
    private $memoryUsed;

    /**
     * @var integer
     *
     * @ORM\Column(name="memory_free", type="bigint", nullable=false)
     */
    private $memoryFree;

    /**
     * @var integer
     *
     * @ORM\Column(name="memory_wasted", type="bigint", nullable=false)
     */
    private $memoryWasted;

    /**
     * @var integer
     *
     * @ORM\Column(name="restart_last", type="integer", nullable=false)
     */
    private $restartLast;

    /**
     * @var integer
     *
     * @ORM\Column(name="restart_manual", type="integer", nullable=false)
     */
    private $restartManual;

    /**
     * @var integer
     *
     * @ORM\Column(name="key_max", type="integer", nullable=false)
     */
    private $keyMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="key_cached", type="integer", nullable=false)
     */
    private $keyCached;

    /**
     * @var integer
     *
     * @ORM\Column(name="script_cached", type="integer", nullable=false)
     */
    private $scriptCached;

    /**
     * @var integer
     *
     * @ORM\Column(name="hit_hits", type="integer", nullable=false)
     */
    private $hitHits;

    /**
     * @var integer
     *
     * @ORM\Column(name="hit_misses", type="integer", nullable=false)
     */
    private $hitMisses;

    /**
     * @var integer
     *
     * @ORM\Column(name="script", type="integer", length=10)
     */
    private $script;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=10)
     * @ORM\Id
     */
    private $date;

    /**
     * Set $date
     *
     * @param string $memoryUsed
     *
     * @return Opcache
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Set memoryUsed
     *
     * @param integer $memoryUsed
     *
     * @return Opcache
     */
    public function setMemoryUsed($memoryUsed)
    {
        $this->memoryUsed = $memoryUsed;

        return $this;
    }

    /**
     * Get memoryUsed
     *
     * @return integer
     */
    public function getMemoryUsed()
    {
        return $this->memoryUsed;
    }

    /**
     * Set memoryFree
     *
     * @param integer $memoryFree
     *
     * @return Opcache
     */
    public function setMemoryFree($memoryFree)
    {
        $this->memoryFree = $memoryFree;

        return $this;
    }

    /**
     * Get memoryFree
     *
     * @return integer
     */
    public function getMemoryFree()
    {
        return $this->memoryFree;
    }

    /**
     * Set memoryWasted
     *
     * @param integer $memoryWasted
     *
     * @return Opcache
     */
    public function setMemoryWasted($memoryWasted)
    {
        $this->memoryWasted = $memoryWasted;

        return $this;
    }

    /**
     * Get memoryWasted
     *
     * @return integer
     */
    public function getMemoryWasted()
    {
        return $this->memoryWasted;
    }

    /**
     * Set restartLast
     *
     * @param integer $restartLast
     *
     * @return Opcache
     */
    public function setRestartLast($restartLast)
    {
        $this->restartLast = $restartLast;

        return $this;
    }

    /**
     * Get restartLast
     *
     * @return integer
     */
    public function getRestartLast()
    {
        return $this->restartLast;
    }

    /**
     * Set restartManual
     *
     * @param integer $restartManual
     *
     * @return Opcache
     */
    public function setRestartManual($restartManual)
    {
        $this->restartManual = $restartManual;

        return $this;
    }

    /**
     * Get restartManual
     *
     * @return integer
     */
    public function getRestartManual()
    {
        return $this->restartManual;
    }

    /**
     * Set keyMax
     *
     * @param integer $keyMax
     *
     * @return Opcache
     */
    public function setKeyMax($keyMax)
    {
        $this->keyMax = $keyMax;

        return $this;
    }

    /**
     * Get keyMax
     *
     * @return integer
     */
    public function getKeyMax()
    {
        return $this->keyMax;
    }

    /**
     * Set keyCached
     *
     * @param integer $keyCached
     *
     * @return Opcache
     */
    public function setKeyCached($keyCached)
    {
        $this->keyCached = $keyCached;

        return $this;
    }

    /**
     * Get keyCached
     *
     * @return integer
     */
    public function getKeyCached()
    {
        return $this->keyCached;
    }

    /**
     * Set scriptCached
     *
     * @param integer $scriptCached
     *
     * @return Opcache
     */
    public function setScriptCached($scriptCached)
    {
        $this->scriptCached = $scriptCached;

        return $this;
    }

    /**
     * Get scriptCached
     *
     * @return integer
     */
    public function getScriptCached()
    {
        return $this->scriptCached;
    }

    /**
     * Set hitHits
     *
     * @param integer $hitHits
     *
     * @return Opcache
     */
    public function setHitHits($hitHits)
    {
        $this->hitHits = $hitHits;

        return $this;
    }

    /**
     * Get hitHits
     *
     * @return integer
     */
    public function getHitHits()
    {
        return $this->hitHits;
    }

    /**
     * Set hitMisses
     *
     * @param integer $hitMisses
     *
     * @return Opcache
     */
    public function setHitMisses($hitMisses)
    {
        $this->hitMisses = $hitMisses;

        return $this;
    }

    /**
     * Get hitMisses
     *
     * @return integer
     */
    public function getHitMisses()
    {
        return $this->hitMisses;
    }

    /**
     * Set script
     *
     * @param integer $script
     *
     * @return Opcache
     */
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * Get script
     *
     * @return integer
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}
