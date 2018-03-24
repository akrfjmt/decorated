<?php

namespace Akrfjmt\Decorated;

use ReflectionException;
use ReflectionMethod;
use Throwable;

class Decorated
{
    /** @var object */
    private $core;
    /** @var Decorator[] */
    private $decorators;

    /**
     * Decorated constructor.
     * @param $core
     * @param Decorator[] ...$decorators
     */
    public function __construct($core, Decorator ...$decorators)
    {
        $this->core = $core;
        $this->decorators = $decorators;
    }

    /**
     * @param string $name
     * @param array $args
     * @return mixed
     * @throws Throwable
     */
    public function __call($name, array $args)
    {
        /** @var Decorator $next */
        $next = array_pop($this->decorators);

        try {
            if ($next instanceof Decorator) {
                $result = $next->decorate($name, $args, $this);
            } else {
                $reflMethod = new ReflectionMethod($this->core, $name);
                $result = $reflMethod->invokeArgs($this->core, $args);
            }
        } catch (Throwable $e) {
            $this->decorators []= $next;
            throw $e;
        }
        $this->decorators []= $next;
        return $result;
    }
}

