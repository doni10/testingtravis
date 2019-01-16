<?php

namespace Aston\Test\Cart;

use Aston\Cart\Basket;
use Aston\Cart\Product;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    /**
     * @var Basket
     */
    protected $basket;

    public function setUp()
    {
        $this->basket = new Basket();
    }

    public function testConstructor()
    {
        $this->assertEquals(0, $this->basket->count());
        $this->assertFalse($this->basket->hasProduct(new Product()));
        $this->assertEmpty($this->basket->getProducts());
        $this->assertEmpty($this->basket->getQuantity());
    }

    public function testAddProductWithQuantityNumberLessThanOne()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->basket->addProduct(new Product(), 0);
    }

    public function testAddNewProduct()
    {
        $p = new Product(17);
        $this->basket->addProduct($p);
        $quantity = $this->basket->getQuantity()[$p->getId()];

        $this->assertEquals(1, $quantity);
    }

    public function testRemoveProductWithQuantityGreaterThanTotal()
    {
        $p = new Product(2);

        $this->basket->addProduct($p);
        $this->basket->addProduct($p);
        $this->basket->removeProduct($p, 4);

        $this->assertFalse($this->basket->hasProduct($p));
    }

    public function testRemoveProductWithQuantityLessThanOne()
    {
        $this->expectException(Exception::class);

        $p = new Product(43);
        $this->basket->addProduct($p);
        $this->basket->removeProduct(new Product(), 0);
    }

    public function testRemoveProduct()
    {
        $p = new Product(36);

        $this->basket->addProduct($p, 3);
        $this->basket->removeProduct($p, 2);

        $this->assertEquals(1, $this->basket->getQuantity()[$p->getId()]);
    }

    public function testRemoveProductNotFound()
    {
        $this->expectException(Exception::class);
        $this->basket->removeProduct(new Product());
    }
}
