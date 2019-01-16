<?php

namespace Aston\Cart;

class Product
{
    /**
     * @var mixed
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $imageURL;

    /**
     * Product constructor.
     *
     * @param mixed $id
     * @param string $title
     * @param string $description
     * @param float $price
     * @param string $imageURL
     */
    public function __construct(
        $id = null,
        string $title = '',
        string $description = '',
        float $price = 0,
        string $imageURL = ''
    ) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setImageURL($imageURL);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Product
     */
    public function setTitle(string $title): Product
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageURL(): string
    {
        return $this->imageURL;
    }

    /**
     * @param string $imageURL
     * @return Product
     */
    public function setImageURL(string $imageURL): Product
    {
        $this->imageURL = $imageURL;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}
