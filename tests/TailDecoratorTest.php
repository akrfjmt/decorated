<?php

namespace Akrfjmt\Decorated\Tests;

use Akrfjmt\Decorated\Decorated;
use Akrfjmt\Decorated\Tests\Util\Cat;
use Akrfjmt\Decorated\TailDecorator;
use PHPUnit\Framework\TestCase;


class YankeeDecoratorTest extends TestCase
{
    public function testDecorate()
    {
        $yankeeDecorator = new TailDecorator();
        $cat = new Cat();

        /** @var Cat|Decorated $decorated */
        $decorated = new Decorated($cat, $yankeeDecorator);
        $this->assertSame('abcdef！？', $decorated->Concat('abc', 'def'));

        /** @var Cat|Decorated $doubleDecorated */
        $doubleDecorated = new Decorated($cat, $yankeeDecorator, $yankeeDecorator);
        $this->assertSame('114514！？！？', $doubleDecorated->Concat('114', '514'));

        /** @var Cat|Decorated $tripleDecorated */
        $tripleDecorated = new Decorated($cat, $yankeeDecorator, $yankeeDecorator, $yankeeDecorator);

        // test reentrancy
        $this->assertSame('889464！？！？！？', $tripleDecorated->Concat('889', '464'));
        $this->assertSame('364364！？！？！？', $tripleDecorated->Concat('364', '364'));
    }
}
