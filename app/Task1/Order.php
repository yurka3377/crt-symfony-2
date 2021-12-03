<?php

class Order{
    public Basket $basket;
    public float $deliveryPrice;

    public function __construct($basket, $deliveryPrice)
    {
        $this->basket = $basket;
        $this->deliveryPrice = $deliveryPrice;
    }

    public function getBasket(): Basket
    {
        return $this->basket;
    }

    public function getPrice(): float
    {
        return $this->basket->getPrice() + $this->deliveryPrice;
    }
}

