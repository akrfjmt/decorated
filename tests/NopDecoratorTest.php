<?php

namespace Akrfjmt\Decorated\Tests;

use Akrfjmt\Decorated\Decorated;
use Akrfjmt\Decorated\NopDecorator;
use Akrfjmt\Decorated\Tests\Util\Cat;
use PHPUnit\Framework\TestCase;


class NopDecoratorTest extends TestCase
{
    public function testDecorate()
    {
        $nopDecorator = new NopDecorator();

        $catman = new Cat();

        /** @var Cat|Decorated $decorated */
        $decorated = new Decorated($catman, $nopDecorator);

        $result = $decorated->Concat('abc', 'def');

        $this->assertSame('abcdef', $result);
    }
}
