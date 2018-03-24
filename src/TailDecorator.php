<?php

namespace Akrfjmt\Decorated;

class TailDecorator implements Decorator
{
    /** @var string */
    private $suffix;

    /**
     * TailDecorator constructor.
     * @param string $suffix
     */
    public function __construct(string $suffix) {
        $this->suffix = $suffix;
    }

    /**
     * @inheritdoc
     */
    public function decorate(string $name, array $args, Decorated $decorated)
    {
        $result = $decorated->__call($name, $args);
        return $result . $this->suffix;
    }
}
