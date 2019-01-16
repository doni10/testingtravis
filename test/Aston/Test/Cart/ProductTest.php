<?php

namespace Aston\Test\Cart;

use Aston\Cart\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testConstructorWithZeroValue()
    {
        $p = new Product();

        $this->assertEquals(null, $p->getId());
        $this->assertEquals('', $p->getTitle());
        $this->assertEquals('', $p->getDescription());
        $this->assertEquals(0, $p->getPrice());
        $this->assertEquals('', $p->getImageURL());
    }

    public function testConstructor()
    {
        $p = new Product(1, 'item 1', 'desc 1', 4.90, 'http://testing.com/images/test.jpg');

        $this->assertEquals(1, $p->getId());
        $this->assertEquals('item 1', $p->getTitle());
        $this->assertEquals('desc 1', $p->getDescription());
        $this->assertEquals(4.90, $p->getPrice());
        $this->assertEquals('http://testing.com/images/test.jpg', $p->getImageURL());
    }

    public function testToString()
    {
        $p = new Product();
        $this->assertEquals('', $p);

        $p->setTitle('item one');
        $this->assertEquals('item one', $p->getTitle());
    }
}
