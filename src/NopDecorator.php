<?php

namespace Akrfjmt\Decorated;

class NopDecorator implements Decorator
{
    /**
     * @inheritdoc
     */
    public function decorate(string $name, array $args, Decorated $decorated)
    {
        $result = $decorated->__call($name, $args);
        return $result;
    }
}