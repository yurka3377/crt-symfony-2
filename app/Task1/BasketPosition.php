<?php

class BasketPosition{
    protected Product $product;
    protected int $quantityProduct;

    public function __construct(Product $product, int $quantityProduct)
    {
        $this->product = $product;
        $this->quantityProduct = $quantityProduct;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantityProduct;
    }

    public function getPrice(): float
    {
        return $this->product->getPrice() * $this->getQuantity();
    }
}

