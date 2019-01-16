<?php

namespace Aston\Cart;

use Countable;
use InvalidArgumentException;
use Exception;

class Basket implements Countable
{
    /**
     * @var array
     */
    private $quantity;

    /**
     * @var array
     */
    private $products;

    /**
     * Basket constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return Basket
     * @throws InvalidArgumentException
     */
    public function addProduct(Product $product, $quantity = 1): Basket
    {
        if ($quantity < 1) {
            throw new InvalidArgumentException('quantity is invalid');
        }

        if (!$this->hasProduct($product)) {
            $this->setProduct($product);
            $this->setQuantity($product);
        }

        $this->quantity[$product->getId()] += $quantity;

        return $this;
    }

    /**
     * Remove a product quantity from basket.
     *
     * @param Product $product
     * @param int $quantity
     * @return Basket
     * @throws Exception
     */
    public function removeProduct(Product $product, $quantity = 1): Basket
    {
        if ($quantity < 1) {
            throw new InvalidArgumentException('quantity is invalid');
        }

        if (!$this->hasProduct($product)) {
            throw new Exception('Product not found');
        }

        if ($quantity >= $this->quantity[$product->getId()]) {
            $this->clearProduct($product);
            return $this;
        }

        $this->quantity[$product->getId()] -= $quantity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return \array_sum($this->quantity);
    }

    /**
     * Reset basket.
     *
     * @return Basket
     */
    public function reset(): Basket
    {
        $this->products = [];
        $this->quantity = [];

        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return array
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function hasProduct(Product $product): bool
    {
        return \array_key_exists($product->getId(), $this->products);
    }

    /**
     * Clear all products.
     *
     * @param Product $product
     * @return $this
     */
    protected function clearProduct(Product $product): Basket
    {
        unset($this->products[$product->getId()]);
        unset($this->quantity[$product->getId()]);

        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    protected function setProduct(Product $product): Basket
    {
        $this->products[$product->getId()] = $product;
        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    protected function setQuantity(Product $product): Basket
    {
        $this->quantity[$product->getId()] = 0;
        return $this;
    }
}
