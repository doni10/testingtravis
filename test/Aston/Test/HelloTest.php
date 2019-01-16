<?php

namespace Aston\Test;

use Aston\Hello;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    public function testSayHello()
    {
        $hello = new Hello();
        $this->assertEquals('Autoload Hello', $hello->sayHello());
    }

    public function testSayHelloWithAnotherCase()
    {
        $hello = new Hello();
        $this->assertNotEquals('autoload hello', $hello->sayHello());
    }
}