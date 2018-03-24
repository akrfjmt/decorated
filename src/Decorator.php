<?php

namespace Akrfjmt\Decorated;

use Throwable;

interface Decorator
{
    /**
     * @param string $name
     * @param array $args
     * @param Decorated $decorated
     * @return mixed
     * @throws Throwable
     */
    public function decorate(string $name, array $args, Decorated $decorated);
}
