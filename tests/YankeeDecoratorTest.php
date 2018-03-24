<?php

namespace Akrfjmt\Decorated\Tests;

use Akrfjmt\Decorated\Decorated;
use Akrfjmt\Decorated\Tests\Util\Cat;
use Akrfjmt\Decorated\YankeeDecorator;
use PHPUnit\Framework\TestCase;


class YankeeDecoratorTest extends TestCase
{
    public function testDecorate()
    {
        $yankeeDecorator = new YankeeDecorator();
        $cat = new Cat();

        /** @var Cat|Decorated $decorated */
        $decorated = new Decorated($cat, $yankeeDecorator);

        /** @var Cat|Decorated $doubleDecorated */
        $doubleDecorated = new Decorated($cat, $yankeeDecorator, $yankeeDecorator);

        /** @var Cat|Decorated $tripleDecorated */
        $tripleDecorated = new Decorated($cat, $yankeeDecorator, $yankeeDecorator, $yankeeDecorator);

        $this->assertSame('abcdef！？', $decorated->Concat('abc', 'def'));
        $this->assertSame('114514！？！？', $doubleDecorated->Concat('114', '514'));
        $this->assertSame('889464！？！？！？', $tripleDecorated->Concat('889', '464'));
    }
}
