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
     * @throws ReflectionException
     */
    public function __call($name, array $args)
    {
        /** @var Decorator $next */
        $next = array_pop($this->decorators);
        if ($next instanceof Decorator) {
            return $next->decorate($name, $args, $this);
        } else {
            $reflMethod = new ReflectionMethod($this->core, $name);
            return $reflMethod->invokeArgs($this->core, $args);
        }
    }
}

