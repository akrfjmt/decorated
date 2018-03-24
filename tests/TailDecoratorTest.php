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
        $cat = new Cat();

        $yankeeDecorator = new TailDecorator('！？');
        $desuDecorator = new TailDecorator('desu');
        $yoDecorator = new TailDecorator('yo');

        /** @var Cat|Decorated $decorated */
        $decorated = new Decorated($cat, $yankeeDecorator);
        $this->assertSame('abcdef！？', $decorated->Concat('abc', 'def'));

        /** @var Cat|Decorated $doubleDecorated */
        $doubleDecorated = new Decorated($cat, $yankeeDecorator, $yankeeDecorator);
        $this->assertSame('114514！？！？', $doubleDecorated->Concat('114', '514'));


        /////////////////////
        // test reentrancy //
        /////////////////////
        /** @var Cat|Decorated $tripleDecorated */
        $tripleDecorated = new Decorated($cat, $yankeeDecorator, $yankeeDecorator, $yankeeDecorator);

        for ($i = 0; $i < 10; $i++) {
            $this->assertSame('889464！？！？！？', $tripleDecorated->Concat('889', '464'));
        }

        ////////////////
        // test order //
        ////////////////
        /** @var Cat|Decorated $yankeeDesuDecorated */
        $yankeeDesuDecorated = new Decorated($cat, $yankeeDecorator, $desuDecorator);
        $this->assertSame('889464！？desu', $yankeeDesuDecorated->Concat('889', '464'));

        /** @var Cat|Decorated $yankeeDesuyoDecorated */
        $yankeeDesuyoDecorated = new Decorated($cat, $yankeeDecorator, $desuDecorator, $yoDecorator);
        $this->assertSame('889464！？desuyo', $yankeeDesuyoDecorated->Concat('889', '464'));
    }
}
