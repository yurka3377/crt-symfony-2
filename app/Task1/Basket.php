<?php

class Basket{
    public array $basketPositions;

    public function __construct()
    {
        $this->basketPositions = [];
    }

    public function addProduct(Product $product, int $quantity)
    {
        $this->basketPositions[] = new BasketPosition($product, $quantity);
    }

    public function getPrice(): float
    {
        $price = 0;
        foreach ($this->basketPositions as $bp) {
            $price += $bp->getPrice();
        }
        return $price;
    }

    public function describe(): array
    {
        $res = [];
        foreach ($this->basketPositions as $bp) {
            $res[] = sprintf("%s - %.2f - %d", $bp->getProduct()->getName(), $bp->getProduct()->getPrice(), $bp->getQuantity());
        }
        return $res;
    }
}
