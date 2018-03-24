<?php

namespace Akrfjmt\Decorated;

class YankeeDecorator implements Decorator
{
    /**
     * @inheritdoc
     */
    public function decorate(string $name, array $args, Decorated $decorated)
    {
        $result = $decorated->__call($name, $args);
        return $result . '！？';
    }
}
