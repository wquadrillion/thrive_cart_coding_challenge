<?php

namespace App;

class Product
{
    private string $code;
    private float $price;

    public function __construct(string $code, float $price)
    {
        $this->code = $code;
        $this->price = $price;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function applyDiscount(float $discount): void
    {
        $this->price *= $discount;
    }
}
