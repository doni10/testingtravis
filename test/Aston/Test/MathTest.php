<?php

namespace Aston\Test;

use Aston\Math;
use InvalidArgumentException;
use TypeError;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testDivisionWithInvalidArgument()
    {
        $this->expectException(TypeError::class);
        Math::divide('x', 'y');
    }

    public function testFailDivisionByZero()
    {
        $this->expectException(InvalidArgumentException::class);
        Math::divide(10, 0);
    }

    public function testDivisionByZeroFail()
    {
        $this->assertNotEquals(10, Math::divide(100, 2));
    }

    public function testDivisionByZero()
    {
        $this->assertEquals(5, Math::divide(10, 2));
    }
}
